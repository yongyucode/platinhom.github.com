<!DOCTYPE html>
<html>
<body>

<?php
$JobID=uniqid("mibpb");
$RunResult=array();
$CWDir=getcwd();

$probe = $gride = $buffersize = $filename = "";
//处理必须输入的项. 因为下面的需要调用,所以要把php内容放前面.
$probeErr = $grideErr = $buffersizeErr = $filenameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["probe"])) {
      $probeErr = "Probe is required! ";
  } else {
    $probe = format_input($_POST["probe"]);
    if (is_nan($probe)) {
      $probeErr = "Enter valid probe radius! "; 
    }
  }
  //出错就提示并返回
  if ($probeErr!=""){
    echo "<script>alert('{$probeErr}');history.back();</script>";
  }

  if (empty($_POST["gride"])) {
    $grideErr = "Grid is required!";
  } else {
    $gride = format_input($_POST["gride"]);
    if (is_nan($gride)) {
      $grideErr = "Enter valid grid size!"; 
    }
  }
  //另一种方法返回, 但这种方法是重载,不会保存刚才的值!
  if ($grideErr!=""){
      echo "<script>alert('{$grideErr}');location.href='../Surface.html';</script>";
  }

  if (empty($_POST["buffersize"])) {
    $buffersizeErr = "Buffer size is required!";
  } else {
    $buffersize = format_input($_POST["buffersize"]);
    if (is_nan($buffersize)) {
      $buffersizeErr = "Enter valid buffer size!"; 
    }
  }
  if ($buffersizeErr!=""){
    echo "<script>alert('{$buffersizeErr}');history.back();</script>";
  }

  //这里用$_POST["files"]会出错!!
  if (empty($_FILES["files"])) {
    $filenameErr = "Please upload an input file!";
  }
  if ($filenameErr!=""){
    echo "<script>alert('{$filenameErr}');history.back();</script>";
  } 

  echo "Probe radius: ".$probe."; Grid size is: ".$gride."; Buffer size is: ".$buffersize,"<br/>";

  $filename=$_FILES["files"]["name"];
  // $_FILES["file"]["error"] - 由文件上传导致的错误代码
  if ($_FILES["files"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["files"]["error"] . "<br />";
    }
  else    {
    echo "Upload: " . $_FILES["files"]["name"] . "<br />";//上传文件basename
    //echo "Type: " . $_FILES["files"]["type"] . "<br />";//类型
    //echo "Size: " . ($_FILES["files"]["size"] / 1024) . " Kb<br />";//大小
    //echo "Temp file: " . $_FILES["files"]["tmp_name"] . "<br />";//上传后的临时文件
  }

  if (!file_exists("./MIBPBRun")){mkdir("./MIBPBRun");}//创建文件夹,要是不存在
  if (!file_exists("./MIBPBRun/$JobID")){mkdir("./MIBPBRun/$JobID");}

  if (file_exists("./MIBPBRun/$JobID/" . $_FILES["files"]["name"]))//检查是否已有该文件及目录
    {
    echo $_FILES["files"]["name"] . " already exists. ";
    }
  else
    {//将上传文件移动到指定目录和文件名
    move_uploaded_file($_FILES["files"]["tmp_name"],
    "./MIBPBRun/$JobID/" . $_FILES["files"]["name"]);
    //echo "Stored in: " . "./MIBPBRun/$JobID/" . $_FILES["files"]["name"];
    echo "Job ID is: ".$JobID."<br/><br/>";
  }
    chdir("./MIBPBRun/$JobID/");

   //获取文件名主部如1234而非1234.xyzr.第一句是多余的
  $nowfilename=realpath("./{$filename}");
  $filearray=pathinfo($nowfilename);
  $prefixfile=$filearray['filename'];
  
  copy("$CWDir/MS_Intersection","./MS_Intersection");
  copy("$CWDir/mibpb5","./mibpb5");
  //Window下不可行
  chmod("./mibpb5",0777);
  chmod("./MS_Intersection",0777);
  rename("$filename","1234.pqr");
 
  array_push($RunResult,"MIBPB output: ");
  exec("echo 'MIBPB output: '>{$JobID}.log");
  //执行程序,结果放到RunResult数组并输出到文件
  exec("./mibpb5 1234 | tee -a {$JobID}.log",$RunResult);
  rename("1234.pqr","$filename");
  rename("1234.dx","$prefixfile".".dx");
  rename("1234.xyzr","$prefixfile".".xyzr");
  rename("1234.eng","$prefixfile".".eng");
 
  array_push($RunResult,"Surface output: ");
  exec("echo '\n\nSurface output: ' >> {$JobID}.log");
  exec("./MS_Intersection {$prefixfile}.xyzr $probe $gride $buffersize | tee -a {$JobID}.log",$RunResult);
  exec("$CWDir/MarchingCubes",$RunResult);
  unlink("./mibpb5");
  unlink("./MS_Intersection");
  //压缩结果成压缩包
  exec("zip -r Result_{$JobID}.zip ./* > /dev/null");
  foreach ($RunResult as $resultline){
    echo $resultline."<br/>";
  }
  //列出结果文件
  echo "<br/><br/>Your Results: <br/>";
  //确定网页地址位置,不是好方法.但依然可用
  $webrelpath=str_replace($_SERVER['DOCUMENT_ROOT'],"",getcwd());
  //要是粗暴方法不适用...当脚本不在服务器子目录下时上面方法不适用
  if ($webrelpath===getcwd()){
      //use script relative path for web
      $webrelpath = dirname($_SERVER['SCRIPT_NAME']);
      $webrelpath.="/MIBPBRun/{$JobID}";
  }
  //找出所有文件
  $resultfiles=glob("*.*");
  //列出所有文件并连接
  foreach ($resultfiles as $eachfile){
    echo "<a href='{$webrelpath}/{$eachfile}'>{$eachfile}</a><br/>";
  }
 }

function format_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
</body>
</html>
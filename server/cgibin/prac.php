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
      $probeErr = "Probe is required";
    } else {
      $probe = format_input($_POST["probe"]);
      if (!is_nan($probe)) {
        $probeErr = "Enter valid probe radius."; 
      }
    }
    if ($probeErr!=""){
      echo "<script>alert('$probeErr');location.href="../Surface.html";</script>";
    }


  if (empty($_POST["gride"])) {
    $grideErr = "Grid is required";
  } else {
    $gride = format_input($_POST["gride"]);
    if (!is_nan($gride)) {
      $grideErr = "Enter valid grid size."; 
    }
  }

  if (empty($_POST["buffersize"])) {
    $buffersizeErr = "buffersize is required";
  } else {
    $buffersize = format_input($_POST["buffersize"]);
    if (!is_nan($buffersize)) {
      $buffersizeErr = "Enter valid buffersize."; 
    }
  }

  if (empty($_POST["files"])) {
    $filenameErr = "Please upload an input file";
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
    if (file_exists("./MIBPBRun/$JobID/" . $_FILES["files"]["name"]))//检查是否已有
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

    $nowfilename=realpath("./{$filename}");
    $filearray=pathinfo($nowfilename);
    $prefixfile=$filearray['filename'];
    
    copy("$CWDir/MS_Intersection","./MS_Intersection");
    copy("$CWDir/mibpb5","./mibpb5");
    chmod("./mibpb5",0777);
    chmod("./MS_Intersection",0777);
    rename("$filename","1234.pqr");
   
    array_push($RunResult,"MIBPB output: ");
    exec("echo 'MIBPB output: '>{$JobID}.log");
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
    exec("zip -r Result_{$JobID}.zip ./* > /dev/null");
    foreach ($RunResult as $resultline){
      echo $resultline."<br/>";
    }
    echo "<br/><br/>Your Results: <br/>";
    $nowpath=str_replace($_SERVER['DOCUMENT_ROOT'],"",getcwd());
    $resultfiles=glob("*.*");
    foreach ($resultfiles as $eachfile){
    echo "<a href='{$nowpath}/{$eachfile}'>{$eachfile}</a><br/>";
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
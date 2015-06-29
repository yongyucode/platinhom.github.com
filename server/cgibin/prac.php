<!DOCTYPE html>
<html>
<body>

<?php

$probe = $gride = $buffersize = $filename = "";
//处理必须输入的项. 因为下面的需要调用,所以要把php内容放前面.
$probeErr = $grideErr = $buffersizeErr = $filenameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["probe"])) {
    $probeErr = "Probe is required";
  } else {
    $probe = test_input($_POST["probe"]);
    // 检查名字是否包含字母和空格
    if (!is_nan($probe)) {
      $probeErr = "Enter valid probe radius."; 
    }
  }

  if (empty($_POST["gride"])) {
    $grideErr = "Email is required";
  } else {
    $gride = test_input($_POST["gride"]);
    // 检查电邮地址语法是否有效
    if (!is_nan($gride)) {
      $grideErr = "Enter valid grid size."; 
    }
  }

  if (empty($_POST["buffersize"])) {
    $buffersizeErr = "buffersize is required";
  } else {
    $buffersize = test_input($_POST["buffersize"]);
    // 检查电邮地址语法是否有效
    if (!is_nan($buffersize)) {
      $buffersizeErr = "Enter valid buffersize."; 
    }
  }

  if (empty($_POST["files"])) {
    $filenameErr = "Please upload an input file";
  }
  	echo "Probe radius: ".$probe."; Grid size is: ".$gride."; Buffer size is: ".$buffersize,"<br/>";
	echo $_FILES["files"]["name"],"<br/>";

  // $_FILES["file"]["error"] - 由文件上传导致的错误代码
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["files"]["error"] . "<br />";
    }
  else    {
    echo "Upload: " . $_FILES["files"]["name"] . "<br />";
    echo "Type: " . $_FILES["files"]["type"] . "<br />";
    echo "Size: " . ($_FILES["files"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["files"]["tmp_name"] . "<br />";
	}

 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
</body>
</html>

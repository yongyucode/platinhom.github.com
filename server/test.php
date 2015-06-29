<!DOCTYPE html>
<html>
<body>

<?php

$x=5;
$y=10;
function hi(){
	global $x;
	echo $x;
	global $y;
	echo $y;
}
$arr=array(1,2,3,4);
$arr2=array(2=>0,5=>5);
$arr3=$arr+$arr2;
var_dump($arr3);

$str="abcd";
echo $x.";<br/>";echo $y;
hi();
echo "<br> {$x}","; ",$y,'<br>';
echo $arr[1],"<br>";

class People{}
$p = new People();
$t=true;
var_dump($t);
var_dump($str);
var_dump($arr);
var_dump($p);


?>
</body>
</html>
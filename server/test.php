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
echo $x.";<br/>";echo $y;
hi();
echo "<br> {$x}","; ",$y,'<br>';
echo $arr[1];

?>
</body>
</html>
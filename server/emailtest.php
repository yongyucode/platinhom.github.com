<?php
function httpRequest($url,$method,$params=array()){
	$method=strtolower($method);
	if(trim($url)==''||!in_array($method,array('get','post'))||!is_array($params)){
		return false;
	}
	$curl=curl_init();
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl,CURLOPT_HEADER,0 ) ;
	switch($method){
		case 'get':
			$str='?';
			foreach($params as $k=>$v){
				$str.=$k.'='.$v.'&';
			}
			$str=substr($str,0,-1);
			$url.=$str;//$url=$url.$str;
			curl_setopt($curl,CURLOPT_URL,$url);
			$result='';
		break;
		case 'post':
			curl_setopt($curl,CURLOPT_URL,$url);
			curl_setopt($curl,CURLOPT_POST,1 );
			curl_setopt($curl,CURLOPT_POSTFIELDS,$params);
			$result='';
		break;
		default:
			$result='';
		break;
	}
	if(isset($result)){
		$result=curl_exec($curl);
	}
	curl_close($curl);
	return $result;
}

$req=array("software"=>"mibpb","JobID"=>"mibpb5594baf60d105");
echo httpRequest('http://23.239.23.221/MIBPBweb/index.php','GET',$req);
//require_once "email.class.php";
/*	$post=array("wd"=>"hello");
     $curl = curl_init(); //初始化一个 cURL 对象
     curl_setopt($curl, CURLOPT_URL, "http://23.239.23.221/MIBPBweb/index.php?software=mibpb&JobID=mibpb5594baf60d105");//设置你需要抓取的URL

	curl_setopt($curl,CURLOPT_RETURNTRANSFER,0);//设置cURL参数，要求结果保存到字符串中还是输出到屏幕上
	//curl_setopt($curl,CURLOPT_POSTFIELDS,"software=mibpb&JobID=mibpb5594baf60d105");
    $data = curl_exec($curl); //运行cURL，请求网页
     curl_close($curl); //关闭URL请求 
*/
?>
<?php
//require_once "email.class.php";
     $curl = curl_init(); //初始化一个 cURL 对象
     curl_setopt($curl, CURLOPT_URL, "http://www.baidu.com");//设置你需要抓取的URL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,0);//设置cURL参数，要求结果保存到字符串中还是输出到屏幕上
    $data = curl_exec($curl); //运行cURL，请求网页
     curl_close($curl); //关闭URL请求 
?>
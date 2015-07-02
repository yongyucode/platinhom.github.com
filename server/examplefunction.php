<?php
function sendmail($to,$subject = "",$body = ""){
    //$to 表示收件人地址 $subject 表示邮件标题 $body表示邮件正文
    date_default_timezone_set("America/Detroit");//设定时区东八区
    require_once('class.phpmailer.php');
    include("class.smtp.php"); 
    $mail             = new PHPMailer(); //new一个PHPMailer对象出来
    $body             = eregi_replace("[\]",'',$body); //对邮件内容进行必要的过滤
    $mail->CharSet ="UTF-8";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP(); // 设定使用SMTP服务
    $mail->SMTPDebug  = 1;                     // 启用SMTP调试功能
                                           // 1 = errors and messages
                                           // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    $mail->SMTPSecure = "tls";//"ssl";                 // 安全协议
    $mail->Host       = "smtp.live.com";      // SMTP 服务器
    $mail->Port       = 587;//25,465;                   // SMTP服务器的端口号
    $mail->Username   = "msuweigroup@hotmail.com";  // SMTP服务器用户名
    $mail->Password   = "weilab48824";            // SMTP服务器密码
    $mail->SetFrom('msuweigroup@hotmail.com', 'WeiGroup@MSU');
    $mail->AddReplyTo("zhaozxcpu@hotmail.com","Guowei Wei");
    $mail->Subject    = $subject;
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, "Dear User");
    //$mail->AddAttachment("images/phpmailer.gif");      // attachment 
    //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent successfully！";
        }
    }

//http://www.cnblogs.com/sinllychen/p/3243034.html
?>
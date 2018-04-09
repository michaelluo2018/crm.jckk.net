<?php
namespace  app\index\controller;

use PHPMailer\PHPMailer\PHPMailer;


require ROOT_PATH .'/extend/PHPMailer/src/PHPMailer.php';
require ROOT_PATH .'/extend/PHPMailer/src/SMTP.php';
require ROOT_PATH .'/extend/PHPMailer/src/Exception.php';
require ROOT_PATH .'/extend/PHPMailer/src/OAuth.php';

class Common{

    static function  send_mail($to,$title,$content,$type = "HTML"){

        $setting = model("setting","logic")->get_setting();


        $mail = new PHPMailer();
        try{
            //设置邮件使用SMTP
            $mail->isSMTP();
            // 设置邮件程序以使用SMTP
            $mail->Host = $setting['system_email_server'];
            // 设置邮件内容的编码
            $mail->CharSet='UTF-8';
            // 启用SMTP验证
            $mail->SMTPAuth = true;
            // SMTP username
            $mail->Username =$setting['system_email'];
            // SMTP password
            $mail->Password = base64_decode($setting['system_email_pwd']);

            // 连接的TCP端口
            $mail->Port = $setting['system_email_port'];
            //设置发件人
            $mail->setFrom($setting['system_email']);
            //  添加收件人1
            $mail->addAddress($to);     // Add a recipient

            // 将电子邮件格式设置为HTML
            $mail->isHTML($type);
            $mail->Subject = $title;
            $mail->Body    = $content;
          //  $mail->AltBody = '这是非HTML邮件客户端的纯文本';
            $mail->send();


        }catch (Exception $e){
            echo  'Mailer Error: ' . $mail->ErrorInfo;
        }
    }


    static  function  unlink_file($file){
        if(file_exists($file)){
           @unlink($file);
        }
    }





}
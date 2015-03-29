<?php
/**
 * Created by PhpStorm.
 * User: kinkop
 * Date: 22/3/2558
 * Time: 18:15
 */

namespace Services;

class Mail {

    public static function send($toData, $subject, $body)
    {
        $mail = new \PHPMailer();
        $mail->isSMTP();

        $mail->Host = \Config::get('mail.host');
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = \Config::get('mail.username');                 // SMTP username
        $mail->Password = \Config::get('mail.password');                           // SMTP password
        $mail->SMTPSecure = \Config::get('mail.encryption');                                // Enable TLS encryption, `ssl` also accepted
        $mail->Port = \Config::get('mail.port');

        $from = \Config::get('mail.from');

        $mail->From = $from['address'];
        $mail->FromName = $from['name'];
        $mail->addAddress($toData['email'], $toData['name']);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
    }

}
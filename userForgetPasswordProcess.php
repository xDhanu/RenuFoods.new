<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if (isset($_GET["un"])) {

    $email = $_GET["un"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $code = uniqid();
        Database::iud("UPDATE `user` SET `v_code`='" . $code . "' WHERE `email`='" . $email . "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dhanukagunathilaka.javains@gmail.com';
        $mail->Password = 'hftdhyrzhvzdmjxw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('dhanukagunathilaka.javains@gmail.com', 'Renu Foods (pvt) ltd');
        $mail->addReplyTo('dhanukagunathilaka.javains@gmail.com', 'Renu Foods (pvt) ltd');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Renu Foods (pvt) ltd Password Reset Verification Code';
        $bodyContent = 
        $bodyContent = '<table style="width: 100%; font-family: sans-serif;">
    <tbody>
        <tr>
            <td align="center">
                <table style="max-width: 600px;">
                    <tr>
                        <td align="center">
                            <a href="#"
                                style="font-size: 35px; font-weight: blod; color: black; text-decoration: none;">Renu
                                Foods (pvt) ltd</a>
                            <hr />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h1 style="font-size: 25px; line-height: 45px; font-weight: 600;">Reset yor password</h1>
                            <p style="margin-bottom: 24px;">You can change your password by clicking Button below.</p>
                            <div>
                                <p style="color: red; font-size: 20px;">Verification Code: ' . $code . '</p>
                            </div>
                            <p style="margin-top: 24px;">If you didn\'t ask to reset your password, you can ignore this
                                email.</p>
                            <hr />
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="font-weight: 500;">&copy; 2024 Renu Foods (pvt) ltd || All Right Resiverd</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Email send Failed.");
        } else {
            echo ("success");
        }
    } else {
        echo ("Enter Your Email Address");
    }
} else {
    echo ("Please enter your email address in email field.");
}

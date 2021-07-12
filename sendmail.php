<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

    // От кого
    $mail->setFrom('info@gmail.com', 'ООО "ВебБустер');
    // Кому
    $mail->addAddress('web.new.nd@gmail.com');
    // Тема
    $mail->Subject = 'Магазин - ООО "ВебБустер' ;


    // Тело письма
    $body = '<h1>Заказ товара! Магазин - ООО "ВебБустер</h1>';

    if (trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if (trim(!empty($_POST['phone']))) {
        $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
    }
    if (trim(!empty($_POST['email']))) {
        $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    }
    if (trim(!empty($_POST['product']))) {
        $body.='<p><strong>Название товара:</strong> '.$_POST['product'].'</p>';
    }

    $mail->Body = $body;

    // Отправляем
    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];    // $message = 'Ошибка' или $message = 'Данные отправлены!'

    header('Content-type: application/json');
    echo json_encode($response);
?>
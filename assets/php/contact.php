<?php
  require 'config.php';
  require __DIR__.'\mailer\PHPMailer.php';
  require __DIR__.'\mailer\SMTP.php';
  require __DIR__.'\mailer\Exception.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $mail = new PHPMailer();
  $mailUser = new PHPMailer();

  try{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['cel'];
    $message = $_POST['message'];

    emailConnect($mail);

    $mail->setFrom('contactrhuanlucas@gmail.com', 'Portfólio - Rhuan Lucas');
    $mail->addAddress('contactrhuanlucas@gmail.com',  'Rhuan Lucas');

    $mail->isHTML(true);
    $mail->Subject = $name.' - Contato de Portfólio';
    $mail->Body = '<p><strong>Nome:</strong> ' . $name . '</p></br>' .
                  '<p><strong>Email:</strong> ' . $email . '</p></br>' .
                  '<p><strong>Celular:</strong> ' . $tel . '</p></br>' .
                  '<p><strong>Mensagem:</strong> ' . $message . '</p>';
    $mail->AltBody = 'Nome: ' . $name . '\r\n' .
                      'Email:' . $email . '\r\n' .
                      'Telefone: ' . $tel . '\r\n' .
                      'Mensagem: ' . $message;

    $mail->send();

    // E-mail para o usuário
    emailConnect($mailUser);
    $mailUser->addAddress($email, $name);

    $mailUser->isHTML(true);
    $mailUser->Subject = 'Mensagem enviada com sucesso!';
    $mailUser->Body = '<h3>Obrigado por entrar em contato.</h3>'.
                      '<h4>Assim que possível retornarei o e-mail.</h4>'.
                      '<p>Atenciosamente, Rhuan Lucas.</p>';

    $mailUser->send();

  }catch(Exception $e){
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
  }

  function emailConnect($email){
    $email->isSMTP();
    $email->Host = 'smtp.gmail.com';
    $email->SMTPAuth = true;
    $email->Username = LOGIN['USER'];
    $email->Password = LOGIN['PASSWD'];
    $email->SMTPSecure = 'tls';
    $email->Port = 587;

    $email->CharSet = 'UTF-8';
    $email->Encoding = 'base64';
  }
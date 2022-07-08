<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['name']) && isset ($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $message = $_POST['message'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "localhost";
        
        $mail->Username = "steelco1326@gmail.com";
        $mail->Password = "Perroloconegro13";
        $mail->Port = 25; 
        $mail->SMTPSecure = FALSE;
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = FALSE;
        $mail->SMTPDebug = 1;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


        //email settings
        $mail->isHTML(true); 
        $mail->setFrom($email, $name); 
        $mail->addAddress("steelco1326@gmail.com"); 
        $mail->Subject = ("$email ($subject)"); 
        $mail-> Body = $body;


        if($mail->send()){
            $status = "success";
            $response = "email enviado";
            header("Location:index.php");//echo "Message Sent!";         
        }
        else{
            $status = "fallado";
            $response = "algo falló: <br>" . $mail->ErrorInfo;
        }
        exit(json_encode(array("status" => $status, "response" => $response)));

    }

?>
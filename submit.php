<?php
$Alert="";
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['configuration']) && isset($_POST['budget'])) {
    $name=($_POST['name']);
    $email=($_POST['email']);
    $mobile=($_POST['mobile']);
    $configuration=($_POST['configuration']);
    $budget=($_POST['budget']);
    
    $Alert="Message Sent Successfully..";
    
    $html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email-Id</td><td>$email</td></tr><tr><td>Mobile-Number</td><td>$mobile</td></tr><tr><td>Configuration</td><td>$configuration</td></tr><tr><td>Budget</td><td>$budget</td></tr></table>";
    
    include('./smtp/PHPMailerAutoload.php');
    // include_once "./PHPMailer/PHPMailer.php";
    // include_once "./PHPMailer/Exception.php";
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="ashish.y@ditechcdm.com";
    $mail->Password="Seven@Feb#2022";
    $mail->SetFrom("ashish.y@ditechcdm.com");
    $mail->addAddress("ashish.y@ditechcdm.com");
    $mail->IsHTML(true);
    $mail->Subject="SANSKRUTI VRUSHI - ENQUIRY FORM";
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if ($mail->send()) {
        //echo "Mail send";
    } else {
        //echo "Error occur";
    }
    echo $Alert;
}
?>


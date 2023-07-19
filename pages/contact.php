<?php
include '../includes/header.php';

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

if (isset($_POST['send'])) {
    try {
        $mail = new PHPMailer(true);

        $email_host = $_ENV['EMAIL_HOST'];

        $email_username = $_ENV['EMAIL_USERNAME'];
        $email_password = $_ENV['EMAIL_PASSWORD'];

        $email_from_address = $_ENV['EMAIL_FROM_ADDRESS'];
        $email_from_address_nickname = $_ENV['EMAIL_FROM_ADDRESS_NICKNAME'];

        $email_to_address = $_POST['email'];
        $email_to_address_nickname = $_POST['name'];

        $email_subject = $_POST['subject'];
        $email_body = $_POST['message'];

        $email_port = (int)$_ENV['EMAIL_PORT'];

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $email_host;
        $mail->Port = $email_port;
        $mail->SMTPAuth = true;
        $mail->Username = $email_username;
        $mail->Password = $email_password;
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom($email_from_address, $email_from_address_nickname);
        $mail->addAddress($email_from_address, $email_from_address_nickname);
        $mail->addAddress($email_to_address, $email_to_address_nickname);
        $mail->Subject = $email_subject;
        $mail->Body = $email_body;
        $mail->send();


        $success_message = 'sent the mail check inbox';
        $_SESSION['success_message'] = $success_message;
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
    catch (Exception $e) {
        $error_message = 'Email could not be sent. Error: ' . $mail->ErrorInfo;
        $_SESSION['error_message'] = $error_message;
        // Redirect the user back to the same page
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

?>

<div class="contact_page">
    <main class="contact_page_main_content">
        <div class="contact_info_container">
            <div class="contact_info">
                <p><a href="mailto:Colemomrrison321@icloud.com">Colemomrrison321@icloud.com</a></p>
                <p><a href="mailto:Colemomrrison321@gmail.com">Colemomrrison321@gmail.com</a></p>
                <p><a href="tel:904-476-1448">904-476-1448</a></p>
                <p>
                    <a href="https://github.com/colemorrison" target="_blank">GitHub</a>,
                    <a href="https://gitlab.com/colemorrison" target="_blank">GitLab</a>,
                    <a href="https://www.linkedin.com/in/cole-morrison-b7645a27a/" target="_blank">LinkedIn</a>
                </p>
            </div>
        </div>
        <div class="contact_form_container">
            <h2>Contact Me</h2>
            <?php
if (isset($success_message) && !empty($success_message)) {
    echo "<div class=\"email_success_message\">$success_message</div>";
}
else if (isset($error_message) && !empty($error_message)) {
    echo "<div class=\"email_error_message\">$error_message</div>";
}


?>
            <form action="" method="post" class="contact_form">
                <input type=" text" class="form_field" name="name" placeholder="Name" maxlength="75">
                <input type="email" class="form_field" name="email" placeholder="Email" maxlength="75">
                <input type="text" class="form_field" name="subject" placeholder="Subject" maxlength="75">
                <textarea name="message" class="form_field" placeholder="message" maxlength="1000"></textarea>
                <button name="send" class="form_field">Send</button>
            </form>
        </div>
    </main>
</div>
<?php
include '../includes/footer.php';

?>
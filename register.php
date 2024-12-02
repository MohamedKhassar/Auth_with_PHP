<?php
$page_title = "Register Page";
include "./includes/header.php";
include "./includes/navbar.php";

if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to,$name,$verifying_token)
{
    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth=true;
        $mail->Username = $_ENV['EMAIL']; // Your email
        $mail->Password = $_ENV['APP_PASS']; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;

        $mail->setFrom($_ENV['EMAIL'], $_ENV['NAME']);
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = 'Email verification';
        $mail->Body = '<b>
        <h1>Verify your email</h1>
        <p>Hello '. $name. ',</p>
        <p>Click on the link below to verify your email address.</p>
        <a href="http://localhost/Auth_with_PHP/verify.php?verifying_token='.$verifying_token.'" class="btn btn-success">click here</a>
        </b>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$err_pass = null;
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    try {

        if ($password === $confirm_password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $verify_token=hash("sha256",uniqid());
            $query = "INSERT INTO users (name, phone_number, email, password,verify_token) VALUES ('$name', '$phone_number', '$email', '$hash','$verify_token')";
            mysqli_query($con, $query);
            if(empty($error)){
                send_mail($email,$name,$verify_token);
            }
            $success = "user created successfully please check your mailbox and confirm your account";
        } else {
            $err_pass = "Passwords do not match";
        }
    } catch (mysqli_sql_exception $e) {
        $error = "something's wrong: " . $e->getMessage();
    }
}

?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <?php if ($error):  ?>
                <div class="col-md-8 text-capitalize fw-bolder alert alert-danger">
                    <?php echo $error  ?>
                </div>
            <?php endif; ?>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header p-3">
                            <h5>
                                Register Form
                            </h5>
                        </div>
                        <form method="post" class="my-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="Phone_number" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" id="Phone_number" name="phone_number">
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="Confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="Confirm_password" name="confirm_password">
                            </div>
                            <div class="mb-3">
                                <?php if ($err_pass):  ?>
                                    <div class="alert alert-danger"><?php echo $err_pass  ?></div>
                                <?php elseif ($success):  ?>
                                    <div class=" text-capitalize alert alert-success">
                                        <?php
                                        echo $success
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" name="register" class="btn-lg btn btn-primary text-capitalize">register now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>
<?php
$page_title = "Login Page";
include "./includes/header.php";
include "./includes/navbar.php";
if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
}
$error_log = null;
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email'";
    try {
        
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $db_password = $row['password'];
            if (password_verify($password, $db_password)) {
                if($row['is_confirmed']){

                    session_start();
                    $_SESSION['user'] = ['email' => $email, 'name' => $row['name'], 'phone_number' => $row['phone_number'], 'is_confirmed' => $row['is_confirmed']];
                    header("Location: dashboard.php");
                }else{
                    $error_log = "Please confirm your email first";
                }
            } else {
                $error_log = "Invalid email or password";
            }
        } else {
            $error_log = "Invalid email or password";
        }
    } catch (mysqli_sql_exception $e) {
        $error_log = "Something's Wrong". $e->getMessage();
        // die();
    }
}
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header p-3">
                            <h5>
                                Login Form
                            </h5>
                        </div>
                        <form method="post" class="my-3">
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <?php if ($error_log):  ?>
                                <div class="mb-3">
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_log; ?>

                                    </div>
                                </div>
                            <?php endif;  ?>
                            <button type="submit" name="login" class="btn-lg btn btn-primary text-capitalize">login now</button>
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
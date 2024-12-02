<?php
$page_title = "Verify Page";
include "./includes/header.php";
include "./includes/navbar.php";
if (isset($_GET['verifying_token'])) {
    $query = "SELECT * FROM users WHERE verify_token = '$_GET[verifying_token]'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) >0) {
        $query1 = "UPDATE users SET is_confirmed=true WHERE verify_token = '$_GET[verifying_token]'";
        $result1 = mysqli_query($con, $query1);
        if ($result1) {
            echo "
            <div class='row justify-content-around my-5'>
            <div class='col-md-4 text-capitalize fw-bolder alert alert-success'>
            Email verified successfully. You can now login.
            <a href='login.php' class='ms-5 btn btn-dark text-capitalize'>go to login page</a>
            </div>
            </div>
            ";
        } else {
            echo "
            <div class='row justify-content-around my-5'>
            <div class='col-md-8 text-capitalize fw-bolder alert alert-danger'>
            Failed to verify email. Please try again.
            </div>
            </div>
            ";
        }
    }else{
        echo "
        <div class='row justify-content-around my-5'>
        <div class='col-md-8 text-capitalize fw-bolder alert alert-danger'>
        Invalid or expired verification link. Please check your email for the latest link.
        <a href='dashboard.php' class='btn btn-danger text-capitalize'>back to home page</a>
        </div>
        </div>
        ";
    }
}

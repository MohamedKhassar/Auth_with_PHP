<?php
$page_title = "Register Page";
include "./includes/header.php";
include "./includes/navbar.php";
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-header p-3">
                            <h5>
                                Register Form
                            </h5>
                        </div>
                        <form method="post"  class="my-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="Phone_number" class="form-label">Phone number</label>
                                <input type="email" class="form-control" id="Phone_number" name="Phone_number">
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email" name="Email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="Confirm_password" class="form-label">Confirm Password</label>
                                <input type="email" class="form-control" id="Confirm_password" name="Confirm_password">
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
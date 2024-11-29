<?php
$page_title = "Login Page";
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
                                Login Form
                            </h5>
                        </div>
                        <form method="post"  class="my-3">
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email" name="Email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
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
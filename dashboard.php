<?php
include "./includes/header.php";
include "./includes/navbar.php";
if(empty($_SESSION)){
    header("Location: login.php");
}
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize">user dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h2>access when you're logged in</h2>
                    </div>
                    <div class="card-body text-capitalize">
                        <h2>you're information</h2>
                        <ul>
                            <li>
                                email: <?php echo $_SESSION['user']['email'] ?>
                            </li>
                            <li>
                                name: <?php echo $_SESSION['user']['name'] ?>
                            </li>
                        </ul>
                        <a href="logout.php" class="btn btn-danger">logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>
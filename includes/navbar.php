<?php 
include "./includes/connect_db.php";

?>
<div class="bg-dark p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><h3>Mohamed Khassar</h3></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 ms-auto mb-lg-0 fs-5">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">Home</a>
                                    </li>
                                <?php 
                                if(!empty($_SESSION['user'])):
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                                </li>
                                <?php else:  ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                                <?php endif  ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
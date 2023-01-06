<?php session_start(); ?>
<!doctype html>
<html lang="en">

<!-- Mirrored from vetra.laborasyon.com/demos/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Jan 2023 19:34:27 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - MedX</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/Logo.png"/>

    <!-- Themify icons -->
    <link rel="stylesheet" href="dash/dist/icons/themify-icons/themify-icons.css" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="dash/dist/css/app.min.css" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="auth">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->


    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="d-block d-lg-none text-center text-lg-start">
                                    <a href="index.html"><img width="120" src="assets/images/Logo.png" alt="logo"></a>
                                </div>
                                <div class="my-5 text-center text-lg-start">
                                    <h1 class="display-8">Sign In</h1>
                                    <p class="text-muted">Sign in to MedX to continue</p>
                                </div>
                                <?php
                                        ob_start();
                                        include('php/db_connect.php');
                                        if (isset($_POST['login']))
                                        {
                                            
                                            $username = mysqli_real_escape_string($con, $_POST['username']);
                                            $password = mysqli_real_escape_string($con, $_POST['password']);
                                            
                                            $query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
                                            $row		= mysqli_fetch_array($query);
                                            $num_row 	= mysqli_num_rows($query);

                                            echo $num_row;
                                            
                                            if ($num_row > 0) 
                                            {	
                                                $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                                                $row = mysqli_fetch_array($query);
                                                $fname = $row['fullname'];
                                                // $accounttype = $row['account_type'];
                                                // $billingstatus = $row['billing_status'];
                                                
                                                $_SESSION['name'] = $fname;
                                                $_SESSION['username'] = $username;
                                                // $_SESSION['billing_status'] = $billingstatus;
                                                // $_SESSION['account_type'] = $accounttype;
                                                echo '<script type="text/javascript">';
                                                // if ($accounttype === '0'){
                                                //     echo 'window.location.href = "dash/admin/dashboard.php"';
                                                // }elseif ($accounttype === '1'){
                                                echo 'window.location.href = "dash/index.php"';
                                                //}
                                                echo '</script>';
                                                
                                                }
                                            else
                                            {
                                                echo "<script language='javascript'>";
                                                echo "alert('Incorrect Details!')";
                                                echo "</script>";
                                            }
                                        }
                                ?>
                                <form class="mb-5" action="" method="post">
                                    <div class="mb-3">
                                        <input name = 'username' type="email" class="form-control" placeholder="Enter email" autofocus
                                               required>
                                    </div>
                                    <div class="mb-3">
                                        <input name = 'password' type="password" class="form-control" placeholder="Enter password"
                                               required>
                                    </div>
                                    <div class="text-center text-lg-start">
                                        <p class="small">Can't access your account? <a href="#">Reset your password now</a>.</p>
                                        <!-- <button class="btn btn-primary">Sign In</button> -->
                                        <input type="submit" class="button btn btn-success btn-block" name="login" value="Login">
                                    </div>
                                </form>
                                
                                <p class="text-center d-block d-lg-none mt-5 mt-lg-0">
                                    Don't have an account? <a href="#">Sign up</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                        <div class="logo">
                        <a href="index.html"><img width="120" src="assets/images/Logo.png" alt="logo"></a>
                        </div>
                        <div>
                            <h3 class="fw-bold">Welcome to MedX!</h3>
                            <p class="lead my-5">If you don't have an account, would you like to register right now?</p>
                            <a href="#" class="btn btn-primary">Sign Up</a>
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Bundle scripts -->
<script src="dash/libs/bundle.js"></script>

<!-- Main Javascript file -->
<script src="dash/dist/js/app.min.js"></script>
</body>

<!-- Mirrored from vetra.laborasyon.com/demos/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Jan 2023 19:34:27 GMT -->
</html>

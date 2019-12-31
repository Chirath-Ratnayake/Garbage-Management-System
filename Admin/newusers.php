<?php
session_start();
if(!$_SESSION['id'])
{
    $msg="Session Not Started";
    echo "<script>window.top.location='../login.php?msg=$msg'</script>";
//header("Location:index.php");

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New User</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"  />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Dashboard</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">
                            <span data-feather="file"></span>
                            Pending Reports
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="all_reports.php">
                            <span data-feather="file"></span>
                            All Reports
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">
                            <span data-feather="users"></span>
                            Administrators
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gtf.php">
                            <span data-feather="users"></span>
                            Green Task Force
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="garbagestaff.php">
                            <span data-feather="users"></span>
                            Garbage Staff
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="greenmanagers.php">
                            <span data-feather="users"></span>
                            Green Managers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="changesettings.php">
                            <span data-feather="settings"></span>
                            Change Settings
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="newusers.php">
                            <span data-feather="users"></span>
                            Add New Users
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Blog</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="allposts.php">
                            <span data-feather="file-text"></span>
                            All Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="newposts.php">
                            <span data-feather="file-text"></span>
                            New Post
                        </a>
                    </li>


                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>

            </div>

            <div class="container">
                <h2>New User Details</h2>
                <?php

                $U_ID=$_SESSION['id'];

                ?>
                <form id="myform" action="add/newuseradd.php?U_ID=<?php echo $U_ID;?>" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" class="form-control" placeholder="First Name" name="fname">
                    </div>
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    </div>
                    <div class="form-group">
                        <label>User Name :</label>
                        <input type="text" class="form-control" placeholder="User Name" name="uname">
                    </div>
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password :</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                    </div>
                    <div class="form-group">
                        <label>Role :</label>
                        <select class="form-control" name="role">
                            <option value="0">Select the Role</option>
                            <option value="1">Administrator</option>
                            <option value="2">Manager </option>
                            <option value="3">garbage_Staff </option>

                        </select>

                    </div>

                    <button id="saveForm" type="button" class="btn btn-success">Create</button>
                </form>
                <span id="result"></span>
            </div>
            <br>


        </main>

        <script src="../js/jquery-2.2.3.min.js"></script>
        <script>
            $("#saveForm").click(function(){
                $.post( $("#myform").attr("action"), $("#myform :input").serializeArray(), function(info){ $("#result").html(info); });
                clearInput();

            });

            $("#myform").submit(function(){
                return false;
            });

            /*function clearInput(){

             $("#myform :input").each(function(index, element) {
             $(this).val('NA');
             });

             }*/
        </script>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>

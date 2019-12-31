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
    <title>Account Settings</title>

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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Green Captain Dashboard</a>
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
                            New Reports
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="mycomplete.php">
                            <span data-feather="file"></span>
                            My Completed Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="spam.php">
                            <span data-feather="file"></span>
                            Spam Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="changesettings.php">
                            <span data-feather="users"></span>
                            Account Settings
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
                <h2>Change Details</h2>
                <?php

                $U_ID=$_SESSION['id'];

                include '../connection.php';
                $check_query=$db->query("SELECT * FROM users WHERE U_ID='$U_ID'");
                $check_query_Run=$check_query->fetch_assoc();

                ?>
                <form id="myform" action="edit/editdetails.php?U_ID=<?php echo $U_ID;?>" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['F_Name'];?>" name="fname">
                    </div>
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['L_Name'];?>" name="lname">
                    </div>
                    <div class="form-group">
                        <label>User Name :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['U_Name'];?>" name="uname">
                    </div>

                    <button id="saveForm" type="button" class="btn btn-warning">Update</button>
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

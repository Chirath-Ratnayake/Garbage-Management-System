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
    <title>Edit Report</title>

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
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GTF Dashboard</a>
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
                            All sent Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="newreport.php">
                            <span data-feather="file"></span>
                            New Report
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="changesettings.php">
                            <span data-feather="settings"></span>
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
                <h2>Change Report</h2>
                <?php
                $R_ID=$_REQUEST ['R_ID'];
                $U_ID=$_SESSION['id'];

                include '../connection.php';
                $check_query=$db->query("SELECT * FROM reports WHERE R_ID='$R_ID'");
                $check_query_Run=$check_query->fetch_assoc();

                ?>
                <form action="edit/editreport.php?R_ID=<?php echo $R_ID;?>&&img=<?php echo $check_query_Run['R_URL'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <img src="../reportimages/<?php echo $check_query_Run['R_URL'];?>" width="150" height="150"/>
                        <br>
                        <label>Uploaded Image:</label>
                    </div>
                    <div class="form-group">
                        <label>Select the new Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['Location'];?>" name="location">
                    </div>
                    <div class="form-group">
                        <label>Location :</label>
                        <input type="text" class="form-control" value="<?php echo $check_query_Run['gps'];?>" name="gps">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="desc" class="form-control"><?php echo $check_query_Run['Desciption'];?></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
            <br>
            <form action="delete/deletereport.php?R_ID=<?php echo $R_ID;?>&&img=<?php echo $check_query_Run['R_URL'];?>" method="post" >
                <button type="submit" class="btn btn-danger">Remove Report</button>
            </form>
        </main>
    </div>
</div>
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"></script>')
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script></body>
</html>

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
    <title>Completed Reports</title>

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
                  <a class="nav-link" href="index.php">
                      <span data-feather="file"></span>
                      New Reports
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="mycomplete.php">
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
                  <a class="nav-link" href="changesettings.php">
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




      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Location</th>
              <th>GPS code</th>
              <th>Status</th>
                <th>GTF Name</th>
                <th>Date</th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
          <?php
          $U_ID=$_SESSION['id'];
          include '../connection.php';
          $query=$db->query("SELECT * FROM reports INNER JOIN users ON users.U_ID=reports.Upload_U_ID WHERE Manager_ID='$U_ID' && Post_Status!='0' ORDER by R_ID DESC ");
          while ($query_run=$query->fetch_assoc()){
              ?>
              <tr>
                  <td><?php echo $R_ID=$query_run['R_ID'];?></td>
                  <td><?php echo $query_run['Location'];?></td>
                  <td><?php echo $query_run['gps'];?></td>
                  <td><?php $Post_Status=$query_run['Post_Status'];
                  if ($Post_Status=="0"){
                      ?>
                      <span class="btn-warning">Pending</span>
                      <?php
                  }elseif ($Post_Status=="1"){
                      ?>
                      <span class="btn-success">Completed</span>
                      <?php
                  }elseif ($Post_Status=="2"){
                      ?>
                      <span class="btn-danger">Rejected</span>
                      <?php
                  }elseif ($Post_Status=="3"){
                      ?>
                      <span class="btn-info">Importance</span>
                      <?php
                  }
                  ?></td>
                  <td><?php echo $query_run['F_Name']." ".$query_run['L_Name'];
                  ?></td>
                  <td><?php echo $query_run['Post_Date'];?></td>

                  <?php
                  if ($Post_Status=="1"){
                      ?>
                      <td><form action="edit/editreport.php?R_ID=<?php echo $R_ID;?>&&U_ID=<?php echo $U_ID;?>" method="post">
                              <div class="form-group">
                                  <select class="form-control col-7" name="proceed">
                                      <option value="1">Select the Proceed</option>
                                      <option value="2">Importance</option>
                                      <option value="3">Reject</option>
                                      <option value="0">Pending</option>
                                  </select>
                              </div>
                              <button disabled type="submit" class="btn btn-info">Update</button>
                          </form></td>
                      <?php
                  }else{
                      ?>
                      <td><form action="edit/editreport.php?R_ID=<?php echo $R_ID;?>&&U_ID=<?php echo $U_ID;?>" method="post">
                              <div class="form-group">
                                  <select class="form-control col-7" name="proceed">
                                      <option value="4">Select the Proceed</option>
                                      <option value="3">Importance</option>
                                      <option value="2">Reject</option>
                                      <option value="0">Pending</option>
                                  </select>
                              </div>
                              <button type="submit" class="btn btn-info">Update</button>
                          </form></td>

                      <?php
                  }
                  ?>  <td>

                          <form action="viewreport.php?R_ID=<?php echo $R_ID;?>" method="post">

                              <button type="submit" class="btn btn-success">View</button>
                          </form></td>

              </tr>
              <?php
          }
          ?>


          </tbody>
        </table>
      </div>
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

<?php

include_once('../config.php');
include_once('notify.php');
//session_start();
notify();
$id = $_SESSION['elogid'];
//echo $id;
if(isset($_SESSION['elogid']))
{
$q = "select * from login join employer on login.log_id=employer.log_id WHERE login.log_id = $id";
//echo $q;
$result = mysqli_query($db1, $q);// or die("Selecting user profile failed");
$row = mysqli_fetch_array($result);
//  echo $row['log_id'];
    $_SESSION['eid']=$row['eid'];
    $_SESSION['name']=$row['ename'];
}
else
{
header('location:../login.php?msg=please_login');
}
if(isset($_GET['msg']) &&  $_GET['msg']=="jobposted") {

    ?>
    <script type="text/javascript"> alert("Job Successfully Posted");</script>
    <?php
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $row['ename']; ?></title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">

            <ul class="nav navbar-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Job Portal</a>
                </div>
                <li class="active"><a href="#">Profile<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Notifications&nbsp;&nbsp;<span class="badge">&nbsp;&nbsp;<?php echo $notifycount; ?></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="managejobs.php">Manage Jobs</a></li>

                    </ul>
                </li>
            </ul>
           
<?php 
    include_once "includes/dbconnect.inc.php";
    include_once "includes/function.inc.php";
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin Subject Creation </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="custom.css">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title"><i class="fa fa-building-o"></i> Create New Department</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-building-o"></i> Department</li>
                                    <li><a href="#"><i class="fa fa-building-o"></i> Create New Department</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">


                                <div class="panel">
                                    <div class="col-md-8 col-md-offset-2 pt-20">
                                        <?php
                                if(isset($_GET['error']) == "alAva"){ ?>
                                        <div class="alert alert-danger left-icon-alert alert-dismissible fade in text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Department is Already Available!</strong>
                                        </div>
                                        <?php    }
                            ?>
                                    </div>
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5><i class="fa fa-building-o"></i> Create Department</h5>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <form action="process/deprtmnt/pr-nwdept.php" method="POST">
                                            <div class="form-group has-success">
                                                <label for="default" class="col-sm-2 control-label">Department Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="Dname" class="form-control" id="default" placeholder="Department Name" required pattern="[A-Z a-z'\-]+">
                                                    <span class="help-block">Eg- CSD, EDUC, NURSING etc</span>

                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="default" class="col-sm-2 control-label">Department Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="Dcode" class="form-control" id="default" placeholder="Department Code" required pattern="[A-Z a-z 0-9'\-]+">

                                                    <span class="help-block">Eg- CSD123, EDUC123, NURSING445 etc</span>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="col-md-6 col-md-offset-2 pt-20">
                                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>
    <!-- /.main-wrapper -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });

    </script>
</body>

</html>

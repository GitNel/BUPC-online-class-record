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
    <title>Admin change password</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="custom.css">
    <script src="js/modernizr/modernizr.min.js"></script>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar.php');?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title"><i class="fa fa fa-key"></i> User Change Password</h2>
                            </div>

                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li><i class="fa fa fa-key"></i> User Change Password</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">





                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5 class="pt-20 pb-10"><i class="fa fa fa-key"></i> Change Password</h5>
                                            </div>

                                            <?php 
                                        if(isset($_GET['succ'])){ ?>
                                            <div class="col-md-12 pt-30">
                                                <div class="alert alert-success left-icon-alert fade in text-center" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Password Changed Successfully!</strong>
                                                </div>

                                            </div>
                                            <?php    }
                                        else if(isset($_GET['errnwpass'])){ ?>
                                            <div class="col-md-12 pt-30">
                                                <div class="alert alert-danger left-icon-alert fade in text-center" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>New Password Not Matched!</strong>
                                                </div>

                                            </div>
                                            <?php    } 
                                            else if(isset($_GET['notmatch'])){ ?>
                                            <div class="col-md-12 pt-30">
                                                <div class="alert alert-danger left-icon-alert fade in text-center" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Password Not Matched!</strong>
                                                </div>

                                            </div>
                                            <?php    }
                                            else{
                                                echo " ";
                                            }
                                    ?>
                                        </div>




                                        <div class="panel-body">

                                            <form action="process/user/pr-upd-pass.php" method="POST">
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label">Current Password</label>
                                                    <div class="">
                                                        <input type="password" name="password" class="form-control" required="required" id="success">

                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label">New Password</label>
                                                    <div class="">
                                                        <input type="password" name="newpassword" required="required" class="form-control" id="success">
                                                    </div>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label">Confirm Password</label>
                                                    <div class="">
                                                        <input type="password" name="confirmpassword" class="form-control" required="required" id="success">
                                                    </div>
                                                </div>

                                                <input type="hidden" name="user" value="<?php echo $_SESSION['USER']?>">
                                                <div class="form-group has-success">

                                                    <div class="">
                                                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Change<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>
                                                </div>



                                            </form>




                                        </div>
                                        <!-- /.col-md-8 col-md-offset-2 -->
                                    </div>
                                    <!-- /.row -->




                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->

            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>



    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>
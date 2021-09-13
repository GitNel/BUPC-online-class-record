<?php
    include_once "includes/dbconnect.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <!--    <link rel="stylesheet" href="css/prism/prism.css" media="screen">  USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="custom.css">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="main pr-50 bckgrnd">
    <div class="main-wrapper">
        <div class="row">



            <div class="col-lg-12">
                <section class="section">
                    <div class="row mt-40">


                        <div class="col-md-10 col-md-offset-1 pt-50">
                            <div class="row mt-30 ">
                                <div class="col-md-12">
                                    <div class="panel ind">

                                        <?php
                                            if(isset($_GET['error'])){
                                                if(isset($_GET['error']) == "Usrntfnd"){ ?>
                                        <div class="alert alert-danger alert-dismissible fade in text-center indal">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>User Not Found!</strong>
                                        </div>
                                        <?php   }
                                            }
                                        
                                        
                                        else if(isset($_GET['signin']) == "success"){?>
                                        <div class="alert alert-success alert-dismissible fade in text-center indal">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success! Log in Now</strong>
                                        </div>
                                        <?php     }
                                        
                                        else{
                                            echo " ";
                                        }
                                        
                                        
                                        ?>


                                        <div class="panel-heading">
                                            <div class="panel-title text-center">
                                                <h4>Online Class Record</h4>
                                            </div>
                                        </div>
                                        <div class="panel-body mt-25">

                                            <div class="section-title text-center">
                                                <p class="sub-title">Bicol University Polangui Campus</p>
                                            </div>

                                            <form class="form-horizontal" action="process/login/pr-login.php" method="POST">
                                                <div class="form-group">
                                                    <!--                                                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>-->
                                                    <div class="col-sm-10">
                                                        <input type="text" name="username" class="form-control indform" id="inputEmail3" placeholder="UserName" required pattern="[A-Za-z0-9'\-]+">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--                                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>-->
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" class="form-control indform" id="inputPassword3" placeholder="Password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-20">
                                                    <div class="col-sm-offset-3 col-sm-6">

                                                        <button type="submit" name="login" class="btn btn-primary btn-labeled pull-right">Log in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="crteacc pt-5">
                                                <div class="col-md-6">
                                                    <h3><a href="createacc/createacc.php">
                                                            <li class="fa fa-user"></li> Create Account
                                                        </a></h3>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                    <p class="text-muted text-center"><small>Copyright © 2021 - @jhunpaul - @arnel - @jhonhenrick </small> </p>
                                </div>
                                <!-- /.col-md-11 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </section>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /. -->


    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function() {

        });

    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>

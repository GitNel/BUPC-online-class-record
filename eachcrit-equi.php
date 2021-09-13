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
    <title>SRMS Admin Manage Subjects</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
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

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php');?>

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title"><i class="fa fa-percent"></i> Add Equivalence</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-percent"></i> Criteria</li>
                                    <li><i class="fa fa-percent"></i> Manage Criteria</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">



                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel">
                                        <?php 
                                        if(isset($_GET['error']) == '$critid'){ ?>
                                        <div class="col-md-8 col-md-offset-2 pt-20">
                                            <div class="alert alert-danger left-icon-alert fade in text-center" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Total equivalent is not equal to 100%!</strong>
                                            </div>

                                        </div>
                                        <?php    }
                                       
                                    ?>
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5><i class="fa fa-file-text"></i> View Criteria List</h5>
                                            </div>
                                        </div>

                                        <div class="panel-body">



                                            <?php
                                                if(isset($_GET['critid'])){
                                                    $critid = "";
                                                    $critid = htmlentities($_GET['critid']);
                                                    $arr = CompoOnly($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>
                                            <form action="process/criteria/pr-critequi.php" method="POST">

                                                <?php
                                                    if(!empty($val['comp1'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label"><?php echo $val['comp1']?></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="comp1" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                ?>

                                                <?php
                                                    if(!empty($val['comp2'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label"><?php echo $val['comp2']?></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="comp2" min="1" max="100" class="form-control" required>
                                                    </div>

                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp3'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp3']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp3" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp4'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp4']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp4" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp5'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp5']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp5" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp6'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp6']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp6" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp7'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp7']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp7" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp8'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp8']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp8" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp9'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp9']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp9" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp10'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp10']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp10" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <input type="hidden" name="critid" value="<?php echo $val['crit_id']?>">
                                                <input type="hidden" name="subjid" value="<?php echo $val['subj_id']?>">
                                                




                                                <div class="">
                                                    <div class="col-md-6 col-md-offset-2 pt-20">
                                                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>

                                                </div>
                                            </form>

                                            <?php
                                                        }
                                                }
                                            //END OF SUCCESS .. this show if error occur
                                                else{
                                                
                                                $critid = "";
                                                if(isset($_GET['error'])){
                                                    $critid = htmlentities($_GET['error']);
                                                    $arr = CompoOnly($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>
                                            <form action="process/criteria/pr-critequi.php" method="POST">

                                                <?php
                                                    if(!empty($val['comp1'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label"><?php echo $val['comp1']?></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="comp1" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                ?>

                                                <?php
                                                    if(!empty($val['comp2'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label"><?php echo $val['comp2']?></label>
                                                    <div class="col-sm-4">
                                                        <input type="number" name="comp2" min="1" max="100" class="form-control" required>
                                                    </div>

                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp3'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp3']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp3" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp4'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp4']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp4" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp5'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp5']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp5" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp6'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp6']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp6" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp7'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp7']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp7" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp8'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp8']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp8" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp9'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp9']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp9" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <?php
                                                    if(!empty($val['comp10'])){ ?>
                                                <div class="form-group has-success">
                                                    <label for="default" class="col-sm-2 control-label pt-20"><?php echo $val['comp10']?></label>
                                                    <div class="col-sm-4 pt-20">
                                                        <input type="number" name="comp10" min="1" max="100" class="form-control" required>
                                                    </div>
                                                </div>
                                                <?php    }
                                                            else{
                                                                echo " ";
                                                            }
                                                
                                                ?>

                                                <input type="hidden" name="critid" value="<?php echo $val['crit_id']?>">
                                                <input type="hidden" name="subjid" value="<?php echo $val['subj_id']?>">
                                                




                                                <div class="">
                                                    <div class="col-md-6 col-md-offset-2 pt-20">
                                                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>

                                                </div>
                                            </form>

                                            <?php
                                                        }
                                                }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->


                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </section>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>


    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>
    <!--    <script src="js/DataTables/datatables.min.js"></script>-->

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <!--
    <script>
        $(function($) {
            $('#example').DataTable();

            $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });

            $('#example3').DataTable();
        });

    </script>
-->

</body>

</html>

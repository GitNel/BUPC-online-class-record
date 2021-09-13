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
    <title>SRMS Admin Manage Classes</title>
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
                                <h2 class="title">Manage Class Assessment</h2>

                            </div>

                            <div class="col-md-6 pt-10">
                                <a href="#nwork" data-toggle="modal" data-target="#nwork"><button class="btn btn-success btn-labeled right">New Assessment<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Criteria</li>
                                    <li class="active">Manage Class Assessment</li>
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
                                        <div class="panel-heading">
                                            <div class="col-md-8 col-md-offset-2">
                                                <?php
                                                    if(isset($_GET['succ'])){ ?>
                                                <div class="alert alert-success left-icon-alert alert-dismissible fade in text-center indal">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Class Added Successfully!</strong>
                                                </div>
                                                <?php    }
                                            
                                            ?>
                                            </div>

                                            <div class="panel-title">
                                                <h3>View Class Assessment</h3>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Assessment Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                  $wrklist = "";
                                                        if(isset($_GET['wrklist'])){
                                                        $wrklist = htmlentities($_GET['wrklist']);
                                                        $arr = AssListPerSubj($conn, $wrklist);
                                                        foreach($arr as $key => $val){
                                                            $no = $key;
                                                            $no++;
                                                    

                                                ?>
                                                
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $val['grad_name'];?></td>
                                                        <td>
                                                            <a href="manage-grading.php?critid=<?php echo $val['grad_id']?>"><i class="fa fa-list" title="See Assessment"></i> </a>

                                                        </td>
                                                    </tr>
                                                      <?php
                                                    }
                                                        }
                                                    
                                                    ?>



                                                </tbody>
                                            </table>
                                          
                                            <!-- /.col-md-12 -->
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


    <div class="modal fade" id="nwork" tabindex="-1" role="dialog" aria-labelledby="nwork" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" id="myModalLabel"></h4>

                </div>
                <div class="modal-body">

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <?php 
                                        if(isset($_GET['wrkadd']) == "succ"){ ?>
                                    <div class="col-md-8 col-md-offset-2 pt-20">
                                        <div class="alert alert-success left-icon-alert fade in text-center" role="alert">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>New Work Added Successfully!</strong>
                                        </div>

                                    </div>
                                    <?php    }
                                    ?>

                                    <div class="panel-heading">

                                    </div>


                                    <div class="panel-body">

                                        <form action="process/grading/pr-grad.php" method="POST">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Name of Work</label>
                                                <div class="">
                                                    <input type="text" name="wrk" class="form-control" required pattern="[A-Z a-z 0-9'\-\#]+" id="success">
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Category</label>
                                                <select class="has-success form-control" name="critpair">
                                                    <?php
                                                    $critid = "";
                                                
                                                    if(isset($_GET['wrklist'])){
                                                        $critid = htmlentities($_GET['wrklist']);
                                                        $arr = CompoList($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>
                                                    <?php if(!empty($val['comp1'])){ ?>
                                                    <option value="1"><?php echo $val['comp1']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp2'])){ ?>
                                                    <option value="2"><?php echo $val['comp2']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp3'])){ ?>
                                                    <option value="3"><?php echo $val['comp3']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp4'])){ ?>
                                                    <option value="4"><?php echo $val['comp4']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>

                                                    <?php if(!empty($val['comp5'])){ ?>
                                                    <option value="5"><?php echo $val['comp5']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp6'])){ ?>
                                                    <option value="6"><?php echo $val['comp6']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp7'])){ ?>
                                                    <option value="7"><?php echo $val['comp7']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp8'])){ ?>
                                                    <option value="8"><?php echo $val['comp8']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp9'])){ ?>
                                                    <option value="9"><?php echo $val['comp9']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp10'])){ ?>
                                                    <option value="10"><?php echo $val['comp10']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="" class="control-label">Total Points</label>
                                                <input type="number" name="totpts" min="1" max="100" class="form-control" required>
                                            </div>

                                            <?php
                                                    $critid = "";
                                                
                                                    if(isset($_GET['wrklist'])){
                                                        $critid = htmlentities($_GET['wrklist']);
                                                        $arr = CompoList($conn, $critid);
                                                        foreach($arr as $key => $val){ ?>

                                            <input type="hidden" name="critid" value="<?php echo $val['crit_id']?>">
                                            <input type="hidden" name="cat" value="<?php echo $val['equi_id']?>">
                                            

                                            <?php
                                                        }
                                                        }
                                            ?>

                                            <div class="">
                                                <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-8 col-md-offset-2 -->
                        </div>
                        <!-- /.row -->
                        <!-- /.container-fluid -->
                    </section>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
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
</body>

</html>

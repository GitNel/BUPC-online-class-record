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

            div.dataTables_wrapper {
                width: 800px;
                margin: 0 auto;
            }
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
                                <h2 class="title">Grading</h2>

                            </div>


                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Criteria</li>
                                    <li class="active">Manage Criteria</li>
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
                                        if(isset($_GET['succ'])){ ?>
                                        <div class="col-md-8 col-md-offset-2 pt-20">
                                            <div class="alert alert-success left-icon-alert fade in text-center" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Criteria Created Successfully!</strong>
                                            </div>

                                        </div>
                                        <?php    }
                                        else if(isset($_GET['error']) == "alAva"){ ?>
                                        <div class="col-md-8 col-md-offset-2 pt-20">
                                            <div class="alert alert-danger left-icon-alert fade in text-center" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Invalid Action!</strong>
                                            </div>

                                        </div>
                                        <?php }
                                        else{
                                            echo " ";
                                        }
                                    ?>
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>View Grading List</h5>
                                            </div>

                                            <div class="col-md-12">
                                                <h5><a href="manage-grading.php?grad="></a></h5>
                                            </div>
                                        </div>

                                        <?php
                                            if(isset($_GET['critid'])){
                                                
                                                    $critid = "";
                                                        $arr = DisplayGrading($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>

                                        <h2><?php echo $val['class_name']?>-<?php echo $val['class_num']?><?php echo $val['class_section']?> <span><?php echo $val['subj_name']?></span> <span>
                                                <h4><i><?php echo $val['grad_name']?></i></h4>
                                            </span></h2>

                                        <?php
                                                  }   
                                                ?>

                                        <div class="panel-body p-20">


                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">


                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student Name</th>
                                                        <th>Overall Grade</th>
                                                        <th>Points</th>
                                                        <th colspan="2">Action</th>



                                                    </tr>
                                                </thead>



                                                <tbody>
                                                    <?php
                                                    $std = "X";
                                                        $std = htmlentities($_GET['critid']);
                                                        $arr = StudListPerSubj($conn, $std);
                                                        foreach($arr as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                ?>

                                                    <tr>
                                                        <td><?php echo $no?></td>
                                                        <td><?php echo $val['last_name']?>, <?php echo $val['first_name']?></td>
                                                        <td>99.9</td>


                                                        <!--           ---------------shows the list of students per subject------------------------------->

                                                        <form action="process/points/pr-inputpts.php" method="POST">
                                                            <input type="hidden" name="stud" value="<?php echo $val['stud_id']?>">
                                                            <input type="hidden" name="grad" value="<?php echo $val['grad_id']?>">
                                                            <input type="hidden" name="subj" value="<?php echo $val['subj_id']?>">

                                                            <td>
                                                                <?php
                                                    
                                                    $stud = "X";
                                                        $stud = htmlentities($val['stud_id']);
                                                        $arr = TallyPtsGet($conn, $stud);
                                                        foreach($arr as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                ?>

                                                                <?php
                                                            if($val['grad_id'] == $std){
                                                            
                                                            if(($val['tally_pts_get']) == 0){ ?>
                                                            <a></a>
                                                                <?php    } 
                                                            else {
                                                            echo $val['tally_pts_get']; //if there is a point
                                                            } ?> / <?php echo $val['grad_tot_pts']?>


                                                                <?php
                                                        }
                                                        } // end of talllying student points 
                                                        
                                                            ?>
                                                            </td>
                                                            <?php
                                                    
                                                    $stud = "X";
                                                        $stud = htmlentities($val['stud_id']);
                                                        $arr = TallyPtsGet($conn, $stud);
                                                        foreach($arr as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                ?>

                                                            <?php
                                                            if(($val['tally_pts_get']) == 0){ ?>
                                                            <td><button type="input" name="submit" class="btn btn-success">Input</button></td>
                                                           
                                                            <?php    }
                                                            else { ?>
                                                            <td><button type="submit" name="edit" class="btn btn-success">Edit</button></td>
                                                            <?php    }
                                                        }
                                                            ?>
                                                            
                                                            
                                                            
                                                            <td><button type="submit" name="eva" class="btn btn-danger">Evaluate</button></td>
                                                        </form>
                                                    </tr>

                                                    <?php 
                                                        
                                                        }  
                                                        }  
                                                        
                                                        ?>

                                                </tbody>


                                            </table>

                                        </div>


                                        <!-- /.col-md-12 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->


                        </div>
                        <!-- /.col-md-12 -->

                    </section>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>


    <!--    ---------------------------------------   -->
    <div class="modal fade" id="ptsget" tabindex="-1" role="dialog" aria-labelledby="ptsget" aria-hidden="true">
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
                                        if(isset($_GET['crit']) == $critid){ ?>
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

                                        <form action="process/grading/pr-upd-stud-pts.php" method="POST">


                                            <div class="form-group has-success">
                                                <label for="" class="control-label">Points Gathered</label>
                                                <input type="number" name="totpts" min="1" max="100" class="form-control" required>
                                            </div>


                                            <input type="hidden" name="stud" value="<?php echo $stud?>">



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
            $('#example').DataTable({
                "scrollX": true
            });

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

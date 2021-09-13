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
                                        else if(isset($_GET['error']) == '$critid'){ ?>
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
                                                <div class="col-md-6">
                                                    <h5>View Grading List</h5>
                                                </div>

                                                <?php
                                            if(isset($_GET['critid'])){
                                                
                                                    $critid = "";
                                                    $critid = htmlentities($_GET['critid']);  
                                                        $arr = DisplayGrading($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>
                                                <div class="col-md-6">
                                                    <h2><?php echo $val['class_name']?>-<?php echo $val['class_num']?><?php echo $val['class_section']?> <span><?php echo $val['subj_name']?></span></h2>
                                                </div>
                                                
                                                    <?php
                                                  }   
                                                     
                                                ?>
                                            </div>


                                        </div>

                                        <div class="panel-body pt-50">


                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">


                                                <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>Student Name</th>
                                                        <th>Overall Grade</th>


                                                        <?php 
                                                        $grad = "X";
                                                         $grad = htmlentities($_GET['critid']);   
                                                         $arr = ListAllAssPerSubj($conn, $grad); //list all assessment horizontally
                                                        foreach($arr as $key => $grad){ ?>
                                                        <th><a grad-id="<?php echo $grad['grad_id']?>" crit-id="<?php echo $grad['crit_id']?>" onclick="ShowGradId(this);"><?php echo $grad['grad_name']?> <span class="ml-10"> <i class="fa fa-ellipsis-v mylist" aria-hidden="true"></i></span></a></th>
                                                        <?php }
                                                        ?>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $stud = "X";
                                                        $stud = htmlentities($_GET['critid']);
                                                        $arr = ListofStudentPerSubj($conn, $stud); //list all student vertically
                                                        foreach($arr as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                ?>
                                                    <tr>


                                                        <td><?php echo $no?></td>
                                                        <td><?php echo $val['last_name']?>, <?php echo $val['first_name']?></td>
                                                        <td>
                                                        <?php
                                                        $stdgrades = "X";
                                                        $stdgrades = htmlentities($val['stud_id']);
                                                         $arr = StudentGrade($conn, $stdgrades); //shows the grade
                                                        foreach($arr as $key => $stdgrades){ 
                                                
                                                        
                                                       $grade = ( $stdgrades['tenta'] / $stdgrades['totalequi'] ) * 100;
                                                            
                                                        echo number_format($grade);
                                                           
                                                        
                                                                           }
                                                        ?>

                                                        </td>

                                                        <!---------------endddd- ------------------>
                                                        <?php
                                                        $tally = "X";
                                                        $tally = htmlentities($val['stud_id']);
                                                         $arr = TallyperAss($conn, $tally); //tally each student points in specific td
                                                        foreach($arr as $key => $tally){ ?>


                                                        <td>
                                                            <?php 

                                                            if(($tally['tally_pts_get']) == 0){ ?>
                                                            <a data-id="<?php echo $tally['tally_id']?>" onclick="Editpoints(this);" val="<?php echo $tally['subj_id']?>">Input</a> <!-- Display to input a grade -->

                                                            <?php    }
                                                            else{
                                                                echo $tally['tally_pts_get'];
                                                            } ?>

                                                            / <?php echo $tally['grad_tot_pts']?>


                                                        </td>



                                                        <?php }
                                                        ?>


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


    <!--    --------------Inserting of points-------------------------   -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">


                                    <div class="panel-heading">

                                    </div>


                                    <div class="modal-body">
                                        <form method="POST" action="process/grading/pr-upd-stud-pts.php" id="Edit-pts">
                                            <div class="form-group has-success">
                                                <label for="" class="control-label">Points Gathered</label>
                                                <input type="number" name="totpts" min="1" max="100" class="form-control" required>
                                            </div>
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="grad">
                                            <button type="submit" name="submit" class="btn btn-success btn-labeled">Done<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

    <!--    ---------simply copy all data to table tbltallypts------------------------------   -->

    <div class="modal fade" id="Gradidshow" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content minimodal">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">



                                <div class="panel-heading">
                                    <h3>Proceed to evaluation</h3>
                                </div>


                                <div class="modal-body" minibody>

                                    <form method="POST" action="process/points/pr-eva-each-stud.php" id="show-my-grad">

                                        <input type="hidden" name="gradid">
                                        <input type="hidden" name="critid">

                                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Yes<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>


                                    </form>

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


    <!--    --------------------------------------------------------------->

    <!--    --------------------Adding og new assessment------------------------------------>

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
                                                
                                                    if(isset($_GET['critid'])){
                                                        $critid = htmlentities($_GET['critid']);
                                                        $arr = CompoList($conn, $critid);
                                                        foreach($arr as $key => $val){
                                                ?>
                                                    <?php if(!empty($val['comp1'])){ ?>
                                                    <option value="<?php echo $val['eq_comp1']?>"><?php echo $val['comp1']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp2'])){ ?>
                                                    <option value="<?php echo $val['eq_comp2']?>"><?php echo $val['comp2']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp3'])){ ?>
                                                    <option value="<?php echo $val['eq_comp3']?>"><?php echo $val['comp3']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp4'])){ ?>
                                                    <option value="<?php echo $val['eq_comp4']?>"><?php echo $val['comp4']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>

                                                    <?php if(!empty($val['comp5'])){ ?>
                                                    <option value="<?php echo $val['eq_comp5']?>"><?php echo $val['comp5']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp6'])){ ?>
                                                    <option value="<?php echo $val['eq_comp6']?>"><?php echo $val['comp6']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp7'])){ ?>
                                                    <option value="<?php echo $val['eq_comp7']?>"><?php echo $val['comp7']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp8'])){ ?>
                                                    <option value="<?php echo $val['eq_comp8']?>"><?php echo $val['comp8']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp9'])){ ?>
                                                    <option value="<?php echo $val['eq_comp9']?>"><?php echo $val['comp9']?></option>
                                                    <?php
                                                        } else{
                                                        echo "";
                                                                } ?>


                                                    <?php if(!empty($val['comp10'])){ ?>
                                                    <option value="<?php echo $val['eq_comp10']?>"><?php echo $val['comp10']?></option>
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
                                                
                                                    if(isset($_GET['critid'])){
                                                        $critid = htmlentities($_GET['critid']);
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


    <!--    -------------------------------------------------------->


    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!--    ========== PAGE JS FILES ==========-->
    <script src="js/prism/prism.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function($) {
            $('#example').DataTable({

            });

            $('#example2').DataTable({
                "scrollX": true,
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });

            $('#example3').DataTable({

            });
        });

    </script>

    <script>
        function Editpoints(self) {
            var id = self.getAttribute("data-id");
            var grad = self.getAttribute("val");

            document.getElementById("Edit-pts").id.value = id;
            document.getElementById("Edit-pts").grad.value = grad;
            $("#myModal").modal("show");
        } // sends the value on click button

    </script>

    <script>
        function ShowGradId(self) {
            var gradid = self.getAttribute("grad-id");
            var critid = self.getAttribute("crit-id");


            document.getElementById("show-my-grad").gradid.value = gradid;
            document.getElementById("show-my-grad").critid.value = critid;

            $("#Gradidshow").modal("show");
        }

    </script>


</body>

</html>

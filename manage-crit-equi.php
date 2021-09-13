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
                                <h2 class="title">Manage Criteria</h2>

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
                                    ?>
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>View Criteria List</h5>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <?php
                                                $critid = "";
                                                    if(isset($_GET['critid'])){
                                            $critid = htmlentities($_GET['critid']);
                                            $arr = CompoList($conn, $critid);
                                                foreach($arr as $key => $val){
                                                    
                                           
                                            
                                            ?>
                                            <?php if(!empty($val['comp1'])){?>

                                            <h2><?php echo $val['comp1']?></h2>

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $val['comp1']?></th>
                                                        <th>#1</th>
                                                        <th>#2</th>
                                                        <th>#3</th>
                                                        <th>#4</th>
                                                        <th>#5</th>
                                                        <th>#6</th>
                                                        <th>#7</th>
                                                        <th>#8</th>
                                                        <th>#9</th>
                                                        <th>#10</th>



                                                    </tr>
                                                </thead>

                                                <tbody>
                                                   
                                                   <form action="tries2.php" method="POST"></form>
                                                    <tr>
                                                        <td>Total item</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                       
                                                     <tr>
                                                        <td>Points Gathered</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>




                                                </tbody>
                                            </table>
                                            <?php
                                                 }else{ echo " ";}
                                            //-----end of first        
                                                    
                                         if(!empty($val['comp2'])){?>

                                            <h2><?php echo $val['comp2']?></h2>

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#1</th>
                                                        <th>#2</th>
                                                        <th>#3</th>
                                                        <th>#4</th>



                                                    </tr>
                                                </thead>

                                                <tbody>



                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>




                                                </tbody>
                                            </table>
                                            <?php
                                                 }else{ echo " ";}
                                                    
                                                    
                                                 }
                                            }
                                            ?>

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

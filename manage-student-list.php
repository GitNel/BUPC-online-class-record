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
                                <h2 class="title"><i class="fa fa-users"></i> Manage Students List</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-users"></i> Student</li>
                                    <li><a href="manage-students.php"><i class="fa fa-users"></i> Manage Student List</a></li>
                                    <li><i class="fa fa-users"></i> Class List</li>
                                </ul>
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
                                                <strong>Subject Created Successfully!</strong>
                                            </div>

                                        </div>
                                        <?php    }
                                    ?>
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5><i class="fa fa-file-list"></i> View Subjects Info</h5>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Last Name</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    if(isset($_GET['subjectid'])){
                                                    
                                                    $stud = "X";
                                                        $stud = htmlentities($_GET['subjectid']);
                                                        $arr = StudentlistPerSubj($conn, $stud); //list all student vertically
                                                        foreach($arr as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                ?>

                                                    <tr>
                                                        <td><?php echo $no?></td>
                                                        <td><?php echo $val['last_name']?></td>
                                                        <td><?php echo $val['first_name']?></td>
                                                        <td><?php echo $val['middle_name']?></td>

                                                        <td>
                                                            <a stud-id="<?php echo $val['stud_id']?>" subj-id="<?php echo $val['subj_id']?>" onclick="DeleteStud(this);"><i class="fa fa-trash" title="Drop Student"></i> </a>

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
    
<!--    ----------Delete students from student table and tally points table---------------->
     <div class="modal fade" id="deleteMod" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h3>Do you want to delete this student ?</h3>
                                </div>


                                <div class="modal-body" minibody>

                                    <form method="POST" action="process/student/pr-del-stud.php" id="Del-stud">

                                        <input type="hidden" name="id">
                                        <input type="hidden" name="subj">
                                        
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
    
        <script>
        function DeleteStud(self) {
            var id = self.getAttribute("stud-id");
            var subj = self.getAttribute("subj-id");
            
            document.getElementById("Del-stud").id.value = id;
            document.getElementById("Del-stud").subj.value = subj;
           
            $("#deleteMod").modal("show");
        } // sends the value on click button

    </script>
</body>

</html>

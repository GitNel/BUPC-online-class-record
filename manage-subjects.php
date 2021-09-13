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
                                <h2 class="title"><i class="fa fa-file-text"></i> Manage Subjects</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-file-text"></i> Subjects</li>
                                    <li class="active"><i class="fa fa-file-text"></i> Manage Subjects</li>
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
                                        <div class="col-md-8 col-md-offset-2 pt-20">
                                            <?php 
                                        if(isset($_GET['succ'])){ ?>

                                            <div class="alert alert-success left-icon-alert fade in text-center" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Subject Created Successfully!</strong>
                                            </div>


                                            <?php    }
                                        else if(isset($_GET['edit'])){ ?>
                                            <div class="alert alert-success left-icon-alert alert-dismissible fade in text-center indal">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> School Year Successfully Edited!</strong>
                                            </div>
                                            <?php    }
                                        else if(isset($_GET['error'])){ ?>
                                            <div class="alert alert-danger left-icon-alert alert-dismissible fade in text-center indal">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> Match Found!</strong>
                                            </div>
                                            <?php    }
                                        else{
                                                    echo " ";
                                                }
                                    ?>
                                        </div>
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5><i class="fa fa-file-text"></i> View Subjects Info</h5>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject Name</th>
                                                        <th>Subject Code</th>
                                                        <th>Creation Date</th>
                                                        <th>School Year</th>
                                                        <th>Class</th>
                                                        <th>Class Code</th>
                                                        <th>Status</th>


                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php 
                                                        $subjlist = SubjListUser($conn, $_SESSION['USER']);
                                                            foreach($subjlist as $key => $val){
                                                                $no = $key;
                                                                $no++;

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no?></td>
                                                        <td><?php echo $val['subj_name']?></td>
                                                        <td><?php echo $val['subj_code']?></td>
                                                        <td><?php echo $val['subj_create']?></td>
                                                        <td><?php echo $val['sy_name']?></td>
                                                        <td><?php echo $val['class_name']?> <?php echo $val['class_num']?> - <?php echo $val['class_section']?></td>
                                                        <td><?php echo $val['subj_class_code']?></td>
                                                        <td><?php echo $val['subj_stat']?></td>
                                                        <td>
                                                            <a subj-id="<?php echo $val['subj_id']?>" onclick="Editsubj(this);"><i class="fa fa-edit" title="Edit Record"></i> </a>
                                                            <span class="pr-20"> </span>
                                                            <a href=""><i class="fa fa-trash" title="Delete Class"></i> </a>

                                                        </td>
                                                    </tr>

                                                    <?php
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

    <div class="modal fade" id="editsubj" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <form method="POST" action="process/subj/pr-upd-subj.php" id="Edit-subj">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Subject Name</label>
                                                <div class="">
                                                    <input type="text" name="subjneym" class="form-control" id="default" placeholder="Subject Name" required pattern="[A-Z a-z 0-9'\-]+">
                                                    <span class="help-block">Eg- Networking 1, Multimedia Design, Math Modern World etc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Subject Code</label>
                                                <div class="">
                                                    <input type="text" name="subjcode" class="form-control" id="default" placeholder="Subject Code" required pattern="[A-Z a-z 0-9'\-]+">
                                                    <span class="help-block">Eg- IT112, EDUC231 etc</span>

                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Class</label>
                                                <div class="">
                                                    <select class="has-success form-control" name="class">
                                                        <?php 
                                                        
                                                        $sylist = ClassListUser($conn, $_SESSION['USER']);
                                                    foreach($sylist as $key => $val){
                                                        if($val['class_stat'] == 'A'){
                                                            
                                                        
                                                    ?>
                                                        <option value="<?php echo $val['class_id']?>"><?php echo $val['class_name']?> - <?php echo $val['class_num']?> <?php echo $val['class_section']?> (<?php echo $val['sy_name']?>)</option>
                                                        <?php
                                                    }
                                                    }
                                                    ?>
                                                    </select>

                                                </div>
                                            </div>


                                            <input type="hidden" name="id">

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
        function Editsubj(self) {
            var id = self.getAttribute("subj-id");

            document.getElementById("Edit-subj").id.value = id;
            $("#editsubj").modal("show");
        } // sends the value on click button

    </script>
</body>

</html>

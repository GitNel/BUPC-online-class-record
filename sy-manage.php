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
                                <h2 class="title"><i class="fa fa-university"></i> Manage School Year</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-calendar"></i> School Year</li>
                                    <li> <a href="#"><i class="fa fa-university"></i> Manage School Year</a></li>
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
                                                    <strong>New School Year Added Successfully!</strong>
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
                                            <div class="panel-title">
                                                <h3><i class="fa fa-calendar"></i> View School Year</h3>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">

                                                <thead class="text-center">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Shool Year Name</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                    if(!isset($_GET['syman'])){
                                                        $sylist = SyList($conn);
                                                        foreach($sylist as $key => $val){
                                                        $no = $key;
                                                        $no++;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $val['sy_name']?></td>
                                                        <td><?php echo $val['sy_start']?></td>
                                                        <td><?php echo $val['sy_end']?></td>
                                                        <td><?php 
                                                                if($val['sy_stat'] == "A"){ echo "Active"; }
                                                                else{ echo "Inactive"; }?></td>
                                                        <td>
                                                            <a sy-id="<?php echo $val['sy_id'];?>" onclick="Editsy(this);"><i class="fa fa-edit" title="View Record"></i>
                                                            </a> <span class="ml-30"> </span>
                                                            <a href=""><i class="fa fa-trash" title="Delete Record"></i>
                                                            </a>

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

    <!--    -----------------Edit the school year .. * School year name , status------------->
    <div class="modal fade" id="editsy" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <form method="POST" action="process/schlyr/pr-upd-sy.php" id="Edit-sy">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Edit School Year Name</label>
                                                <div class="">
                                                    <input type="text" name="syname" class="form-control" required pattern="[A-Z a-z 0-9'\-]+" id="success">
                                                    <span class="help-block">Eg- 2020-2021 First Semester, 2020-2021 Second Semester etc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Edit Class Start</label>
                                                <div class="">
                                                    <input type="date" name="systart" required class="form-control" id="success">
                                                    <span class="help-block">Eg- August 1, 2021, January 1, 2021 etc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Edit Class End</label>
                                                <div class="">
                                                    <input type="date" name="syend" class="form-control" required id="success">
                                                    <span class="help-block">Eg- August 1, 2021, January 1, 2021 etc</span>
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
        function Editsy(self) {
            var id = self.getAttribute("sy-id");

            document.getElementById("Edit-sy").id.value = id;
            $("#editsy").modal("show");
        } // sends the value on click button

    </script>
</body>

</html>

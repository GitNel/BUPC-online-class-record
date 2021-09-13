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
                                <h2 class="title"><i class="fa fa-users"></i> Manage Classes</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-users"></i> Classes</li>
                                    <li class="active"><i class="fa fa-users"></i> Manage Classes</li>
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
                                                   else if(isset($_GET['edit'])){ ?>
                                                <div class="alert alert-success left-icon-alert alert-dismissible fade in text-center indal">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong> Class Successfully Edited!</strong>
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
                                                <h3><i class="fa fa-file-text"></i> View Classes Info</h3>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Class Name</th>
                                                        <th>Class Year</th>
                                                        <th>Section</th>
                                                        <th>Class Semester</th>
                                                        <th>Date Created</th>
                                                        <th>Class Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php
                                                  
                                                        $classlist = ClassListUser($conn, $_SESSION['USER']);
                                                        foreach($classlist as $key => $val){
                                                            $no = $key;
                                                            $no++;
                                                    
                                                ?>

                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $val['class_name'];?></td>
                                                        <td><?php echo $val['class_num']?></td>
                                                        <td><?php echo $val['class_section']?></td>
                                                        <td><?php echo $val['sy_name']?></td>
                                                        <td><?php echo $val['class_createdate']?></td>
                                                        <td><?php if($val['class_stat'] == 'A'){ echo "Active";}
                                                            else{ echo "Inactive";}?></td>

                                                        <td>
                                                            <a class-id="<?php echo $val['class_id']?>" onclick="EditClass(this);"><i class="fa fa-edit" title="Edit Record"></i> </a> 
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

    <!--    -------------Edit class details----------------------------------->
    <div class="modal fade" id="editclass" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <form method="POST" action="process/class/pr-upd-class.php" id="edit-class">
                                            <div class="form-group has-success">
                                                <label class="control-label">Department</label>

                                                <select class="has-success form-control" name="deptname">
                                                    <?php 
                                                        $sylist = DisplayDeptuser($conn);
                                                    foreach($sylist as $key => $val){
                                                    ?>
                                                    <option value="<?php echo $val['dept_id']?>"><?php echo $val['dept_name']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="form-group has-success">
                                                <label class="control-label">Courses</label>

                                                <select class="has-success form-control" name="crseneym">
                                                    <?php 
                                                        $sylist = manCourse($conn);
                                                    foreach($sylist as $key => $val){
                                                    ?>
                                                    <option value="<?php echo $val['course_name']?>"><?php echo $val['course_name']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>


                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Year</label>
                                                <div class="">
                                                    <input type="number" name="classnum" required class="form-control" id="success" min="1" max="10">
                                                    <span class="help-block">Eg- 1,2,4,5 etc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Section</label>
                                                <div class="">
                                                    <input type="text" name="section" class="form-control" required onkeyup="this.value = this.value.toUpperCase();" id="success">
                                                    <span class="help-block">Eg- A,B,C etc</span>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label class="control-label">School Year</label>

                                                <select class="has-success form-control" name="sy">
                                                    <?php 
                                                        $sylist = allSy($conn, 'A');
                                                    foreach($sylist as $key => $val){
                                                    ?>
                                                    <option value="<?php echo $val['sy_id']?>"><?php echo $val['sy_name']?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>  
                                               
                                            <div class="form-group has-success">
                                                <label class="control-label">Class Stat</label>
                                                   
                                                <select class="has-success form-control" name="stat">
                                                    
                                                    <option value="A">Active</option>
                                                    <option value="I">Inactive</option>
                                                    
                                                </select>

                                            </div>

                                            <input type="hidden" name="id">
                                            <div class="form-group has-success">

                                                <div class="">
                                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                </div>
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

    <script>
        function EditClass(self) {
            var id = self.getAttribute("class-id");

            document.getElementById("edit-class").id.value = id;
            $("#editclass").modal("show");
        } // sends the value on click button

    </script>
</body>

</html>

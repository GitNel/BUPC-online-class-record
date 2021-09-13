<?php
    include_once "../includes/dbconnect.inc.php";
    include_once "../includes/function.inc.php";
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRMS System | Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
    <!--
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
-->
    <link rel="stylesheet" type="text/css" href="../js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="../css/main.css" media="screen">
    <link rel="stylesheet" href="../custom.css" media="screen">
    <!--    <script src="js/modernizr/modernizr.min.js"></script>-->
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('stdincludes/std-topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('stdincludes/std-leftbar.php');?>

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
                                                <h3><i class="fa fa-file-text"></i> View Classes Info</h3>
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject Name</th>
                                                        <th>School Year</th>
                                                        <th>Class</th>
                                                        <th>Grade</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php 
                                                        
                                                        $subjlist = ListallStudSubj($conn, $_SESSION['STD']);
                                                            foreach($subjlist as $key => $val){
                                                                $no = $key;
                                                                $no++;

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $no?></td>
                                                        <td><?php echo $val['subj_name']?></td>
                                                        <td><?php echo $val['sy_name']?></td>
                                                        <td><?php echo $val['class_name']?> <?php echo $val['class_num']?> - <?php echo $val['class_section']?></td>
                                                        <td>
                                                            <?php
                                                    //NOTE : VERY IMPORTANT !! 
                                                    // * huwag mag muna mag tally ng points kada assessment kapag dipa na finalize ang list student .. error alert
                                                        $stdgrades = htmlentities($val['subj_id']);
                                                         $arr = StuDGradePerSubj($conn, $stdgrades); //shows the grade
                                                        foreach($arr as $key => $stdgrades){ 
                                                            $sql = "SELECT * FROM tbltallypts t
                                                                    JOIN tblsubjects s
                                                                    ON t.subj_id = s.subj_id
                                                                    JOIN tblstudent st
                                                                    ON st.stud_id = t.stud_id
                                                                    JOIN user u
                                                                    ON u.user_id = st.user_id
                                                                    WHERE s.subj_id = ?;"; //this will check if the subj id is available in the tallypts table
                                                                $stmt = mysqli_stmt_init($conn);
                                                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                                                   header("Location: ../../createaacc.php?stmtfailed");
                                                                    exit();
                                                                }
                                                            
                                                                mysqli_stmt_bind_param($stmt, "s", $val['subj_id']);
                                                                mysqli_stmt_execute($stmt);
                                                                mysqli_stmt_store_result($stmt);

                                                                $resultcheck = mysqli_stmt_num_rows($stmt);
                                                            
                                                            if($resultcheck > 0){ //this show if there is a match
                                                            $grade = ( $stdgrades['tenta'] / $stdgrades['totalequi'] ) * 100;
                                                            
                                                            echo number_format($grade); echo $stdgrades['last_name'];
                                                                }
                                                            else{
                                                                echo "NO GRADE"; // no match .. click new assessment to proceed 
                                                            }     
                                                        
                                                       
                                                        }
                                                        ?>


                                                        </td>
                                                        <td>
                                                            <a href=""><i class="fa fa-trash" title="Drop Class"></i> </a>

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

    <!-- ========== COMMON JS FILES ========== -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/pace/pace.min.js"></script>
    <script src="../js/lobipanel/lobipanel.min.js"></script>
    <script src="../js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="../js/prism/prism.js"></script>
    <script src="../js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="../js/main.js"></script>
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

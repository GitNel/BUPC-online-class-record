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
    <title>SMS Admin Subject Creation </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="custom.css">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title"><i class="fa fa-file-text"></i> Subject Creation</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-file-text"></i> Subjects</li>
                                    <li><a href="#"><i class="fa fa-file-text"></i> Create Subject</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5><i class="fa fa-file-text"></i> New Subject</h5>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <form action="process/subj/pr-crsubjct.php" method="POST">
                                            <div class="form-group has-success">
                                                <label for="default" class="col-sm-2 control-label">Subject Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="subjneym" class="form-control" id="default" placeholder="Subject Name" required pattern="[A-Z a-z 0-9'\-]+">
                                                    <span class="help-block">Eg- Networking 1, Multimedia Design, Math Modern World etc</span>

                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="default" class="col-sm-2 control-label">Subject Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="subjcode" class="form-control" id="default" placeholder="Subject Code" required pattern="[A-Z a-z 0-9'\-]+">

                                                    <span class="help-block">Eg- IT112, EDUC231 etc</span>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label class="col-sm-2 control-label pt-20">Class</label>

                                                <div class="col-sm-10 pt-20">
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

                                            <input type="hidden" name="userid" value="<?php echo $_SESSION['USER']?>">

                                            <input type="hidden" name="Ccode" value="<?php echo substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0,8);?>">

                                            <div class="">
                                                <div class="col-md-6 col-md-offset-2 pt-20">
                                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>
    <!-- /.main-wrapper -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });

    </script>
</body>

</html>

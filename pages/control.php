<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control Center - CIT CRIS Chatbot</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .nav>li>a:focus, .nav>li>a:hover {
            color:maroon;
            background-color: rgb(255,236,128);
        }
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: rgb(255,236,128);
            border-color: #337ab7;
        }
        .nav>li>a{
            color:gold;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: maroon;">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: gold;" href="index.php">Chatbot Response Control Center</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>&nbsp;<?=$_SESSION['sess_user'];?></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="margin: 0 0 0 0">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 20px">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chatbot Responses
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"style="float:right;margin: 0px 0px 0px 0px; padding:0px;">Add Question</button>
                                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>QID</th>
                                        <th>Question</th>
                                        <th>Tags</th>
                                        <th>Response</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Q01</td>
                                        <td>When is the Final Exam this semester?</td>
                                        <td>Finals Exam; A.Y. 2018-2019 1st Sem;</td>
                                        <td>The finals exam for graduating students will be this first week of october, while non-graduating students will hold their exams by the following week.</td>
                                        <td style="width:70px;text-align:center;"><button type="button" class="btn btn-link" data-toggle="modal" data-target="#deleteOrder"style="margin: 0px 0px 0px 0px; padding:0px;"><span class="glyphicon glyphicon-edit" style="color:blue;"></span></button>&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#deleteOrder"style="margin: 0px 0px 0px 0px; padding:0px;"><span class="glyphicon glyphicon-trash" style="color:red;"></span></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Q02</td>
                                        <td>When is the graduation for the CCS students this semester?</td>
                                        <td>Graduation; CCS Department; A.Y. 2018-2019 1st Sem;</td>
                                        <td>The graduation for the CCS Students will be on October 20, 2018</td>
                                        <td style="width:70px;text-align:center;"><button type="button" class="btn btn-link" data-toggle="modal" data-target="#deleteOrder"style="margin: 0px 0px 0px 0px; padding:0px;"><span class="glyphicon glyphicon-edit" style="color:blue;"></span></button>&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#deleteOrder"style="margin: 0px 0px 0px 0px; padding:0px;"><span class="glyphicon glyphicon-trash" style="color:red;"></span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                             <div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Delete?</h4>
                                        </div>
                                        <form role="form" method="POST" action="delOrder.php">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            <!-- /.add order -->
                             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Order</h4>
                                        </div>
                                        <form role="form" method="POST" action="addOrder.php">
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Customer ID</label>
                                                        <select name="cID" class="form-control">
                                                            <?php
                                                                $sql= "SELECT * FROM customer";
                                                                $result=$conn->query($sql);
                                                                while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                                                    echo "<option value=".$row['customerID']. '-' .$row['customerID'].">".$row['customerID']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Order Slip ID</label>
                                                        <input class="form-control" name="oSID" required placeholder="Enter Customer's Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Order Receiving Date</label>
                                                        <input type="Date" class="form-control" name="oRDate" required placeholder="Enter Customer's Address">
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

<?php } ?>
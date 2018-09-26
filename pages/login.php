<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - CIT CRIS Chatbot</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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

</head>

<body style="background-color: rgb(255,236,128);">
    <div class="container">                
        <div class="row">
            <center>
        <img src="../img/banner_logo.png" style="margin-left: 0px; margin-top: 15px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default"style=" margin-top: 30px">

                    
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Username" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" style="background-color: gold;color: maroon" name="submit" class="btn btn-lg btn-success btn-block" />
                            </fieldset>
                        </form>
						<?php  
							if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
								$user=$_POST['user'];  
								$pass=$_POST['pass'];  
								
								

								$conn = new mysqli("Localhost","root","","chatbor");

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $query=mysqli_query($conn,"SELECT * FROM login WHERE username='".$user."'");

                                $numrows=mysqli_num_rows($query);  
								if($numrows!=0)  
								{  
								    while($row=mysqli_fetch_assoc($query))  
    								{  
        								$dbusername=$row['username'];  
        								$dbpassword=$row['password'];  
        							}  									

								if($user == $dbusername && $pass == $dbpassword)  
								{  
								session_start();  
								$_SESSION['sess_user']=$user;  
							  
								/* Redirect browser */  
								header("Location: index.php");  
								}  
								} else {  
								echo "User do not exist!";  
								}  
							
							}  
						?>  
						
                    </div>
                </div>
            </div>
			
        </div>
    </div>
	
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<!doctype html>  
<html>  
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - CIT CRIS Chatbot</title>

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
<?php 
	function encrypt($str, $offset) {
    $encrypted_text = "";
    $offset = $offset % 26;
    if($offset < 0) {
        $offset += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) + $offset) > ord("Z")) {
                $encrypted_text .= chr(ord($c) + $offset - 26);
        } else {
            $encrypted_text .= chr(ord($c) + $offset);
        }
      } else {
          $encrypted_text .= " ";
      }
      $i++;
    }
    return $encrypted_text;
	}
?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Username" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Password" name="pass" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Register Account" name="submit" class="btn btn-lg btn-success btn-block" />
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
                        	if($numrows==0)  
                        	{  
                        	$sql="INSERT INTO login(username,password) VALUES('$user','$pass')";  
                          
                        	$result=mysqli_query($conn, $sql);  
                        		if($result){  
                        	echo "Account Successfully Created <a href='login.php'>Login now.</a>";  
                        	} else {  
                        	echo "Failure!";  
                        	}  
                          
                        	} else {  
                        	echo "That username already exists! Please try again with another.";  
                        	}  
                        }

                        ?>  
                    </div>
                </div>
            </div>
        </div>
</div>
</body>  
</html>   

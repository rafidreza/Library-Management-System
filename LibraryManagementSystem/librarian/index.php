<?php
session_start();
include('dbcon.php'); 
if (isset($_POST['submit'])){
    
$username = $_POST['username'];
$password = $_POST['password'];
                                    
$query = "SELECT * FROM users WHERE username ='". $username."' AND password ='".$password."'";
    //select * from users where username=admin and password=amdin
    //select * from suers where 'username'='admin' and 'password'='admin';
    //
    
echo $query;
$result = mysqli_query($conn, $query);
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
	if( $num_row > 0 ) {
        header('location:dashboard.php');
        $_SESSION['id']=$row['user_id'];
									}
	else{ ?>
<div class="alert alert-danger">Access Denied</div>		
<?php
}}
?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
					<div class="sti">
						<img src="../LMS/E.B. Magalona.png" class="img-rounded">
					</div>
				<div class="login">
				<div class="log_txt">
				<p><strong>Please Enter the Details Below..</strong></p>
				</div>
						<form class="form-horizontal" method="POST">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Username</label>
									<div class="controls">
									<input type="text" name="username" id="username" placeholder="Username" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
									<input type="password" name="password" id="password" placeholder="Password" required>
								</div>
								</div>
								<div class="control-group">
									<div class="controls">
									<input id="login" name="submit" type="submit" class="btn"/>
								</div>
								</div>
								
								
						</form>
				
				</div>
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php'); ?>
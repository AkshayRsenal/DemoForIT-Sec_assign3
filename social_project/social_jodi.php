<!DOCTYPE html>
<html>
<head><title>Register</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<style>
	.star{color:red;font-weight:bold;}
	label{font-size:20px;}
	</style>
	<script src="js/jquery-2.2.0.min.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php 
session_start();
// error_reporting(-1);
if(empty($_SESSION['Gender']) || !isset($_SESSION['Gender'])){

	echo "Gender session doesnot exist";
}

else{
	print_r($_SESSION);
	unset($_SESSION['Gender']);
	echo "Gender session unsetted";
}

if(empty($_SESSION['registration_no']) || !isset($_SESSION['registration_no'])){
	echo "registration session doesnot exist";
}

else{
	unset($_SESSION['registration_no']);
	echo "registration session unsetted";
}

if(empty($_SESSION['registration_no']) || !isset($_SESSION['registration_no'])|| empty($_SESSION['Gender']) || !isset($_SESSION['Gender'])){
	echo "registration session doesnot exist";
}
else{
	echo "DOnt Destroy";
}

if(empty($_SESSION['first_run']) || !isset($_SESSION['first_run'])){
	echo "first_run session doesnot exist";
}
else{
	unset($_SESSION['first_run']);
	echo "first_run session unsetted";
}


		// print_r($_SESSION);
		// $login_error=$_REQUEST["login"];
		// echo $login_error;
		// unset($_SESSION['Gender']);
		// unset($_SESSION['registration_no']);
		// session_destroy();
		// exit();
echo($_SESSION['first_run']);

unset($_SESSION['first_run']);
print_r($_SESSION);
// exit();
?>

</head>
<body>
	<div class="container-fluid">
		
		<div class="row" style="background-color:#274257;position: fixed; top: 0; left: 0; z-index: 999; width: 102%; height: 80px;">
			<div class="col-xs-1"><a href="social_jodi.php"><img src="img/social.jpg" height="70px" width="150px" style="margin:6px;"/></a></div>
			<div class="col-xs-10"></div>
			
			<div class="col-xs-1" style="margin-top:3px;"><a href="social_login.php"><h3>Login</h3></a></div>
			<div class="clear"></div>
		</div>

		<div class="row">
			
			<div class="col-xs-3"></div>
			
			
			<div  class="col-xs-6"  style="border:5px dotted #C296B6; border-radius:30px; margin-top:150px; margin-bottom:150px;">
				
				<h1 style="text-align:Center; font-size:58px; color:gold;">Registration Form</h1>

				<?php
				$error=array();

				function regGen($reg_no_arr){
					$rand_no	= "SJ".rand(100001,999999);
					if(in_array($rand_no,$reg_no_arr)){
						return regGen($reg_no_arr);
					}
					return $rand_no;
				}
				
				if(isset($_POST["registration"])){

				$name=(isset($_POST["name"])) ? $_POST["name"] : ''; //user name
				if(empty($name)){
					$error[]="Please Enter your Name!";
				}

				$gender=(isset($_POST["gender"])) ? $_POST["gender"] : ''; //user gender
				if(empty($gender)){
					$error[]="Please Enter your Gender!";
				}

				$age=(isset($_POST["age"]))  ? $_POST["age"] : ''; //user age
				if(empty($age) || $age<18 || $age>80)  {
					$error[]="Please Enter Valid Age !";
				}

				$qualification=(isset($_POST["qualification"])) ? $_POST["qualification"] : ''; //user qualification
				if(empty($qualification)){
					$error[]="Please Enter your Qualification!";
				}

				$salary=(isset($_POST["salary"])) ? $_POST["salary"] : '';  //user salary
				if(empty($salary)){
					$error[]="Please Enter your Annual Salary!";
				}

				$link=mysqli_connect('localhost','root','','social_db') or die('Connection Error:' . mysqli_connect_error());
				// $link=mysql_connect('localhost','root','') or die();
				// $db=mysql_select_db('social_db',$link) or die();
				//Insert into register values('1','aniket','m','21','BSC','12000');
				$regSearchQuery= "Select reg_no from register";
				$regFetchResult=mysqli_query($link,$regSearchQuery);
				$reg_no_arr	= array();
				if ($regFetchResult) {
					while($rows=mysqli_fetch_array($regFetchResult)){
					$reg_no_arr[] = $rows['reg_no'];
				}				}
				
				
				$register_no_final=regGen($reg_no_arr);
				if(empty($register_no_final)){
					$error[]="Something went wrong! Kindly try again!!!";
				}
				
				if(empty($error)){
					 $query="INSERT INTO `register` (`name`,`reg_no`,`gender`,`age`,`qualification`,`salary`) VALUES('$name','$register_no_final','$gender','$age','$qualification','$salary')";
					 $result=mysqli_query($link,$query);
					

				}
				
				if(empty($error)){
					
					if($result){
						echo"<p style='color:#00ff40; text-align:center;text-decoration:none;'>You have been Successfully Register in Portal !!!
							<br/>Your Registration number is:
							<span style='color:Gold'>" 
							.$register_no_final.
							"</span><br/>Please Login with the same. 
							</p>";
					}else{
						echo"<p style='color:#c63939;text-align:center;'>Some Technical Problem !!!</p>";
					}
					
				}else{
					//echo"<p style='color:#c63939;text-align:center;'>Error !</p>"; 
				}

			}

			?>
			
			
			
			<!--User Details-->
			<div id="section">
				<section>
					<?php
					if($_POST==""){
						foreach($error as $err){
							echo"<ul>";
							echo"<li style='color:red;'>".$err."</li>";
							echo"</ul>";
						}	
					}
					?>
					<!--<h2 style="text-align:center;color:FFF; font-size:40px;">User Details:</h2>-->
					<hr style="border:2px dashed #DFC184;">
					<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="register_form">

						<div class="form-group" style="text-align:right;">
							<label for="nameId" class="col-sm-4" style="color:#fff; margin-top:20px;">Enter Name<span class="star">*</span>:</label><br/>
							<div class="col-sm-8">
								<input type="name" name="name" class="form-control" id="nameId" placeholder="Enter Name" />
							</div>
						</div>

						<div class="form-group" style="text-align:right;">	
							<div class="form-group">
								<label  style="color:FFF;" class="col-sm-4">Gender<span class="star">*</span>:</label>
								<input class="col-sm-1" type="radio" name="gender"  id="male" value="m" checked/><label class="col-sm-1" for="male" style="color:FFF;">Male</label>
								<span class="col-sm-1"></span>
								<input class="col-sm-1" type="radio" name="gender" id="female" value="f"/><label class="col-sm-1" for="female" style="color:FFF;">Female</label>
							</div>
						</div>

						<div class="form-group" style="text-align:right;">	
							<label for="ageId" class="col-sm-4" style="color:FFF;">Enter Age<span class="star">*</span>:</label>
							<div class="col-sm-8">
								<input type="number" min="18" max="100"  name="age"  class="form-control" id="ageId" placeholder="Enter Age"/>
							</div>
						</div>

						<div class="form-group" style="text-align:right;">
							<label for="qualifyId" class="col-sm-4" style="color:FFF;">Qualification<span class="star">*</span>:</label>
							<div class="col-sm-8">
								<input type="name" name="qualification"  class="form-control" id="qualifyId" placeholder="Enter Qualification"  />
							</div>
						</div>

						<div class="form-group" style="text-align:right;">
							<label for="salaryId" class="col-sm-4" style="color:FFF;">Annual Salary<span class="star">*</span>:</label>
							<div class="col-sm-8">
								<input type="number" name="salary" min="96000" max="1000000000"   class="form-control" id="salaryId" placeholder="Enter Salary (in INR p.a.)" />
								<!-- <input type="hidden" name="regenerated" value=""  /> -->
							</div>
						</div>
						
						<div class="form-group">
							<span class="col-sm-4"></span>
							<div class=" col-sm-8" style="text-align:center; margin:15px 0px;">
								<input type="hidden" name="registration" id="registration" value="SJ">
								<input type="button" name="register" class="btn btn-primary btn-lg btn-block" style="background-color:#DBDBCE;color:#004489;" value="Register" onClick="validate();" />
							</div>
						</div>

					</form>
					
				</section>
			</div>
		</div>
		
		<div class="col-xs-3"></div>
		
		<div class="clear"></div>
	</div>
	
	
	<div class="clear"></div>
</div><!--Container-fluid Close-->

<!--Footer Property-->
<div id="footer" class="row">
	<div class=" col-xs-12" align="center" >
		<p style="text-decoration:none; font-size:18px;">Copyright &#169; <?php echo date("Y");?>. all rights reserved.</p>
		<div class="clear"></div>
	</div>
</div>

<script type="text/javascript">
function validate(){
	var name ="";
	var submit="";
	var age="";
	var qualification="";
	var salary="";
	var male_radio="";
	var patname = /\d/g;
	var patage = /\D/g;
	name = document.getElementById("nameId").value;
	age = document.getElementById("ageId").value;
	qualification = document.getElementById("qualifyId").value;
	salary = document.getElementById("salaryId").value;
	var invalid_name=name.match(patname);
	var invalid_age=age.match(patage);
	male_radio=document.getElementById("male").checked;
			// alert(invalid_name);
			// alert(invalid_age);
			
			/*  if(name=="" || age=="" || qualification=="" || salary == ""){
				alert("Please enter all details!");
				return false;
			}  */
			
			if (invalid_name != null){
				alert("Please enter a valid Name!");
				return false;
			}
			
			if(isNaN(age)){
				alert("Please enter a valid age!");
				return false;
			}
			
			
			if (invalid_age != null || age==""){
				alert("Please enter a valid age!");
				return false;
			}
			
			if (male_radio && age < 21){
				alert("You are underage!");
				return false;
			}
			
			document.getElementById("register_form").submit();
		}
		</script>

	</body>
	</html>
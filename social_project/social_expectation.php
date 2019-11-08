<?php

session_start();



if(isset($_POST['reg_name'])){

	$error=array();
		// $reg_no="";
	$reg_no=(isset($_POST['reg_name'])) ? $_POST['reg_name'] : '';
	if(empty($reg_no)){
		$error[]="Enter a valid Registration Number!";
	}

	if (empty($_SESSION['registration_no']) || !isset($_SESSION['registration_no'])){
		$_SESSION['registration_no'] = $reg_no;
	} 
	else{
		echo "Session already exists</br>";
				// $_SESSION['reg_name_no']=;
	}	
}

if(empty($error)){
	$link=mysqli_connect('localhost','root','','social_db') or die('Connection Error:' . mysqli_connect_error());	
	// $link=mysqli_connect('localhost','root','') or die();
	// $db=mysqli_select_db('social_db',$link) or die();

	$query="";
	// $query="SELECT name, gender, reg_no FROM register WHERE reg_no ='".trim($reg_no)."'";
	// $logResult=mysqli_query($link,$query) or die("Error: ".mysqli_error()."Enter valid Registration Number!!");
	

	

	if(count($logResult)>0){
		$tupples=mysqli_fetch_object($logResult);
			 // $tupples->name."</br>";
			 // $tupples->gender;
			  // echo $tupples->reg_no;
		// print_r($_SESSION);
		
	}
}	
$db_regno=$tupples->reg_no;

// require_once("soc_tem.php");

if(!isset($_SESSION['first_run'])){
	$_SESSION['first_run'] = 1;

	// if(isset($db_regno)){

	if ($db_regno == $_SESSION['registration_no']) {
		echo "valid login</br>valid login</br>valid login</br>";
		// exit();

	}

	else{

		session_destroy();
		echo "invalid login</br>invalid login</br>invalid login</br>";
		// exit();
		header("Location:social_jodi.php?login=Invalid login");
	}


	// }

}

		// exit();

			// while ($tupples=mysqli_fetch_object($logResult)){
			// 	echo $tupples->name;
			// 	echo $tupples->gender;
			// }


		// echo $logResult['name'];
		// print_r($logResult);

		// if($logResult==true){
		// 	echo"<p style='color:#00ff40; text-align:center;text-decoration:none;'>You have been Successfully Register in Portal !!!</p>";
		// }
		// else{
		// 	echo"<p style='color:#c63939;text-align:center;'>Some Technical Problem !!!</p>";
		// }




?>

<?php

	/*$link=mysqli_connect('localhost','root','') or die("unsucessful to connection");
	$db=mysqli_select_db('social_db',$link) or die("unsucessful to select database");
	//SELECT * FROM `register` WHERE `age` >= 25 and `qualification` LIKE '%BE%' and `salary` > 100000;
	$query="SELECT * FROM register WHERE age >= 25 AND qualification LIKE '%BE%' AND salary >10000";
	$result=mysqli_query($link,$result);
	
	if(empty($error)){
		if($result>0){
			echo"successful Search";
		}else{
			echo"Technical Problem?";
		}
	}else{
		echo"Error!";   
	}

}*/

?>

<!DOCTYPE html>
<html>
<head><title>Expectation</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<style>
	.star{color:red;font-weight:bold;}

	label{font-size:20px;}
	</style>
	<link href="css/style.css" rel="stylesheet"/>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="container-fluid">
		
		<div class="row" style="background-color:#274257;position: fixed; top: 0; left: 0; z-index: 999; width: 102%; height: 80px;">
			<div class="col-xs-1"><a href="social_jodi.php"><img src="img/social.jpg" height="70px" width="150px" style="margin:6px;"/></a></div>
			<div class="col-xs-10"></div>
			<div class="col-xs-1" style="margin-top:3px;"><a href="social_jodi.php" ><h3>Logout</h3></a></div>
			<div class="clear"></div>
		</div>

		<div class="row">
			
			<div class="col-xs-3"></div>
			
			
			<div  class="col-xs-6"  style="border:5px dotted #C296B6; border-radius:30px; margin-top:150px; margin-bottom:150px;">
				<h1 style="text-align:center; font-size:58px; color:#FF6EB0;">Your Expectation</h1>
				<!--User Details-->
				<div id="section">
					<section>
						
						<hr style="border:2px dashed #DFC184;">
						<form class="form-horizontal" action="search_result.php" method="post" id="expForm">

							<?php 
							if(isset($tupples->gender) || isset($_SESSION['Gender']))
							{
								$userGender=$tupples->gender;
								trim($userGender); 
								
							
							
							
							 // print_r($_SESSION);
							if (empty($_SESSION['Gender']) || !isset($_SESSION['Gender']) ||isset($userGender)){
								$_SESSION['Gender'] = $userGender;
							} 
							else{
								echo "Gender Session already exists </br>";
									// $_SESSION['registration_no']= "error gender";
									print_r($_SESSION);
									// header("Location:social_jodi.php?login=Invalid login");
							}
							}
							else
							{
								 header("Location:social_jodi.php?login=Invalid login");
							}

							echo "<input type='hidden' name='gender_check' id='masculine' value='".$_SESSION['Gender']."'/>";
								// echo "<input type='hidden' name='gender_check' id='masculine' value='".$userGender."'/>";

									// if ($userGender=="m") {

							
									// 	echo "<input type='hidden' name='gender' id='masculine' value='m' />";

									// }
									// elseif ($userGender=="f"){

									// 	echo "<input type='hidden' name='gender' id='feminine' value='f' />";
									// }

									// else{
									// 	echo($userGender);
							
									// }
							?>
							
							<div class="form-group" style="text-align:right;">	
								<label for="age" class="col-sm-4" style="color:FFF;">Enter Age<span class="star">*</span>:</label>
								<div class="col-sm-8">
									<input type="number" min="18" max="100"  name="age"  class="form-control" id="age" placeholder="Enter Age"/>
								</div>
							</div>

							<div class="form-group" style="text-align:right;">
								<label for="qualification" class="col-sm-4" style="color:FFF;">Qualification<span class="star">*</span>:</label>
								<div class="col-sm-8">
									<input type="name" name="qualification"  class="form-control" id="qualification" placeholder="Enter Qualification"/>
								</div>
							</div>

							<div class="form-group" style="text-align:right;">
								<label for="salary" class="col-sm-4" style="color:FFF;">Annual Salary<span class="star">*</span>:</label>
								<div class="col-sm-8">
									<input type="hidden" name="search" id="search" value="search" />
									<input type="number" name="salary"   class="form-control" id="salary" placeholder="Enter Salary (in INR p.a.)"/>
								</div>
							</div>
							
							<script type="text/javascript">
							function validateExp(){
								var age="";
								var qualification="";
								var salary="";
								var patqualification = /\d/g;
								
								age=document.getElementById("age").value;
								qualification=document.getElementById("qualification").value;
								salary=document.getElementById("salary").value;
								var invalid_qualification=qualification.match(patqualification);
								if(age=="" && qualification=="" && salary==""){
									alert("Please Enter ALL Details");
									return false;
								}
								
								if(age!="" && isNaN(age)){
									alert("Please Enter valid age");
									return false;
								}
								
								if(qualification!="" && invalid_qualification != null){
									alert("Please Enter your qualification");
									return false;
								}
								
								if(salary!="" && isNaN(salary)){
									alert("Please Enter your salary");
									return false;
								}							
								
								document.getElementById("expForm").submit();
								
								
							}
							</script>
							
							<div class="form-group">
								<span class="col-sm-4"></span>
								<div class=" col-sm-8" style="text-align:right; margin:15px 0px;">
									<input type="button" name="search" class="btn btn-primary btn-lg btn-block" onClick="validateExp();" value="Search" style="background-color:#DBDBCE;color:#004489;"/>
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
		<div class=" col-xs-12" align="right" >
			<p style="text-decoration:none; font-size:18px;">Copyright &#169; <?php echo date("Y");?> Social Jodi. all right reserved.</p>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>
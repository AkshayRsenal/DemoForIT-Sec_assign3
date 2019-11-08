<!DOCTYPE html>
<html>
<head><title>Search</title>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<style>
.thead{font-size:30px;color:#FFFFFF;}
.tbody{font-style:italic;font-size:18px;color:#FFFFFF;}
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
		<div class="col-xs-9"></div>
		<div class="col-xs-1" style="margin-top:3px;"><a href="social_jodi.php" ><h3>Logout</h3></a></div>
		<div class="col-xs-1" style="margin-top:3px;"><a href="social_expectation.php" ><h3>Home</h3></a></div>
	<div class="clear"></div>
	</div>

	<div class="row">
	
		<div class="col-xs-2"></div>
		
		
			<div  class="col-xs-8"  style="border:5px dotted #C296B6; border-radius:30px; margin-top:150px; margin-bottom:150px;">
				
				<?php
			
				session_start();

				if(isset($_SESSION['registration_no']) || isset($_SESSION['Gender']))
				{

				if(isset($_POST['search'])){
					
					$error=array();
					
					$age=(isset($_POST['age'])) ? $_POST['age'] : '';
					/* if(empty($age)){
						$error[]="Enter Valid Age!";
					} */
					
					$gender_check=(isset($_POST['gender_check'])) ? $_POST['gender_check'] : '';

					$qualification=(isset($_POST['qualification'])) ? $_POST['qualification'] : '';
					/* if(empty($qualification)){
						$error[]="Enter Valid Qualification!";
					} */
					
					$salary=(isset($_POST['salary'])) ? $_POST['salary'] : '';
					/* if(empty($salary)){
						$error[]="Enter Valid Salary!";
					} */

					
					$link=mysqli_connect('localhost','root','','social_db') or die('Connection Error:' . mysqli_connect_error());
					// $db=mysqli_select_db('social_db',$link) or die("unsucessful to select database");
					//$query='SELECT * FROM register WHERE ORDER BY '.$age;
					
					$whereclause	= "WHERE 1";
					
					if(!empty($age)){
						$whereclause	.= " AND age >= ".trim($age);
					}
					if(!empty($gender_check)){
						$whereclause	.= " AND gender != '".trim($gender_check)."'";
					}
					if(!empty($qualification)){
						$whereclause	.= " AND qualification LIKE '%".trim($qualification)."%'";
					}
					if(!empty($salary)){
						$whereclause	.= " AND salary >= ".trim($salary);
					}
					
					$query="SELECT * FROM register ".$whereclause;
					$result=mysqli_query($link,$query) or die("Error: ".mysqli_error());
					?>
	
					<div class="row">
						<div class="col-xs-4 thead" align="center">Name</div>
						<div class="col-xs-1 thead" align="center">Age</div>
						<div class="col-xs-4 thead" align="center">Qualification</div>
						<div class="col-xs-3 thead" align="center">Salary</div>
						
					<div class="clear"></div>
					</div>
					<hr>
					<div style="overflow-y:auto;overflow-x:hidden;height:200px;">
				<?php
				if(empty($error)){
					if($result){
						while($list = mysqli_fetch_object($result)){
				?>
	
						<div class="row" style="margin-top:18px;">
							<div class="col-xs-4 tbody" align="left" style="padding-left:35px;"><?php echo $list->name; ?></div>
							<div class="col-xs-1 tbody" align="center"><?php echo $list->age; ?></div>
							<div class="col-xs-4 tbody" align="center"><?php echo $list->qualification; ?></div>
							<div class="col-xs-3 tbody" align="right" style="padding-right:35px;"><?php echo number_format($list->salary,2); ?></div>
						<div class="clear"></div>
						</div>
   
				<?php
							}		
						}else{
							echo"Technical Problem!";
						}
					}else{
						echo"Error!";
					}
				}

			}
				?>
					</div>
				
			</div>
			
			<div class="col-xs-2"></div>
			
	<div class="clear"></div>
	</div>
   
 
<div class="clear"></div>
</div><!--Container-fluid Close-->

	<!--Footer Property-->
	<div id="footer" class="row">
		<div class=" col-xs-12" align="center" >
			<p style="text-decoration:none; font-size:18px;">Copyright &#169; <?php echo date("Y");?> . all rights reserved.</p>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>
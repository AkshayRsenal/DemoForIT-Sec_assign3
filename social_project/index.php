<?php

?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
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
	<div class="col-xs-11"></div>

	<div class="clear"></div>
	</div>

	<div class="row">
	
		<div class="col-xs-3"></div>

		<div  class="col-xs-6"  style="border:5px dotted #C296B6; border-radius:30px; margin-top:150px; margin-bottom:150px;">
			<h1 style="text-align:center; font-size:58px; color:gold/*color:#FF6EB0*/;">User Login</h1>
			<!--User Details-->
			<div id="section">
				<section>

					
					<hr style="border:2px dashed #DFC184;">
					
					<form class="form-horizontal" action="social_expectation.php" method="post" id="frmLogin" name="frmLogin">

						<div class="form-group" style="text-align:right;">	
							<label for="reg_no" class="col-sm-4" style="color:FFF;">Enter Reg No<span class="star">*</span>:</label>
							<div class="col-sm-8">
								<input type="text" maxlength="8" minlength="8" name="reg_name" class="form-control" id="reg_no" placeholder="Enter Reg No" />
								<input type="hidden" name="registration" id="registration" value="SJ">
							</div>
						</div>
						
						<script type="text/javascript">
							/* function checkLength(el) {
								
								if (el.value.length != 8) {
									alert("kindley enter Valid Registration no !!!");
									return false;
								}
								
								if(el.value.match(/[_\W]/)){
									alert("Don't enter Special Character!");
									return false;
								}
								
								if(el.value.length !="!@#$%^&*()+=-[]\\\';,./{}|\":<>?"){
									alert("Don't enter Special Character !!!");
									return false;
								}	
								
								
							} */
							
							function validateRegNo(){
								var reg_no="";
								reg_no=document.getElementById("reg_no").value;
																
								if(reg_no == ""){
									alert("Kindly Enter Registration Number!!!");
									return false;
								}else if (reg_no.length != 8 || reg_no.match(/[_\W]/) || reg_no.match(/^SJ[0-9]/g) == null ){
									alert("Kindly Enter Valid Registration Number!!!");
									return false;
								}else{
									document.getElementById("frmLogin").submit();
								}
								
							}
						</script>

						
						<div class="form-group">
						   <span class="col-sm-4"></span>
							<div class=" col-sm-8" style="text-align:right; margin:15px 0px;">
								<button type="button" name="Login" class="btn btn-primary btn-lg btn-block" style="background-color:#DBDBCE;color:#004489;" onClick="validateRegNo();">Login</button>
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
<?php
// $first = true;  
// if(isset($db_regno) || isset($_SESSION['registration_no'])){


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

?>
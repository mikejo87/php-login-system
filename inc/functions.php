<?php 

	//force the user to be logged in or redirect
	function ForceLogin(){
	if(isset($_SESSION['user_id'])){
		//the user is allowed here
	}else {
		//the user is not allowed here
		header("location: /login.php"); exit;
	}
}

function ForceDashboard(){
if(isset($_SESSION['user_id'])){
		//the user is allowed here
	}else {
		//the user is not allowed here
		header("location: /dashboard.php"); exit;
	}
}
function FindUser($con, $email, $return_assoc = false){

	//make sure the user does not exist
	$email = (string) Filter::String( $email );

	$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
	$FINDuSER->bindParam(':email', $email, PDO::PARAM_STR);
	$findUser->execute();

	if($return_assoc) {
		return $findUser->fetch(PDO::FETCH_ASSOC);
	}

	$user_found = (boolean) $findUser->rowCount();
	return $user_found;
}


?>
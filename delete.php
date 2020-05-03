<?php require_once 'includes/header.php' ?>

<?php 

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$resp = $dao->deleteContactDB($id);

		if($resp == 0){
			header("Location: /?msg=fail");
		} else {
			header("Location: /?msg=ok");
		}
	} else {
		header("Location: /");
	}
	
?>

<?php require_once 'includes/nav.php' ?>
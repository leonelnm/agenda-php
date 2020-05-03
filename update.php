<?php require_once 'includes/header.php' ?>

<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$contact = $dao->getContact($id);

	if (!isset($contact)) {
		header("Location: /?msg=fail");
	} 
} else {
	header("Location: /");
}

if (isset($_POST['name']) && isset($_POST['telephone'])) {

	$resp = $dao->updateContactDB($_POST['id'], $_POST['name'], $_POST['telephone']);

	if( $resp > 0){
		echo '<br>Registro actualizado';
		header("Refresh:0");
	} else {
		echo '<br>No se ha actualizado el contacto';
	}

}


?>

<main class="item-main">
	<div class="row"></div>
	<div class="row">
		<form class="col s12" action="" method="POST">
			<div class="input-field col m8 s12 offset-m2">
				<i class="material-icons prefix">account_circle</i>
				<input id="icon_prefix" type="text" class="validate" name="name" required value="<?php echo $contact->getName() ?>">
				<label for="icon_prefix">Nombre</label>
			</div>
			<div class="input-field col m8 s12 offset-m2">
				<i class="material-icons prefix">phone</i>
				<input id="icon_telephone" type="tel" class="validate" name="telephone" required value="<?php echo $contact->getTelephone() ?>">
				<label for="icon_telephone">Teléfono</label>
			</div>

			<input type="hidden" name="id" value="<?php echo $contact->getId() ?>">

			<button class="btn waves-effect col s4 offset-s4" type="submit" style="background-color: #476CFF;">Actualizar
				<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
	<div class="row"></div>

</main>




<?php require_once 'includes/nav.php' ?>
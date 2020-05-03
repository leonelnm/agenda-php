<?php require_once 'includes/header.php';

if (isset($_POST['name']) && isset($_POST['telephone'])) {
    $dao->createContact($_POST['name'], $_POST['telephone']);

    $newContact = $dao->insertContactDB($_POST['name'], $_POST['telephone']);

    if ($newContact === 0) {
        $msg = 'El teléfono' . $_POST['telephone'] . ' ya se encuentra registrado!';
       
    } elseif (($newContact === 1)) {
        $msg = 'Contacto creado!';
    } 
}

?>

<main class="item-main">
    <div class="row"></div>
    <div class="row">
        <form class="col s12" action="" method="POST">
            <div class="input-field col m8 s12 offset-m2">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" name="name" required pattern="[A-Z a-z]+" maxlength="40">
                <label for="icon_prefix">Nombre</label>
            </div>
            <div class="input-field col m8 s12 offset-m2">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" name="telephone" required minlength="9" maxlength="9" pattern="\d+">
                <label for="icon_telephone">Teléfono</label>
            </div>

            <button class="btn waves-effect waves-light col s4 offset-s4" type="submit">Añadir
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <div class="row"></div>

</main>

<?php require_once 'includes/nav.php' ?>
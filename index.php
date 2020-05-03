<?php
require_once 'includes/header.php';

$contacts = $dao->getAllContactsDB();

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

?>

<header class="item-header">

    <?php if ( $msg == 'fail') { ?>
        <div class="alert warning">
            <p>No es posible encontrar el contacto!!</p>
        </div>
    <?php } elseif ($msg == 'ok') { ?>
        <div class="alert success">
            <p>Contacto eliminado!</p>
        </div>
    <?php } ?>
</header>


<main class="item-main">
    <section id="agenda" class="agenda">
        <?php
        if (count($contacts) <= 0) { ?>
            <article class="register">
                <span>No existen contactos Añadidos!</span>
            </article>
            <?php
        } else {
            foreach ($contacts as $indez => $c) {
            ?>
                <article class="register z-depth-1">
                    <i class="material-icons prefix" style="font-size: 30px">perm_identity</i>
                    <div>
                        <span><?php echo $c->getName() ?></span>
                        <section class="call">
                            <span>+34<?php echo $c->getTelephone() ?></span>
                            <button class="button-style">
                                <a href="tel:+34<?php echo $c->getTelephone() ?>">
                                    <span class="material-icons" style="color: #4CAF50; font-size: 1.25em">call</span>
                                </a>
                            </button>
                        </section>
                    </div>
                    <div>
                        <button class="button-style" onclick="window.location.href='update.php?id=<?php echo $c->getId() ?>'">
                            <span class="material-icons" style="color: #1354b9">edit</span>
                        </button>
                        <button class="button-style" onclick="window.location.href='delete.php?id=<?php echo $c->getId() ?>'">
                            <span class="material-icons" style="color: #e63535">delete</span>
                        </button>
                    </div>
                </article>
        <?php }
        } ?>

    </section>
</main>

<?php require_once 'includes/nav.php' ?>
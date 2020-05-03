<?php
session_start();

require_once 'includes/contactDao.php';

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = array();
}

if (!isset($dao)) {
    $dao = new ContactDao();
}

?>

<!DOCTYPE html>
<?php



?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/styles.css">

    <link rel="shortcut icon" href="resources/img/icono.jpg" type="image/x-icon">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Agenda</title>
</head>

<body class="body-container">

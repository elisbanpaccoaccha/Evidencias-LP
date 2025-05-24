<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['dni'])) {
    $dni = $_GET['dni'];

    // Validar que dni sean 8 dígitos numéricos
    if (!preg_match('/^\d{8}$/', $dni)) {
        header("Location: index.php?message=error");
        exit();
    }

    include_once 'db.php';
    $database = new Database();
    $db = $database->getConnection();
    $persona = new Persona($db);
    $persona->dni = $dni;

    if ($persona->delete()) {
        header("Location: index.php?message=deleted");
        exit();
    } else {
        header("Location: index.php?message=error");
        exit();
    }
} else {
    // Si no viene dni o no es GET, redirige con error
    header("Location: index.php?message=error");
    exit();
}

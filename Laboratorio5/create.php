<?php
include_once 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $database = new Database();
    $db = $database->getConnection();
    $persona = new Persona($db);

    // Sanitizamos entradas (mínimo)
    $persona->dni = trim($_POST['dni']);
    $persona->nombres = trim($_POST['nombres']);
    $persona->apellidopa = trim($_POST['apellidopa']);
    $persona->apellidoma = trim($_POST['apellidoma']);

    if ($persona->create()) {
        header("Location: index.php?message=created");
        exit();
    } else {
        $message = "<div class='mt-4 p-2 bg-red-500 text-white rounded'>No se pudo crear la persona.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-md">
        <h1 class="text-2xl font-bold mb-4">Crear Persona</h1>

        <?= $message ?>

        <form action="create.php" method="post" class="bg-white p-6 rounded shadow-md">
            <label for="dni" class="block mb-1 font-semibold">DNI:</label>
            <input type="text" id="dni" name="dni" class="border p-2 w-full mb-4" required maxlength="8" pattern="\d{8}" title="Debe ingresar 8 dígitos numéricos" />

            <label for="nombres" class="block mb-1 font-semibold">Nombres:</label>
            <input type="text" id="nombres" name="nombres" class="border p-2 w-full mb-4" required />

            <label for="apellidopa" class="block mb-1 font-semibold">Apellido Paterno:</label>
            <input type="text" id="apellidopa" name="apellidopa" class="border p-2 w-full mb-4" required />

            <label for="apellidoma" class="block mb-1 font-semibold">Apellido Materno:</label>
            <input type="text" id="apellidoma" name="apellidoma" class="border p-2 w-full mb-4" required />

            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Crear</button>
        </form>

        <div class="mt-4">
            <a href="index.php" class="text-blue-600 hover:underline">&laquo; Volver al listado</a>
        </div>
    </div>
</body>
</html>

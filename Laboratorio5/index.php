<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Listado de Personas</h1>

        <div class="mb-4">
            <a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Crear Persona</a>
        </div>

        <form method="GET" action="index.php" class="mb-4">
            <input type="text" name="search" class="border p-2 w-full mb-2" placeholder="Buscar..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
        </form>

        <?php
        include_once 'db.php';

        $database = new Database();
        $db = $database->getConnection();
        $persona = new Persona($db);

        $search = isset($_GET['search']) ? $_GET['search'] : "";
        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $start = ($page - 1) * $limit;

        $result = $persona->read($search, $start, $limit);
        $total_records = $persona->count();
        $total_pages = ceil($total_records / $limit);

        echo "<table class='min-w-full bg-white'>
        <thead>
            <tr>
                <th class='py-2 px-4 border-b'>DNI</th>
                <th class='py-2 px-4 border-b'>Nombres</th>
                <th class='py-2 px-4 border-b'>Apellido Paterno</th>
                <th class='py-2 px-4 border-b'>Apellido Materno</th>
                <th class='py-2 px-4 border-b'>Acciones</th>
            </tr>
        </thead>
        <tbody>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['dni']) . "</td>
                    <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['nombres']) . "</td>
                    <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['apellidopa']) . "</td>
                    <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['apellidoma']) . "</td>
                    <td class='py-2 px-4 border-b'>
                        <a href='update.php?dni=" . urlencode($row['dni']) . "' class='text-blue-500'>Editar</a> |
                        <a href='delete.php?dni=" . urlencode($row['dni']) . "' class='text-red-500' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='py-4 text-center text-gray-500'>No se encontraron personas.</td></tr>";
        }

        echo "</tbody></table>";

        // Paginación
        if ($total_pages > 1) {
            echo "<div class='mt-4 flex flex-wrap'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = $i == $page ? "bg-blue-700" : "bg-blue-500";
                echo "<a href='index.php?page=$i&search=" . urlencode($search) . "' class='$active text-white px-3 py-2 rounded m-1'>$i</a>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

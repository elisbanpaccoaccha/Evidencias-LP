<?php
// Configuración de errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configurar el tipo de contenido como JSON para las respuestas AJAX
header('Content-Type: application/json; charset=utf-8');

class Database {
    private $host = "localhost";
    private $db_name = "historiaclinica2";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            
            // Configurar charset
            $this->conn->set_charset("utf8");
            
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch(Exception $e) {
            error_log("Database connection error: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Error de conexión a la base de datos']);
            exit();
        }
        
        return $this->conn;
    }
}

// Crear instancia de la base de datos
$database = new Database();
$conn = $database->getConnection();

// Manejar peticiones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar que se envió la acción
    if (!isset($_POST['action'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Acción no especificada']);
        exit();
    }
    
    $action = $_POST['action'];
    
    // Obtener provincias por departamento
    if ($action === 'getProvincias') {
        if (!isset($_POST['id_Departamento']) || empty($_POST['id_Departamento'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID de departamento no proporcionado']);
            exit();
        }
        
        $id_Departamento = intval($_POST['id_Departamento']);
        
        try {
            $query = "SELECT id_Provincia, NombreProvincia FROM Provincias WHERE id_Departamento = ? ORDER BY NombreProvincia";
            $stmt = $conn->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error preparando consulta: " . $conn->error);
            }
            
            $stmt->bind_param("i", $id_Departamento);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $provincias = array();
            while ($row = $result->fetch_assoc()) {
                $provincias[] = $row;
            }
            
            $stmt->close();
            echo json_encode($provincias);
            
        } catch(Exception $e) {
            error_log("Error obteniendo provincias: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Error obteniendo provincias']);
        }
    }
    
    // Obtener distritos por provincia
    else if ($action === 'getDistritos') {
        if (!isset($_POST['id_Provincia']) || empty($_POST['id_Provincia'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID de provincia no proporcionado']);
            exit();
        }
        
        $id_Provincia = intval($_POST['id_Provincia']);
        
        try {
            $query = "SELECT id_Distrito, NombreDistrito FROM Distritos WHERE id_Provincia = ? ORDER BY NombreDistrito";
            $stmt = $conn->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Error preparando consulta: " . $conn->error);
            }
            
            $stmt->bind_param("i", $id_Provincia);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $distritos = array();
            while ($row = $result->fetch_assoc()) {
                $distritos[] = $row;
            }
            
            $stmt->close();
            echo json_encode($distritos);
            
        } catch(Exception $e) {
            error_log("Error obteniendo distritos: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Error obteniendo distritos']);
        }
    }
    
    else {
        http_response_code(400);
        echo json_encode(['error' => 'Acción no válida']);
    }
}

// Manejar peticiones GET
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Obtener todos los departamentos
    if (isset($_GET['action']) && $_GET['action'] === 'getDepartamentos') {
        try {
            $query = "SELECT id_Departamento, NombreDepartamento FROM Departamentos ORDER BY NombreDepartamento";
            $result = $conn->query($query);
            
            if (!$result) {
                throw new Exception("Error ejecutando consulta: " . $conn->error);
            }
            
            $departamentos = array();
            while ($row = $result->fetch_assoc()) {
                $departamentos[] = $row;
            }
            
            echo json_encode($departamentos);
            
        } catch(Exception $e) {
            error_log("Error obteniendo departamentos: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Error obteniendo departamentos']);
        }
    }
    
    else {
        http_response_code(400);
        echo json_encode(['error' => 'Acción GET no válida']);
    }
}

else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}

// Cerrar conexión
if (isset($conn)) {
    $conn->close();
}
?>
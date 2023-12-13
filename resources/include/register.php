<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];

    $checkUserSql = "SELECT * FROM user WHERE username = '$username'";
    $checkUserResult = $conn->query($checkUserSql);

    if ($checkUserResult->num_rows > 0) {
        // El usuario ya existe, indicar en el formulario
        $response = array("success" => false, "message" => "El nombre de usuario ya está en uso. Por favor, elija otro.");
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insertUserSql = "INSERT INTO user (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";
        if ($conn->query($insertUserSql) === TRUE) {
            // Usuario registrado exitosamente
            
            $user_id = $conn->insert_id;

            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user_id;

            // Crear tienda para el usuario
            $store_name = $username . "_Store";
            $createStoreSql = "INSERT INTO store (user_id, name) VALUES ('$user_id', '$store_name')";
            $conn->query($createStoreSql);

            // Crear embudo para la tienda
            $store_id = $conn->insert_id;
            $funnel_name = "Embudo de Ventas";
            $funnel_description = "Embudo estándar para el proceso de ventas";
            $createFunnelSql = "INSERT INTO funnel (store_id, name, description) VALUES ('$store_id', '$funnel_name', '$funnel_description')";
            $conn->query($createFunnelSql);

            // Crear fases para el embudo
            $funnel_id = $conn->insert_id;
            $phases = array(
                array("name" => "Leads", "description" => "Obtención de información de clientes potenciales"),
                array("name" => "Interés", "description" => "Generación de interés en los productos o servicios"),
                array("name" => "Consideración", "description" => "Evaluación de opciones por parte del cliente"),
                array("name" => "Compra", "description" => "Conversión de lead en cliente")
            );
            foreach ($phases as $phase) {
                $phase_name = $phase["name"];
                $phase_description = $phase["description"];
                $createPhaseSql = "INSERT INTO phase (funnel_id, name, description) VALUES ('$funnel_id', '$phase_name', '$phase_description')";
                $conn->query($createPhaseSql);
            }

            // Responder exitosamente
            $response = array("success" => true, "message" => "Usuario registrado exitosamente");
        } else {
            $response = array("success" => false, "message" => "Error al registrar el usuario: " . $conn->error);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn->close();
}
?>

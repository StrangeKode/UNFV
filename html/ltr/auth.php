<?php
session_start(); 

$error_message = "";

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $host = '127.0.0.1'; 
    $dbname = 'login'; 
    $username = 'root'; 
    $password = ''; 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $_POST['user']);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($_POST['pass'] === $user['password']) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email']; 
                
                // REDIRIGIR
                header("Location: /login/dashboard/html/ltr/dashboard.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Contraseña incorrecta. Intenta de nuevo.";
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Usuario no encontrado. Intenta de nuevo.";
            header("Location: index.php");
            exit();
        }

    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
} else {
    $_SESSION['error_message'] = "Por favor, introduce tu usuario y contraseña.";
    header("Location: index.php");
    exit();
}
?>

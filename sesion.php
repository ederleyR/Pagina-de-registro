<?php
    session_start();
    require_once("base.php");
    $errores = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmar = $_POST['confirm_password'] ?? '';

        
        if (empty($nombre) || preg_match('/\s/', $nombre)) {
            $errores[] = "No se permite que el nombre tenga espacios.";
        }

        if (!preg_match('/@/', $email)){
        $errores[]="Gmail no valido verifique que tenga @";
        }
        if (empty($email)||preg_match('/\s/', $email)){
            $errores[] = "no se permite que el email esta vacio o tenga espacios";
        }

        if (!preg_match('/[a-z]/', $password) || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[\W_]/', $password) || 
            strlen($password) < 8) {
            $errores[] = "La contraseña debe tener 8 caracteres, mayúscula, minúscula y un símbolo.";
        }

        if ($password !== $confirmar) {
            $errores[] = "Las contraseñas no coinciden.";
        }

        if (empty($errores)) {
            
            $_SESSION['Nombre'] = $nombre;
            $_SESSION['email'] = $email;
            $contraseñaEncriptada = password_hash($password, PASSWORD_DEFAULT);
            unset($_SESSION['errores']);
            $consulta = "INSERT INTO  usuarios(nombre, email, password) values('$nombre','$email','$contraseñaEncriptada')";
            $resultado =  mysqli_query($conexion,$consulta);
        } else {
        
            $_SESSION['errores'] = $errores;
        }
    }
    $_SESSION['debug_post'] = $_POST;
    header("Location: index.php");

    exit();

?>
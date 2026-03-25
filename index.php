<?php
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirm_password'] ?? '';

    if (empty($nombre)||preg_match('/\s/', $nombre)){
        $errores[] = "no se permite que el nombre esta vacio o tenga espacios";
    }

    if (!preg_match('/@/', $email)){
	  $errores[]="Gmail no valido verifique que tenga @";
    }
    if (empty($email)||preg_match('/\s/', $email)){
        $errores[] = "no se permite que el email esta vacio o tenga espacios";
    }

    if (
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[\W_]/', $password) ||
        !preg_match('/^.{8,}$/', $password)
    ) {
        $errores[] = "La contraseña no cumple requisitos";
    }

    if ($password !== $confirmar) {
        $errores[] = "Las contraseñas no coinciden";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div class="fixed inset-0 bg-[url('imagenes/fondo.jpg')] bg-cover bg-center fade-bg -z-10"></div>
  <div class="flex justify-center items-center min-h-screen">
    <div class="bg-white/10 backdrop-blur-md max-w-xl w-full rounded-2xl border border-white/30 p-8 shadow-2xl">

      <h1 class="text-4xl font-bold text-center text-white mb-8 tracking-wide">
        REGÍSTRATE
      </h1>
    
      <form action="" method="post" class="space-y-4">
        
        <?php if (!empty($errores)): ?>
            <div class="bg-red-500 text-white p-3 rounded">
                <?php foreach ($errores as $e): ?>
                    <p><?php echo $e; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Nombre"
        class="bg-black/70 text-white placeholder-gray-400 w-full p-3 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">

        <input type="email" name="email" placeholder="Email"
        class="bg-black/70 text-white placeholder-gray-400 w-full p-3 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
        
        <input type="password" name="password" placeholder="Contraseña"
        class="bg-black/70 text-white placeholder-gray-400 w-full p-3 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
        
        <input type="password" name="confirm_password" placeholder="Confirmar contraseña"
        class="bg-black/70 text-white placeholder-gray-400 w-full p-3 border border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400 transition">
         
        <button class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-3 rounded-xl font-semibold hover:scale-105 transition duration-300 shadow-lg">
          Registrarse
        </button>

      </form>
        <div style="color: white;">
         <?php print_r($_POST); ?>
        </div>            
    </div>
  </div>
  
</body>

</html>



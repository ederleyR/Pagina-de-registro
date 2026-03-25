<?php
  session_start();
  $errores = $_SESSION['errores'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stilos.css">
</head>
<body class="min-h-screen">
  <div class="fixed inset-0 bg-[url('imagenes/fondo.jpg')] bg-cover bg-center fade-bg -z-10"></div>
  
  <div class="flex justify-center items-center min-h-screen">
    <div class="bg-white/10 backdrop-blur-md max-w-xl w-full rounded-2xl border border-white/30 p-8 shadow-2xl">

      <h1 class="text-4xl font-bold text-center text-white mb-8">REGÍSTRATE</h1>
    
      <form action="sesion.php" method="post" class="space-y-4">
        
        <?php if (!empty($errores)): ?>
            <div class="bg-red-600/80 text-white p-3 rounded-lg border border-red-400">
                <?php foreach ($errores as $e): ?>
                    <p class="text-sm"> <?php echo $e; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <input type="text" name="name" placeholder="Nombre" required
          class="bg-black/70 text-white w-full p-3 border border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-400 outline-none">

        <input type="email" name="email" placeholder="Email" required
          class="bg-black/70 text-white w-full p-3 border border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-400 outline-none">
        
        <input type="password" name="password" placeholder="Contraseña" 
          class="bg-black/70 text-white w-full p-3 border border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-400 outline-none">
        
        <input type="password" name="confirm_password" placeholder="Confirmar contraseña"
          class="bg-black/70 text-white w-full p-3 border border-gray-600 rounded-xl focus:ring-2 focus:ring-cyan-400 outline-none">
         
        <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-3 rounded-xl font-semibold hover:scale-105 transition shadow-lg">
          Registrarse
        </button>
        
      </form>
      <br>
      <form action="salir.php" method="post" class="space-y-4">
        
        <button type="submit" class="w-full bg-gradient-to-r from-red-400 to-red-600 text-white py-3 rounded-xl font-semibold hover:scale-105 transition shadow-lg">
          Cerrar sesion
        </button>
      </form>

      <div style="color: white;">
        <?php 
          if (!empty($_SESSION['debug_post'])){
            print_r($_SESSION['debug_post']);  
          }
          echo "<br>";
          if (isset($_SESSION['Nombre']) && isset($_SESSION['email'])) {
            echo $_SESSION['Nombre'] . "<br>";
            echo $_SESSION['email'];
          }
        ?>
      </div> 
    </div>
  </div>
</body>
</html>


<?php 

if (!isset($_SESSION)) {
    session_start();
}
$auth1 = $_SESSION['login'] ?? null;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

<header class="bg-header">
        <div class="contenedor contenedor-header">
            <div>
                <h1>LOGO</h1>
            </div>
            <div class="navegacion-principal">
                <?php if ($auth1) : ?>
                    <p><?php echo $_SESSION['nombre'] ?></p>
                    <a href="/logout">Cerrar Sesion</a>
                <?php endif; ?>
            </div>
        </div>
    </header> <!-- final del head-->
    
    <?php echo $contenido; ?>
            
</body>
</html>
<main class="contenedor seccion contenido-centrado">

<h1 class="nombre-pagina">Crear Cuenta</h1>

<?php 

include_once __DIR__ . "/../templates/alertas.php";

?>

<form class="formulario" method="POST" action="/crear-usuario">
    
    <div class="campo">
        
        <label for="usuario">Usuario</label>
        <input 
        type="text" 
        id="usuario" 
        name="usuario" 
        placeholder="Tu Usuario"
        value="<?php echo s($usuario->usuario);?>">
        
        
        <label for="nombre">Nombre</label>
        <input 
        type="text" 
        id="nombre" 
        name="nombre" 
        placeholder="Tu Nombre"
        value="<?php echo s($usuario->nombre);?>">
        
        <label for="apellido">Apellido</label>
        <input 
        type="text" 
        id="apellido" 
        name="apellido" 
        placeholder="Tu Apellido"
        value="<?php echo s($usuario->apellido);?>">
        
        <label for="password">Contraseña</label>
        <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Tu Contraseña">
        
    </div>
        

        <input type="submit" class="boton" value="Crear Usuario">
        
    </form>

</main>
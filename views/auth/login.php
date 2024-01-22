<main class="contenedor seccion contenido-centrado">
    
<?php 

include_once __DIR__ ."/../templates/alertas.php";

?>


    <form class="formulario" method="POST" action="/">
        <fieldset>
            <legend>Iniciar Sesion</legend>

            <label for="usuario">Usuario</label>
            <input 
                type="text" 
                id="usuario" 
                placeholder="Tu Usuario" 
                name="usuario">

            <label for="password">Contraseña</label>
            <input 
                type="password" 
                id="password" 
                placeholder="Contraseña" 
                name="password">

        </fieldset>
            <input type="submit" class="boton boton-login" value="Iniciar Sesion">
    </form>
</main>
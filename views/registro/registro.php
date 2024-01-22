<main class="contenedor contenedor__crear">

<?php 

include_once __DIR__ ."/../templates/alertas.php";

?>

        <h1>Crear Registro</h1>
            <a href="/usuario" class="boton">Volver</a>
        <form class="formulario" method="POST" action="/registro">
            <fieldset>
                <legend>Informacion</legend>
                <div>
                    <label for="cedula">Cedula</label>
                    <input type="text" id="cedula" name="cedula" placeholder="Cedula" value="<?php echo s($auth->cedula) ?>">

                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($auth->nombre) ?>">

                </div>
                <div>
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($auth->apellido) ?>">

                </div>

                <div class="descripcion-crear">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion"><?php echo s($auth->descripcion) ?></textarea>

                </div>
                <div>
                    <label for="">Tipo Registro</label>
                    <select name="tipo_registro_id" id="registro">
                        <option selected value="">-- Seleccione --</option>
                    <?php foreach($t_registro as $registro) { ?>  
                    <option <?php echo $auth->tipo_registro_id === $registro->id ? 'selected' : '' ?> value="<?php echo s($registro->id); ?>"> <?php echo s($registro->t_registro); ?></option>
                    <?php } ?>

                    </select>
                    
                </div>
            </fieldset>
            <input type="submit" value="Crear Inventario" class="boton boton__crear">
        </form>
    </main>
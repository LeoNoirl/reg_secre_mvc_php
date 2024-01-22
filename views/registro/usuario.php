<main class="contenedor contenedor-inventario">
        <h1>Registros</h1>
        <a href="/registro" class="boton">Registrar</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>

                </tr>
            </thead>
            <tbody><!-- Mostrar Resultados -->
            <?php  ?>
            
            <?php foreach ($registros as $registro) :
                
                ?>
                <tr> 
                    <td><?php echo $registro->cedula ?></td>
                    <td><?php echo $registro->nombre ?></td>
                    <td><?php echo $registro->descripcion ?></td>
                    <td><?php echo date('Y-m-d h:i A', strtotime($registro->creado)) ?></td>
                </tr> <!--final del inventario-->
                <?php endforeach; ?>

            </tbody>
        </table>

</main>
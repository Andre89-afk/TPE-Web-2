<?php

class VistaBolso{


    function ObtenerBolsos($bolsos)  {
        require 'templates/layout/header.phtml';?>
            <ul>
            <?php foreach($bolsos as $bolso) { ?>
                <div>
                    <li class="bolso"><?php echo $bolso->Nombre . ' | ' . $bolso->Color . ' | ' . $bolso->Precio . ' | ' . $bolso->Categoria; ?>
                        <a href="detalles/<?php echo $bolso->id_bolso; ?>" type="button" class="btn-ver">Ver</a>
                        <a href="eliminar/<?php echo $bolso->id_bolso; ?>" type="button" class="btn-borrar">Borrar</a>
                    </li>
                </div>
            <?php } ?>
        </ul>
        <?php require 'templates/layout/footer.phtml'; 
    }

    function error($msg){
        echo "Error!";
        echo $msg;
    }

    function VistaBolso($bolso) {
        require 'templates/layout/header.phtml';
        require 'templates/detalle.phtml';
        require 'templates/layout/footer.phtml'; 
    }
    
    function MostrarFormulario($categorias){
        require 'templates/formbolsos.phtml';
    }
    }
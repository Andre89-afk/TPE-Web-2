<?php

class VistaBolso{


    function ObtenerBolsos($bolsos){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/formbolsos.phtml' ?>
        <ul>
        <?php foreach($bolsos as $bolso){ ?>
     
        <li><?php echo $bolso->Nombre . ' | ' . $bolso->Color . ' | ' . $bolso->Precio ?>
            
        <a href="eliminar/<?php echo $bolso->id_bolso ?>" type="button" class="btn-borrar">Borrar</a>
    
            
        </li>
    
            <?php } ?>
    </ul>
            <?php
         require_once 'templates/layout/footer.phtml'; 
    }

    function error($msg){
        echo "Error!";
        echo $msg;
    }

    }

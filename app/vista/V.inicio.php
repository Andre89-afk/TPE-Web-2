<?php

class VistaInicioC{

    function MostrarInicioS(){
        require 'templates/forminicioS.phtml';
    }

    function error($msg){
        echo '<div class="error-message">' . htmlspecialchars($msg) . '</div>';
    }

    /*Vista para el Registro--*/
    function FormRegistro() {
        require 'templates/layout/header.phtml';
        require 'templates/formregistro.phtml';
        require 'templates/layout/footer.phtml';
    }
    }
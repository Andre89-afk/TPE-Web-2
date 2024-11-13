<?php
    function verificacionusuario($res) {
        if($res->usuario) {
            return;
        } else {
            header('Location: ' . BASE_URL . 'iniciar');
            die();
        }
    }
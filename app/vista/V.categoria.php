<?php

class VistaCategoria{

    function MostrarCategorias($categorias){
        require 'templates/layout/header.phtml'; ?>
        <div class="categorias">
            <?php foreach($categorias as $categoria) { ?>
                <a href="categoria/<?php echo $categoria->id_categoria; ?>" class="categoria-link">
                    <?php echo $categoria->Categoria; ?>
                </a>
                <a href="editarcategoria/<?php echo $categoria->id_categoria; ?>" type="button" class="btn-editar">Editar</a>
                <a href="eliminarcategoria/<?php echo $categoria->id_categoria; ?>" type="button" class="btn-borrar">Borrar</a>
            <?php } ?>
        </div>
        <?php require 'templates/layout/footer.phtml'; 
    }
    
    function ObtenerBolsosPorCategoria($bolsos) {
        require 'templates/layout/header.phtml'; ?>
        <h2>Bolsos de la categoría seleccionada</h2>
        <?php if (empty($bolsos)) { ?>
            <p>No hay bolsos en esta categoría.</p>
        <?php } else { ?>
            <ul>
                <?php foreach ($bolsos as $bolso) { ?>
                    <div>
                        <li class="bolso">
                            <?php echo $bolso->Nombre . ' | ' . $bolso->Color . ' | ' . $bolso->Precio . ' | ' . $bolso->Categoria; ?>
                        </li>
                    </div>
                <?php } ?>
            </ul>
        <?php } ?>
        <?php require 'templates/layout/footer.phtml'; 
    }

    function MostrarFormularioDeCategoria(){
        require 'templates/layout/header.phtml';
        require 'templates/form2.phtml';
        require 'templates/layout/footer.phtml';
    }

    function error($msg){
        echo $msg;
    }

    function MostrarFormularioDeEdicion($categoria) {
        require 'templates/layout/header.phtml';
        require 'templates/formeditarcategorias.phtml';
        require 'templates/layout/footer.phtml';
    }
}
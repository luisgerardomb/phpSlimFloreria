<?php 
    //Se agergan los controllers al contecto de la app

    $container['EmpleadosController'] = function($container){
        return new app\controllers\EmpleadosController($container);
    }
?>
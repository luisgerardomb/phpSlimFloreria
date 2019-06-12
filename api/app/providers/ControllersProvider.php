<?php 
    //Se agergan los controllers al contecto de la app

    $container['EmpleadosController'] = function($container){
        return new app\controllers\EmpleadosController($container);
    };

    $container['ProductosController'] = function($container){
        return new app\controllers\ProductosController($container);
    };

    $container['OficinasController'] = function($container){
        return new app\controllers\OficinasController($container);
    };

    $container['PedidosController'] = function($container){
        return new app\controllers\PedidosController($container);
    };

    $container['ClientesController'] = function($container){
        return new app\controllers\ClientesController($container);
    }

?>
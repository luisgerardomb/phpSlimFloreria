<?php 
    $container['EmpleadosModel'] = function($container){
        return new app\models\EmpleadosModel($container);
    };

    $container['ProductosModel'] = function($container){
        return new app\models\ProductosModel($container);
    };

    $container['OficinasModel'] = function($container){
        return new app\models\OficinasModel($container);
    };

    $container['PedidosModel'] = function($container){
        return new app\models\PedidosModel($container);
    };

    $container['ClientesModel'] = function($container){
        return new app\models\ClientesModel($container);
    }
?>
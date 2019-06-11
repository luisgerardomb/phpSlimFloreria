<?php
    $app->get('/productos', 'ProductosController:selectProductos');

    $app->post('/productos', 'ProductosController:insertProductos');

    $app->put('/productos', 'ProductosController:updateProductos');
?>
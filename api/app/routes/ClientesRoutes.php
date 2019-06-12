<?php
    $app->get('/clientes', 'ClientesController:selectClientes');

    $app->post('/clientes', 'ClientesController:insertClientes');

    $app->put('/clientes', 'ClientesController:updateClientes');
?>
<?php
    $app->get('/oficinas', 'OficinasController:selectOficinas');

    $app->post('/oficinas', 'OficinasController:insertOficinas');

    $app->put('/oficinas', 'OficinasController:updateOficinas');
?>
<?php
    $app->get('/empleados/{id}', 'EmpleadosController:selectEmpleados');

    $app->post('/empleados', 'EmpleadosController:insertEmpleados');

    $app->put('/empleados', 'EmpleadosController:updateEmpleados');
?>
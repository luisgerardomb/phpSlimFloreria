<?php
    $app->get('/empleados', 'EmpleadosController:selectEmpleados');

    $app->post('/empleados', 'EmpleadosController:insertEmpleados');

    $app->put('/empleados', 'EmpleadosController:updateEmpleados');
?>
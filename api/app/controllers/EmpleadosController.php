<?php

    namespace app\controllers;

    class EmpleadosController extends Controllers{

        function selectEmpleados($request, $response){
            $msg = $this->EmpleadosModel->selectEmpleados();

            return json_encode($msg);
        }

        function insertEmpleados($request,$response){
            $empleado = $request->getParsedBody();

            $msg = $this->EmpleadosModel->insertEmpleados($empleado);
            return \json_encode($msg);
        }

        function updateEmpleados($request, $response){
            $empleado = $request->getParsedBody();

            $msg = $this->EmpleadosModel->updateEmpleados($empleado);
            return \json_encode($msg);
        }
    }
?>
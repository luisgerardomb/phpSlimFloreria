<?php

    namespace app\controllers;

    class ClientesController extends Controllers{

        function selectClientes($request, $response){
            $msg = $this->ClientesModel->selectClientes();
            return json_encode($msg);
        }

        function insertClientes($request,$response){
            $cliente = $request->getParsedBody();

            $msg = $this->ClientesModel->insertClientes($cliente);
            return \json_encode($msg);
        }

        function updateClientes($request, $response){
            $cliente = $request->getParsedBody();

            $msg = $this->ClientesModel->updateClientes($cliente);
            return \json_encode($msg);
        }
    }
?>
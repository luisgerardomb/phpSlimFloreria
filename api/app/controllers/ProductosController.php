<?php
    namespace app\controllers;

    class ProductosController extends Controllers{
        function selectProductos($request, $response){
            $msg = $this->ProductosModel->selectProductos();
            return json_encode($msg);
        }

        function insertProductos($request, $response){
            $producto = $request->getParsedBody();

            $msg = $this->ProductosModel->insertProductos($producto);
            return \json_encode($msg);
        }

        function updateProductos($request, $response){
            $producto = $request->getParsedBody();

            $msg = $this->ProductosModel->updateProductos($producto);
            return json_encode($msg);
        }
    }
?>
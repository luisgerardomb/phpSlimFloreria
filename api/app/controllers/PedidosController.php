<?php 
    namespace app\controllers;

    class PedidosController extends Controllers{
        function insertPedido($request, $response){
            $pedido = $request->getParsedBody();

            $msg = $this->PedidosModel->insertPedido($pedido);
            return \json_encode($msg);
        }
    }
?>
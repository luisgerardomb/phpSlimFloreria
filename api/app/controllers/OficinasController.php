<?php
    namespace app\controllers;

    class OficinasController extends Controllers{
        function selectOficinas($request, $response){
            $msg = $this->OficinasModel->selectOficinas();
            return json_encode($msg);
        }

        function insertOficinas($request, $response){
            $oficina = $request->getParsedBody();

            $msg = $this->OficinasModel->insertOficinas($oficina);
            return \json_encode($msg);
        }

        function updateOficinas($request, $response){
            $oficina = $request->getParsedBody();

            $msg = $this->OficinasModel->updateOficinas($oficina);
            return json_encode($msg);
        }
    }
?>
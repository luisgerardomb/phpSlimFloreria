<?php
    namespace app\models;

    class OficinasModel extends Models{
        function selectOficinas(){
            $cons = $this->db->pdo->prepare('SELECT * FROM oficina');

            $cons->execute();

            $result = $cons->fetchAll(\PDO::FETCH_ASSOC);

            if(!is_null($cons->errorInfo()[2])){
                return array(
                    'error' => true,
                    'description' => $cons->errorInfo()[2]
                );
            }else if (empty($result)){
                return array(
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }

            return array(
                'success' => true,
                'description' => 'The oficinas were found',
                'empleados' => $result
            );
        }

        function insertOficinas($oficina){
            $result = $this->db->pdo->prepare('INSERT INTO oficina 
            VALUES (:codigoOficina, :ciudad, :pais, :region, :codigoPostal, :telefono, :lineaDireccion1, :lineaDireccion2);');

            $result->bindParam(':codigoOficina', $oficina['codigo_oficina'], \PDO::PARAM_STR);
            $result->bindParam(':ciudad', $oficina['ciudad'], \PDO::PARAM_STR);
            $result->bindParam(':pais', $oficina['pais'], \PDO::PARAM_STR);
            $result->bindParam(':region', $oficina['region'], \PDO::PARAM_STR);
            $result->bindParam(':codigoPostal', $oficina['codigo_postal'], \PDO::PARAM_STR);
            $result->bindParam(':telefono', $oficina['telefono'], \PDO::PARAM_STR);
            $result->bindParam(':lineaDireccion1', $oficina['linea_direccion1'], \PDO::PARAM_STR);
            $result->bindParam(':lineaDireccion2', $oficina['linea_direccion2'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The oficina was inserted'
            );
        }

        function updateOficinas($oficina){
            $result = $this->db->pdo->prepare('UPDATE oficina SET
            ciudad = :ciudad,
            pais = :pais,
            region = :region,
            codigo_postal = :codigoPostal,
            telefono = :telefono,
            linea_direccion1 = :linea_direccion1,
            linea_direccion2 = :linea_direccion2
            WHERE codigo_oficina = :codigoOficina');
        
            $result->bindParam(':codigoOficina', $oficina['codigo_oficina'], \PDO::PARAM_STR);
            $result->bindParam(':ciudad', $oficina['ciudad'], \PDO::PARAM_STR);
            $result->bindParam(':pais', $oficina['pais'], \PDO::PARAM_STR);
            $result->bindParam(':region', $oficina['region'], \PDO::PARAM_STR);
            $result->bindParam(':codigoPostal', $oficina['codigo_postal'], \PDO::PARAM_STR);
            $result->bindParam(':telefono', $oficina['telefono'], \PDO::PARAM_STR);
            $result->bindParam(':lineaDireccion1', $oficina['linea_direccion1'], \PDO::PARAM_STR);
            $result->bindParam(':lineaDireccion2', $oficina['linea_direccion2'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The oficina was updated'
            );
        }
    }
?>
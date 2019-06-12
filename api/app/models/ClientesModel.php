<?php
    namespace app\models;

    class ClientesModel extends Models{
        function selectClientes($id){
            $cons = $this->db->pdo->prepare('SELECT * FROM clientes');

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
                'description' => 'The clientes were found',
                'clientes' => $result
            );
        }

        function insertClientes($cliente){
            $result = $this->db->pdo->prepare('INSERT INTO clientes
            VALUES (:codigo_cliente, :nombre_cliente, :nombre_contacto, :apellido_contacto, telefono, :fax, :linea_direccion1, :linea_direccion2, :ciudad, :region, :pais, :codigo_postal, :codigo_empleado_rep_ventas, :limite_credito);');

            $result->bindParam(':codigo_cliente', $cliente['codigo_cliente'], \PDO::PARAM_INT);
            $result->bindParam(':nombre_cliente', $cliente['nombre_cliente'], \PDO::PARAM_STR);
            $result->bindParam(':nombre_contacto', $cliente['nombre_contacto'], \PDO::PARAM_STR);
            $result->bindParam(':apellido_contacto', $cliente['apellido_contacto'], \PDO::PARAM_STR);
            $result->bindParam(':telefono', $cliente['telefono'], \PDO::PARAM_STR);
            $result->bindParam(':fax', $cliente['fax'], \PDO::PARAM_STR);
            $result->bindParam(':linea_direccion1', $cliente['linea_direccion1'], \PDO::PARAM_STR);
            $result->bindParam(':linea_direccion2', $cliente['linea_direccion2'], \PDO::PARAM_STR);
            $result->bindParam(':ciudad', $cliente['ciudad'], \PDO::PARAM_STR);
            $result->bindParam(':region', $cliente['region'], \PDO::PARAM_STR);
            $result->bindParam(':pais', $cliente['pais'], \PDO::PARAM_STR);
            $result->bindParam(':codigo_postal', $cliente['codigo_postal'], \PDO::PARAM_STR);
            $result->bindParam(':codigo_empleado_rep_ventas', $cliente['codigo_empleado_rep_ventas'], \PDO::PARAM_INT);
            $result->bindParam(':limite_credito', $cliente['limite_credito'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The cliente was inserted'
            );
        }

        function updateClientes($cliente){
            $result = $this->db->pdo->prepare('UPDATE clientes SET
            nombre_cliente = :nombre_cliente,
            nombre_contacto = :nombre_contacto,
            nombre_contacto = :nombre_contacto,
            apellido_contacto = :apellido_contacto,
            telefono = :telefono,
            fax = :fax,
            linea_direccion1 = :linea_direccion1,
            linea_direccion2 = :linea_direccion2
            ciudad = :ciudad
            region = :region
            pais = :pais
            codigo_postal = :codigo_postal
            codigo_empleado_rep_ventas = :codigo_empleado_rep_ventas
            limite_credito = :limite_credito
            WHERE codigo_cliente = :codigoCliente');

            $result->bindParam(':codigoCliente', $cliente['codigo_cliente'], \PDO::PARAM_INT);
            $result->bindParam(':nombre_cliente', $cliente['nombre_cliente'], \PDO::PARAM_STR);
            $result->bindParam(':nombre_contacto', $cliente['nombre_contacto'], \PDO::PARAM_STR);
            $result->bindParam(':apellido_contacto', $cliente['apellido_contacto'], \PDO::PARAM_STR);
            $result->bindParam(':telefono', $cliente['telefono'], \PDO::PARAM_STR);
            $result->bindParam(':fax', $cliente['fax'], \PDO::PARAM_STR);
            $result->bindParam(':linea_direccion1', $cliente['linea_direccion1'], \PDO::PARAM_STR);
            $result->bindParam(':linea_direccion2', $cliente['linea_direccion2'], \PDO::PARAM_STR);
            $result->bindParam(':ciudad', $cliente['ciudad'], \PDO::PARAM_STR);
            $result->bindParam(':region', $cliente['region'], \PDO::PARAM_STR);
            $result->bindParam(':pais', $cliente['pais'], \PDO::PARAM_STR);
            $result->bindParam(':codigo_postal', $cliente['codigo_postal'], \PDO::PARAM_STR);
            $result->bindParam(':codigo_empleado_rep_ventas', $cliente['codigo_empleado_rep_ventas'], \PDO::PARAM_INT);
            $result->bindParam(':limite_credito', $cliente['limite_credito'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The cliente was updated'
            );
        }
    }
?>
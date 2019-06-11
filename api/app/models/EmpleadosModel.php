<?php
    namespace app\models;

    class EmpleadosModel extends Models{
        function selectEmpleados(){

            $cons = $this->db->pdo->prepare('SELECT codigo_empleado, nombre, apellido1, apellido2, extension, email, oficina.ciudad, codigo_jefe, puesto
            FROM empleado
            LEFT JOIN  oficina ON empleado.codigo_oficina = oficina.codigo_oficina');

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
                'description' => 'The empleados were found',
                'empleados' => $result
            );
        }

        function insertEmpleados($empleado){
            $result = $this->db->pdo->prepare('INSERT INTO empleado
            VALUES (:codigoEmpleado, :nombre, :apellido1, :apellido2, :extension, :email, :codigoOficina, :codigoJefe, :puesto);');

            $result->bindParam(':codigoEmpleado', $empleado['codigo_empleado'], \PDO::PARAM_INT);
            $result->bindParam(':nombre', $empleado['nombre'], \PDO::PARAM_STR);
            $result->bindParam(':apellido1', $empleado['apellido1'], \PDO::PARAM_STR);
            $result->bindParam(':apellido2', $empleado['apellido2'], \PDO::PARAM_STR);
            $result->bindParam(':extension', $empleado['extension'], \PDO::PARAM_STR);
            $result->bindParam(':email', $empleado['email'], \PDO::PARAM_STR);
            $result->bindParam(':codigoOficina', $empleado['codigo_oficina'], \PDO::PARAM_STR);
            $result->bindParam(':codigoJefe', $empleado['codigo_jefe'], \PDO::PARAM_INT);
            $result->bindParam(':puesto', $empleado['puesto'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The empleado was inserted'
            );
        }

        function updateEmpleados($empleado){
            $result = $this->db->pdo->prepare('UPDATE empleado SET
            nombre = :nombre,
            apellido1 = :apellido1,
            apellido2 = :apellido2,
            extension = :extension,
            email = :email,
            codigo_oficina = :codigoOficina,
            codigo_jefe = :codigoJefe,
            puesto = :puesto
            WHERE codigo_empleado = :codigoEmpleado');

            $result->bindParam(':codigoEmpleado', $empleado['codigo_empleado'], \PDO::PARAM_INT);
            $result->bindParam(':nombre', $empleado['nombre'], \PDO::PARAM_STR);
            $result->bindParam(':apellido1', $empleado['apellido1'], \PDO::PARAM_STR);
            $result->bindParam(':apellido2', $empleado['apellido2'], \PDO::PARAM_STR);
            $result->bindParam(':extension', $empleado['extension'], \PDO::PARAM_STR);
            $result->bindParam(':email', $empleado['email'], \PDO::PARAM_STR);
            $result->bindParam(':codigoOficina', $empleado['codigo_oficina'], \PDO::PARAM_STR);
            $result->bindParam(':codigoJefe', $empleado['codigo_jefe'], \PDO::PARAM_INT);
            $result->bindParam(':puesto', $empleado['puesto'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The empleado was updated'
            );
        }
    }
?>
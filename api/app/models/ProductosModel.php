<?php
    namespace app\models;

    class ProductosModel extends Models{
        function selectProductos(){
            $cons = $this->db->pdo->prepare('SELECT * FROM producto');

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

        function insertProductos($producto){
            $result = $this->db->pdo->prepare('INSERT INTO producto 
            VALUES (:codigoProducto, :nombre, :gama, :dimensiones, :proveedor, :descripcion, :cantidadEnStock, :precioVenta, :precioProveedor);');

            $result->bindParam(':codigoProducto', $producto['codigo_producto'], \PDO::PARAM_STR);
            $result->bindParam(':nombre', $producto['nombre'], \PDO::PARAM_STR);
            $result->bindParam(':gama', $producto['gama'], \PDO::PARAM_STR);
            $result->bindParam(':dimensiones', $producto['dimensiones'], \PDO::PARAM_STR);
            $result->bindParam(':proveedor', $producto['proveedor'], \PDO::PARAM_STR);
            $result->bindParam(':descripcion', $producto['descripcion'], \PDO::PARAM_STR);
            $result->bindParam(':cantidadEnStock', $producto['cantidad_en_stock'], \PDO::PARAM_INT);
            $result->bindParam(':precioVenta', $producto['precio_venta'], \PDO::PARAM_STR);
            $result->bindParam(':precioProveedor', $producto['precio_proveedor'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The producto was inserted'
            );
        }

        function updateProductos(){
            $result = $this->db->pdo->prepare('UPDATE producto SET
            nombre = :nombre,
            gama = :gama,
            dimensiones = :dimensiones,
            proveedor = :proveedor,
            descripcion = :descripcion,
            cantidad_en_stock = :cantidadEnStock,
            precio_venta = :precioVenta,
            precio_proveedor = :precioProveedor
            WHERE codigo_producto = :codigoProducto');

            $result->bindParam(':codigoProducto', $producto['codigo_producto'], \PDO::PARAM_STR);
            $result->bindParam(':nombre', $producto['nombre'], \PDO::PARAM_STR);
            $result->bindParam(':gama', $producto['gama'], \PDO::PARAM_STR);
            $result->bindParam(':dimensiones', $producto['dimensiones'], \PDO::PARAM_STR);
            $result->bindParam(':proveedor', $producto['proveedor'], \PDO::PARAM_STR);
            $result->bindParam(':descripcion', $producto['descripcion'], \PDO::PARAM_STR);
            $result->bindParam(':cantidadEnStock', $producto['cantidad_en_stock'], \PDO::PARAM_INT);
            $result->bindParam(':precioVenta', $producto['precio_venta'], \PDO::PARAM_STR);
            $result->bindParam(':precioProveedor', $producto['precio_proveedor'], \PDO::PARAM_STR);

            $result->execute();

            if(!is_null($result->errorInfo()[2])){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()[2]
                );
            }

            return array(
                'success' => true,
                'description' => 'The producto was updated'
            );
        }
    }
?>
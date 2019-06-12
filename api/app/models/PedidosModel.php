<?php
    namespace app\models;

    class PedidosModel extends Models{
        function insertPedido($pedido){
            $pedidoNumber = time();
            $lineas = $pedido['carrito']['lineas'];

            $this->db->pdo->beginTransaction();

            $this->db->insert('pedido', [
                'codigo_pedido' => $pedidoNumber,
                'fecha_pedido' => date('Y-m-d', time()),
                'fecha_esperada' => date('Y-m-d', time()),
                'estado' => 'En proceso...',
                'codigo_cliente' => '21'
            ]);

            foreach($lineas as $key => $li){
                $this->db->insert('detalle_pedido', [
                    'codigo_pedido' => $pedidoNumber,
                    'codigo_producto' => $li['pedido']['codigo_producto'],
                    'cantidad' => $li['cantidad'],
                    'precio_unidad' => $li['pedido']['precio_venta'],
                    'numero_linea' => $key + 1
                ]);
            }

            if(!is_null($this->db->error()[1])){
                $this->db->pdo->rollBack();
                return array(
                    'error' => true,
                    'description' => $this->db->error()[2]
                );
            }

            $this->db->pdo->commit();
            return array(
                'success' => true,
                'description' => 'Producto registrado'
            );
        }
    }
?>
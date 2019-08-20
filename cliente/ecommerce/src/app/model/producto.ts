export class Producto {
    constructor(
        public codigo_producto: string,
        public nombre: string,
        public gama: string,
        public dimensiones: string,
        public proveedor: string,
        public descripcion: string,
        public cantidad_en_stock: number,
        public precio_venta: number,
        public precio_proveedor: number
    ){}
}

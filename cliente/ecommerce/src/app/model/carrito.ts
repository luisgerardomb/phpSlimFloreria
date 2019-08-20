import { Injectable } from '@angular/core';
import { Producto } from './producto';

@Injectable()
export class Carrito {
    public lines: CarritoLine[] = [];
    public itemCount = 0;
    public price = 0;

    addLine(product: Producto, cantidad: number = 1){
        const line = this.lines.find(line => line.producto.codigo_producto == product.codigo_producto);

        if(line !== undefined){
            line.cantidad += cantidad;
        }else{
            this.lines.push(new CarritoLine(product, cantidad));
        }
    }

    recalculate(){
        this.itemCount = 0;
        this.price = 0;

        this.lines.forEach(l => {
            this.itemCount += l.cantidad;
            this.price += (l.cantidad * l.producto.precio_venta);
        })
    }

    getLines(){
        return this.lines.slice();
    }

    updateLine(producto: Producto, cantidad: number){
        if(cantidad != undefined){
            let line = this.lines.find(li => li.producto.codigo_producto == producto.codigo_producto);
            if(line){
                line.cantidad = cantidad;
                this.recalculate();
            }
        }
    }

    deleteLine(index: number){
        this.lines.splice(index, 1);
    }
}

export class CarritoLine {
    constructor(public producto: Producto, public cantidad: number){}

    get lineTotal(): number{
        return this.cantidad * this.producto.precio_venta;
    }
}

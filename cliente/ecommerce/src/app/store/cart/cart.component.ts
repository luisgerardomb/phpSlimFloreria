import { Component, OnInit } from '@angular/core';
import { Carrito, CarritoLine } from 'src/app/model/carrito';
import { Producto } from 'src/app/model/producto';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(public cart: Carrito) { }

  ngOnInit() {
  }

  get Lines(): CarritoLine[]{
    return this.cart.getLines();
  }

  updateLine(product: Producto, cantidad: number){
    return this.cart.updateLine(product, +cantidad);
  }

  deleteLine(index: number){
    this.cart.deleteLine(index);
    this.cart.recalculate();
  }

}

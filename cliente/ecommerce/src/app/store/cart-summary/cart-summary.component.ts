import { Component, OnInit } from '@angular/core';
import { Carrito } from 'src/app/model/carrito';

@Component({
  selector: 'app-cart-summary',
  templateUrl: './cart-summary.component.html',
  styleUrls: ['./cart-summary.component.css']
})
export class CartSummaryComponent implements OnInit {

  constructor(public cart: Carrito) { }

  ngOnInit() {
  }

}

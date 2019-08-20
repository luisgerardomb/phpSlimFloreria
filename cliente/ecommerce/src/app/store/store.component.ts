import { Component, OnInit } from '@angular/core';
import { RepositoryService } from '../model/repository.service';
import { Carrito } from '../model/carrito';
import { Producto } from '../model/producto';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {
  public selectedCategoria = null;
  public productsPerPage = 12;
  public selectedPage = 1;

  constructor(private repoService: RepositoryService, public cart: Carrito) { }

  ngOnInit() {
  }

  get productos(): Producto[]{
    const pageIndex = (this.selectedPage - 1) * this.productsPerPage;
    return this.repoService.getProducts(this.selectedCategoria).slice(pageIndex, pageIndex + this.productsPerPage);
  }

  get categorias(): string[]{
    return this.repoService.getCategories();
  }

  changeCategoria(categoria?: string){
    this.selectedCategoria = categoria;
    this.changePage(1);
  }

  get pageNumber(): number[]{
    return Array(Math.ceil(this.repoService.getProducts(this.selectedCategoria).length / this.productsPerPage)).fill(0).map((x, i) => i+1);
  }

  changePage(newNumber: number){
    this.selectedPage = newNumber;
  }

  changePageSize(newSize: number){
    this.productsPerPage = newSize;
    this.changePage(1);
  }

  add(producto: Producto){
    this.cart.addLine(producto);
    this.cart.recalculate();
  }

}

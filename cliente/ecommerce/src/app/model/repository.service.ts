import { Injectable } from '@angular/core';
import { Producto } from './producto';
import { DatasourceService} from './datasource.service';

@Injectable({
  providedIn: 'root'
})
export class RepositoryService {

  private productos: Producto[] = [];
  private categorias: string[] = [];
  private vendedores: string[] = [];

  constructor(private dataSource: DatasourceService) { 
    dataSource.getProducts().subscribe((response) => {
      this.productos = response['productos'];
      this.categorias = response['productos'].map(p => p.gama).filter((c, index, array) => array.indexOf(c) == index).sort();
      this.vendedores = response['productos'].map(p => p.proveedor).filter((c, index, array) => array.indexOf(c) == index).sort();
    });
  }

  getProducts(gama: string = null): Producto[]{
    return this.productos.filter((p) => (gama == null || p.gama == gama));
  }

  getCategories(): string[]{
    return this.categorias;
  }

  getSellers(): string[]{
    return this.vendedores;
  }
}

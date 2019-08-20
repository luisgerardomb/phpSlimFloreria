import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StoreComponent } from './store/store.component';
import { PageNotFoundComponent } from './store/page-not-found/page-not-found.component';
import { CartComponent } from './store/cart/cart.component';

const routes: Routes = [
  {path: 'inicio', component: StoreComponent},
  {path: 'cart', component: CartComponent},
  {path: '', redirectTo: '/inicio', pathMatch: 'full'},
  {path: '**', component: PageNotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

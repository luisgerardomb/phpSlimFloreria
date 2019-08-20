import { NgModule } from '@angular/core';
import { CommonModule} from '@angular/common';
import { StoreComponent } from './store.component';
import { AppRoutingModule } from '../app-routing.module';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { CartSummaryComponent } from './cart-summary/cart-summary.component';
import { CartComponent } from './cart/cart.component';

@NgModule({
    declarations: [StoreComponent, PageNotFoundComponent, NavComponent, FooterComponent, CartSummaryComponent, CartComponent],
    imports: [
        CommonModule,
        AppRoutingModule
    ],
    exports: [
        StoreComponent
    ],
    providers: [

    ]
})

export class StoreModule{}
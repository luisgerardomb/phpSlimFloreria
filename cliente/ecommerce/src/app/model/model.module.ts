import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DatasourceService } from './datasource.service';
import { RepositoryService } from './repository.service';
import { Carrito } from './carrito';

@NgModule({
    declarations: [],
    imports: [
        CommonModule
    ],
    providers:[
        DatasourceService,
        RepositoryService,
        Carrito
    ]
})
export class ModelModule {}
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

const PROTOCOL = 'http';

@Injectable({
    providedIn: 'root'
})
export class DatasourceService {
    private baseUrl: string;

    constructor(private httpClient: HttpClient){
        this.baseUrl = `${PROTOCOL}://${location.hostname}/floreria/api`;
    };

    getProducts(): any{
        return this.httpClient.get(this.baseUrl + '/productos');
    }
}
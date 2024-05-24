
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductoService {

  private apiUrl = 'http://localhost:8100/productos';

  constructor(private http: HttpClient) { }

  getProductos(): Observable<any> {
    return this.http.get<any>(this.apiUrl);
  }

  addProducto(producto: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, producto);
  }

  deleteProducto(id: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${id}`);
  }
}

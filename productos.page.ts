import { Component, OnInit } from '@angular/core';
import { ProductoService } from '../services/producto.service';

@Component({
  selector: 'app-productos',
  templateUrl: './productos.page.html',
  styleUrls: ['./productos.page.scss'],
})
export class ProductosPage implements OnInit {

  productos: any[] = [];

  constructor(private productoService: ProductoService) { }

  ngOnInit() {
    this.cargarProductos();
  }

  cargarProductos() {
    this.productoService.getProductos().subscribe(data => {
      this.productos = data;
    });
  }

  eliminarProducto(id: number) {
    this.productoService.deleteProducto(id).subscribe(() => {
      this.productos = this.productos.filter(producto => producto.id !== id);
    });
  }
}

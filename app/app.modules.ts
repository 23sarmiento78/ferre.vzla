import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { RouterModule, Routes } from '@angular/router';

// Importa tus componentes aquí
import { ProductosComponent } from './productos/productos.component';
import { CitaComponent } from './cita/cita.component';
import { NosotrosComponent } from './nosotros/nosotros.component';

// Define las rutas de la aplicación
const appRoutes: Routes = [
  { path: 'productos', component: ProductosComponent },
  { path: 'cita', component: CitaComponent },
  { path: 'nosotros', component: NosotrosComponent },
  { path: '', redirectTo: '/productos', pathMatch: 'full' } // Ruta predeterminada
];

@NgModule({
  declarations: [
    AppComponent,
    ProductosComponent, // Declara tus componentes aquí
    CitaComponent,
    NosotrosComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    RouterModule.forRoot(appRoutes) // Importa las rutas
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

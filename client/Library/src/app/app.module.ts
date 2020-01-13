import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { HttpClientModule } from '@angular/common/http';
import { HttpService } from './http.service';
import { KsiegozbiorComponent } from './ksiegozbior/ksiegozbior.component';
import { CzytelnicyComponent } from './czytelnicy/czytelnicy.component';
import { WypozyczeniaComponent } from './wypozyczenia/wypozyczenia.component';


@NgModule({
  declarations: [
    AppComponent,
    KsiegozbiorComponent,
    CzytelnicyComponent,
    WypozyczeniaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [HttpService],
  bootstrap: [AppComponent]
})
export class AppModule { }

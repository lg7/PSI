import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { HttpClientModule } from '@angular/common/http';
import { HttpService } from './http.service';
import { KsiegozbiorComponent } from './ksiegozbior/ksiegozbior.component';
import { CzytelnicyComponent } from './czytelnicy/czytelnicy.component';
import { WypozyczeniaComponent, WypozyczComponentOkno, OddawanieComponentOkno } from './wypozyczenia/wypozyczenia.component';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MatNativeDateModule} from '@angular/material/core';
import {DemoMaterialModule} from './material-module';
import { AlertsModule } from 'angular-alert-module';

@NgModule({
  declarations: [
    AppComponent,
    KsiegozbiorComponent,
    CzytelnicyComponent,
    WypozyczeniaComponent,
    WypozyczComponentOkno,
    OddawanieComponentOkno
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    MatNativeDateModule,
    ReactiveFormsModule,
    DemoMaterialModule,
    AlertsModule.forRoot()
  ],

  providers: [HttpService],
  bootstrap: [AppComponent],
  entryComponents: [WypozyczeniaComponent, WypozyczComponentOkno,OddawanieComponentOkno]

})
export class AppModule { }

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
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
import { LogowanieComponent } from './logowanie/logowanie.component';
import { AlertComponent } from './_components/alert.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';

import { fakeBackendProvider } from './_helpers';

import { routing }        from './app.routing';

import { JwtInterceptor, ErrorInterceptor } from './_helpers';
import { StronaGlownaComponent } from './strona-glowna/strona-glowna.component';

@NgModule({
  declarations: [
    AppComponent,
    KsiegozbiorComponent,
    CzytelnicyComponent,
    WypozyczeniaComponent,
    WypozyczComponentOkno,
    OddawanieComponentOkno,
    LogowanieComponent,
    AlertComponent,
    HomeComponent,
    LoginComponent,
    RegisterComponent,
    StronaGlownaComponent

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    MatNativeDateModule,
    DemoMaterialModule,
    AlertsModule.forRoot(),
    routing
  ],

  providers: [
    { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
      HttpService,
      fakeBackendProvider
    ],
  entryComponents: [WypozyczeniaComponent, WypozyczComponentOkno, OddawanieComponentOkno],
  bootstrap: [AppComponent]


})
export class AppModule { }

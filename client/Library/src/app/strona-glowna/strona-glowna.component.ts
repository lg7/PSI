import { Component, OnInit } from '@angular/core';
import { Subscription, Observable } from 'rxjs';
import { first } from 'rxjs/operators';
import { Czytelnicy, Ksiegozbior, Wypozyczenia, Wypozyczksiazke } from '../Interfejsy';
import { User } from '../_models';
import { UserService, AuthenticationService } from '../_services';

@Component({
  selector: 'app-strona-glowna',
  templateUrl: './strona-glowna.component.html',
  styleUrls: ['./strona-glowna.component.css']
})
export class StronaGlownaComponent implements OnInit {

  constructor() { }

  public dane: any;
  title = 'Library';
  biblioteka = 'Biblioteka';
  adress = "";

  // czytelnicy: Observable<any>;
  ksiegozbior: Observable<any>;
  data = [];

  public loadksiegozbior = false;
  public loadczytelnicy = false;
  public loadwypozyczenia = false;

  loadKsiegozbior() {
    this.loadwypozyczenia = false;
    this.loadczytelnicy = false;
    this.loadksiegozbior = true;
  }

  loadCzytelnicy() {
    this.loadwypozyczenia = false;
    this.loadksiegozbior = false;
    this.loadczytelnicy = true;
  }

  loadWypozyczenia() {
    this.loadksiegozbior = false;
    this.loadczytelnicy = false;
    this.loadwypozyczenia = true;
  }



  ngOnInit() {
  }

}

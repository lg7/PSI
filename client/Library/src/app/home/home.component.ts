import { Component, OnInit, OnDestroy } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector:'home-component',
  templateUrl: 'home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

    constructor(
    ) {
    }

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



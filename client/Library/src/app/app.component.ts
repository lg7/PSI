import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Czytelnicy, Ksiegozbior, Wypozyczenia,Wypozyczksiazke } from './Interfejsy';
import { Observable } from "rxjs/Observable";
import { HttpService } from '../app/http.service'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Library';
  biblioteka = 'Biblioteka';
  adress = "";

  //czytelnicy: Observable<any>;
  ksiegozbior: Observable<any>;




  constructor(private httpService: HttpService) {
    
  }
  /* get_czytelnicy() {
    // this.adress = 'http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_czytelnicy';
     //this.http.get(this.adress).toPromise().then(data => { console.log(data); });
    // return this.czytelnicy = this.http.get(this.adress);
    //this.httpService.get_czytelnicy().subscribe(dane => {console.log(dane)});
   }
   getCzytelnic(){
     //this.httpService.getCzytelnic('1A').subscribe(dane=>{console.log(dane)});
   }
   getKsiegozbior() {
   //  this.adress = 'http://krywiak.com.pl/api/bibliotekarka/ksiegozbior/get_ksiegozbior';
    // return this.ksiegozbior = this.http.get(this.adress);
   }*/
  //1. Wypożyczanie książki
  get_id_czytelnika_wypozyczanie(ImieNazwisko: string) {
    this.httpService.get_id_czytelnika_wypozyczanie(ImieNazwisko).subscribe(dane => {console.log(dane)});
  }
  data=[];

  //POST
  
  wypozycz_ksiazke(id_czytelnika: number,id_książki: number) {
    const obiekt: Wypozyczksiazke=({});
    this.httpService.wypozycz_ksiazke(obiekt,id_czytelnika,id_książki).subscribe(dane=>{console.log(dane)});
   }

  get_wypozyczenia_czytelnika_wypozyczanie(id: number) { 
    this.httpService.get_wypozyczenia_czytelnika_wypozyczanie(id).subscribe((dane)=>{this.data=dane; console.log(dane)});
    
  }

  get_imienazwisko_czytelnika_wypozyczanie(id: number) { 
    this.httpService.get_imienazwisko_czytelnika_wypozyczanie(id).subscribe((dane)=>{console.log(dane)});
  }

  get_czytelnicy_wypozyczanie() { 
    this.httpService.get_czytelnicy_wypozyczanie().subscribe(dane=>{console.log(dane)});
  }


  //2. Zwracanie ksiażki

  get_id_czytelnika_oddawanie(ImieNazwisko: string) { 
    this.httpService.get_id_czytelnika_oddawanie(ImieNazwisko).subscribe(dane=>{console.log(dane)});
  }


  //POST 
  oddaj_ksiazke(id_czytelnika: number,id_książki: number) {
    const obiekt: Wypozyczksiazke=({});
    this.httpService.oddaj_ksiazke(obiekt,id_czytelnika,id_książki).subscribe(dane=>{console.log(dane)});
 
   }

  get_wypozyczenia_czytelnika_oddawanie(id: number) { 
    
   
    this.httpService.get_wypozyczenia_czytelnika_oddawanie(id).subscribe(dane=>{console.log(dane)});
  }
  

  get_imienazwisko_czytelnika_oddawanie(id: number) { 
   
    this.httpService.get_imienazwisko_czytelnika_oddawanie(id).subscribe(dane=>{console.log(dane)});
  }

  get_czytelnicy_oddawanie() { 
    this.httpService.get_czytelnicy_oddawanie().subscribe((dane)=>{this.data=dane; console.log(dane)});
  }

  //3. Wypożyczenia

  get_wypozyczenia() { 
    this.httpService.get_wypozyczenia().subscribe(dane=>{console.log(dane)});
  }

  get_wypozyczenia_nieoddane() { 
    this.httpService.get_wypozyczenia_nieoddane().subscribe(dane=>{console.log(dane)});
  }


  //4. Czytelnicy
  get_czytelnicy_czytelnicy(klasa: string) {
    this.httpService.get_czytelnicy_czytelnicy(klasa).subscribe(dane=>{console.log(dane)});
   }


  get_id_czytelnika_czytelnicy(ImieNazwisko: string) { 
    this.httpService.get_id_czytelnika_czytelnicy(ImieNazwisko).subscribe(dane=>{console.log(dane)});
  }

  //POST
  insert_czytelnik(ImieNazwisko: string, klasa: string) { 
    const obiekt: Wypozyczksiazke=({});
    this.httpService.insert_czytelnik(obiekt,ImieNazwisko,klasa).subscribe(dane=>{console.log(dane)});
  }

  //POST
  update_czytelnik(IdCzytelnika:string, ImieNazwisko:string,Klasa:string,Uwagi:string) {
    const obiekt: Wypozyczksiazke=({});
    this.httpService.update_czytelnik(obiekt,IdCzytelnika,ImieNazwisko,Klasa,Uwagi).subscribe(dane=>{console.log(dane)});
  
   }


  get_czytelnik(id:number) {
    this.httpService.get_czytelnik(id).subscribe(dane=>{console.log(dane)}); }

  //5.Księgozbiór
  get_ksiegozbior() { this.httpService.get_ksiegozbior().subscribe(dane=>{console.log(dane)});}


}

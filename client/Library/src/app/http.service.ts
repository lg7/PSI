import { Injectable } from "@angular/core";
import { Czytelnicy, Ksiegozbior, Wypozyczenia, Wypozyczksiazke } from './Interfejsy';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { HttpHeaders } from '@angular/common/http';




@Injectable()
export class HttpService {

  constructor(private http: HttpClient) { }

  //1. Wypożyczanie książki
  get_id_czytelnika_wypozyczanie(ImieNazwisko: string) {
    //ImieNazwisko='http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_wypozyczenia_czytelnika/Krzysztof%20Krywiak';
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_id_czytelnika/' + ImieNazwisko);
    //Probem spacja nie mozna obsluzyc
  }

  //POST
  wypozycz_ksiazke(post: Wypozyczksiazke, a: number, b: number) {
    return this.http.post('http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/wypozycz_ksiazke/' + a + '/' + b, this.wypozycz_ksiazke);
    //post problem przekazac obiekt
  }

  get_wypozyczenia_czytelnika_wypozyczanie(id: number) {
    id = 2;
    return this.http.get<Array<Czytelnicy>>('http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_wypozyczenia_czytelnika/' + id);
  }

  get_imienazwisko_czytelnika_wypozyczanie(id: number) {
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_imienazwisko_czytelnika/' + id);
  }

  get_czytelnicy_wypozyczanie(): Observable<Array<Czytelnicy>> {
    return this.http.get<Array<Czytelnicy>>('http://krywiak.com.pl/api/bibliotekarka/wypozyczanie/get_czytelnicy');
  }


  //2. Zwracanie ksiażki

  get_id_czytelnika_oddawanie(ImieNazwisko: string) {

    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/oddawanie/get_id_czytelnika/' + ImieNazwisko);
  }


  //POST
  oddaj_ksiazke(post: Wypozyczksiazke, id_czytelnika: number, id_książki: number) {
    return this.http.post('http://krywiak.com.pl/api/bibliotekarka/oddawanie/oddaj_ksiazke' + '/' + id_czytelnika + '/' + id_książki, this.wypozycz_ksiazke);
  }

  get_wypozyczenia_czytelnika_oddawanie(id: number) {
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/oddawanie/get_wypozyczenia_czytelnika/' + id);
  }

  get_imienazwisko_czytelnika_oddawanie(id: number) {
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/oddawanie/get_imienazwisko_czytelnika/' + id);
  }

  get_czytelnicy_oddawanie(): Observable<Array<Czytelnicy>> {
    return this.http.get<Array<Czytelnicy>>('http://krywiak.com.pl/api/bibliotekarka/oddawanie/get_czytelnicy');
  }

  //3. Wypożyczenia

  get_wypozyczenia(): Observable<Array<Wypozyczenia>> {
    return this.http.get<Array<Wypozyczenia>>('http://krywiak.com.pl/api/bibliotekarka/wypozyczenia/get_wypozyczenia');
  }

  get_wypozyczenia_nieoddane(): Observable<Array<Wypozyczenia>> {
    return this.http.get<Array<Wypozyczenia>>('http://krywiak.com.pl/api/bibliotekarka/wypozyczenia/get_wypozyczenia_nieoddane');
  }


  //4. Czytelnicy
  get_czytelnicy(): Observable<Array<Czytelnicy>> {
    return this.http.get<Array<Czytelnicy>>('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/get_czytelnicy_wszyscy');
  }


  get_czytelnicy_czytelnicy(klasa: string): Observable<Array<Czytelnicy>> {
    return this.http.get<Array<Czytelnicy>>('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/get_czytelnicy/' + klasa);
  }


  get_id_czytelnika_czytelnicy(ImieNazwisko: string) {
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/get_id_czytelnika/' + ImieNazwisko);
  }






  // POST
  insert_czytelnik(ImieNazwisko: string, klasa: string) {
    return this.http.post('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/insert_czytelnik/' + ImieNazwisko, + '/' + klasa);
  }


  addPost(post: Czytelnicy): Observable<Czytelnicy> {
    return this.http.post<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/insert_czytelnik/', + post);
  }




  //POST
  update_czytelnik(post: Wypozyczksiazke, IdCzytelnika: string, ImieNazwisko: string, Klasa: string, Uwagi: string) {
    return this.http.post('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/update_czytelnik/' + IdCzytelnika + '/' + ImieNazwisko + '/' + Klasa + '/' + Uwagi, this.wypozycz_ksiazke);
  }


  get_czytelnik(id: number) {
    return this.http.get<Czytelnicy>('http://krywiak.com.pl/api/bibliotekarka/czytelnicy/get_czytelnik/' + id)
  }

  // 5.Księgozbiór
  get_ksiegozbior(): Observable<Array<Ksiegozbior>> {
    return this.http.get<Array<Ksiegozbior>>('http://krywiak.com.pl/api/bibliotekarka/ksiegozbior/get_ksiegozbior');
  }

}

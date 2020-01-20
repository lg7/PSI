import { Component, OnInit } from '@angular/core';
import { Ksiegozbior, Czytelnicy, Wypozyczksiazke } from '../Interfejsy';
import { HttpService } from '../http.service';
import { FormGroup, FormBuilder, Validators, FormControl } from '@angular/forms';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-czytelnicy',
  templateUrl: './czytelnicy.component.html',
  styleUrls: ['./czytelnicy.component.css']
})
export class CzytelnicyComponent implements OnInit {
  public data: any;
  czytelnicy: Czytelnicy[] = [];

  imie = new FormControl('');
  klasa = new FormControl('');
  uwagi = new FormControl('');

  constructor(private formBuilder: FormBuilder, private httpService: HttpService) { }

  ngOnInit(): void {
     this.httpService.get_czytelnicy().subscribe(dane => {
       this.data = dane;
     });
   }


   onSubmit() {
    const p: Czytelnicy = ({
      imie_nazwisko: this.imie.value,
      klasa: this.klasa.value,
      uwagi: this.uwagi.value
    });

    this.httpService
       .insert_czytelnik(p.imie_nazwisko, p.klasa, p.uwagi)
       .subscribe(post => {
         this.czytelnicy.push(p);
         this.httpService.get_czytelnicy().subscribe(dane => {
          this.data = dane;
        });
       });

  }

  /*
   insert_czytelnikk() {
     const p: Czytelnicy = ({
       id_czytelnika: '2',
       imie_nazwisko: 'imie',
       klasa: 'klasa',
       uwagi: 'uwagi'
     });

     const obiekt: Wypozyczksiazke = ({});

     this.httpService
       .insert_czytelnik(p.imie_nazwisko, p.klasa, p.uwagi)
       .subscribe(post => {
         this.czytelnicy.push(p);
         console.log(p);
       });

     this.httpService
       .update_czytelnik(obiekt, p.id_czytelnika, p.imie_nazwisko, p.klasa, p.uwagi)
       .subscribe(post => {
         this.czytelnicy.push(p);
         console.log(p);
       });
   }
*/


}

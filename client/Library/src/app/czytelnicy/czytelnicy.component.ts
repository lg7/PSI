import { Component, OnInit } from '@angular/core';
import { Ksiegozbior, Czytelnicy } from '../Interfejsy';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-czytelnicy',
  templateUrl: './czytelnicy.component.html',
  styleUrls: ['./czytelnicy.component.css']
})
export class CzytelnicyComponent implements OnInit {
  public data: any;
  czytelnicy: Czytelnicy[] = [];

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService.get_czytelnicy().subscribe(dane => {
      this.data = dane;
      var sample = JSON.stringify(dane);
    });
  }

  insert_czytelnik() {
    const p: Czytelnicy = ({
      imie_nazwisko: 'kuba',
      klasa: 'piąta',
      uwagi: 'nie ma'
    });

    this.httpService.addPost(p).subscribe(post => {
      this.czytelnicy.push(p);
      console.log(p);
    });
  }

}

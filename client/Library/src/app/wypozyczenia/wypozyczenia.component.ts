import { Component, OnInit } from '@angular/core';
import { Ksiegozbior } from '../Interfejsy';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-wypozyczenia',
  templateUrl: './wypozyczenia.component.html',
  styleUrls: ['./wypozyczenia.component.css']
})
export class WypozyczeniaComponent implements OnInit {
  public data: any;

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService.get_wypozyczenia().subscribe(dane => {
      this.data = dane;
      var sample = JSON.stringify(dane);
    });
  }

}

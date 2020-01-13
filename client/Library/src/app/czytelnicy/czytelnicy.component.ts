import { Component, OnInit } from '@angular/core';
import { Ksiegozbior } from '../Interfejsy';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-czytelnicy',
  templateUrl: './czytelnicy.component.html',
  styleUrls: ['./czytelnicy.component.css']
})
export class CzytelnicyComponent implements OnInit {
  public data: any;

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService.get_czytelnicy().subscribe(dane => {
      this.data = dane;
      var sample = JSON.stringify(dane);
    });
  }

}

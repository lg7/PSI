import { Component, OnInit } from '@angular/core';
import { Ksiegozbior } from '../Interfejsy';
import { HttpService } from '../http.service';


@Component({
  selector: 'app-ksiegozbior',
  templateUrl: './ksiegozbior.component.html',
  styleUrls: ['./ksiegozbior.component.css']
})
export class KsiegozbiorComponent implements OnInit {
  public data: any;

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService.get_ksiegozbior().subscribe(dane => {
      this.data = dane;
      var sample = JSON.stringify(dane);
    });
  }

}

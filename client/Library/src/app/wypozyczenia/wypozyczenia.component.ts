import { Component, OnInit, Inject, ViewChild, ElementRef } from '@angular/core';
import { Ksiegozbior, Czytelnicy } from '../Interfejsy';
import { HttpService } from '../http.service';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA, MatDialogConfig } from '@angular/material/dialog';
import { KsiegozbiorComponent } from '../ksiegozbior/ksiegozbior.component';
import { FormControl } from '@angular/forms';
import { AlertsService } from 'angular-alert-module';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-wypozyczenia',
  templateUrl: './wypozyczenia.component.html',
  styleUrls: ['./wypozyczenia.component.css']
})

export class WypozyczeniaComponent implements OnInit {

  ngOnInit(): void {
    this.httpService.get_ksiegozbior().subscribe(dane => {
      this.dataNazwy = dane;
    });

    this.httpService.get_wypozyczenia().subscribe(dane => {
      this.data = dane;
    });
  }

  public data: any;
  public dataNazwy: any;

  animal: string;
  name: string;

  constructor(private httpService: HttpService, public dialog: MatDialog) { }

  openDialogwypozycz(): void {
    const dialogRef = this.dialog.open(WypozyczComponentOkno, {
      width: '1000px',
      data: { name: this.name, animal: this.animal }
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
      this.animal = result;
      this.httpService.get_wypozyczenia().subscribe(dane => {
        this.data = dane;
      });
    });
  }

  openDialogoddaj(): void {
    const dialogRef = this.dialog.open(OddawanieComponentOkno, {
      width: '1000px',
      data: { name: this.name, animal: this.animal }
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
      this.animal = result;
      this.httpService.get_wypozyczenia().subscribe(dane => {
        this.data = dane;
      });
    });
  }

  onCreate() {
    this.dialog.open(WypozyczComponentOkno);
  }
}

@Component({
  selector: 'wypozycz.component.okno',
  templateUrl: 'wypozycz.component.okno.html',
})

export class WypozyczComponentOkno {
  @ViewChild('alert', { static: true }) alert: ElementRef;

  public dataNazwy: any;

  numer_inwentarza = new FormControl('');
  imie_nazwisko = new FormControl('');
  alertBrakNumeruInwentarza = new FormControl('');
  odebraneID: any;
  odebranaKsiazka: any;

  ngOnInit(): void {
    this.httpService.get_ksiegozbior().subscribe(dane => {
      this.dataNazwy = dane;
    });

  }
  constructor(private httpService: HttpService, private alerts: AlertsService,
    public dialogRef: MatDialogRef<WypozyczComponentOkno>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) { }


  onNoClick(): void {
    this.dialogRef.close();
  }

  imie_nazwisko2: string;
  numer_inwentarza2: number;

  wypozycz_ksiazke(): void {
    console.log("Imie i Nazwisko:" + this.imie_nazwisko2);
    console.log("Numer inwentarza" + this.numer_inwentarza2);
    this.httpService
      .get_id_czytelnika_wypozyczanie(this.imie_nazwisko2)
      .subscribe(dane => {
        this.odebraneID = dane;
        if (this.odebraneID != null) {
          console.log('id nr odebrany', this.odebraneID.id_czytelnika);
          this.httpService.get_ksiazka(this.numer_inwentarza2).subscribe(dane => {
            this.odebranaKsiazka = dane;
            if (this.odebranaKsiazka != null) {
              console.log('Ksiazka jest w bazie', this.odebranaKsiazka);
              this.httpService.wypozycz_ksiazke2(this.odebraneID.id_czytelnika, this.numer_inwentarza2).subscribe(response => { });
              this.alerts.setMessage('Książka wypożyczona poprawnie', 'error');
            } else {
              this.alerts.setMessage('O rany! Nie ma książki o takim numerze!', 'error');
              console.log('Nie ma takiej ksiazki');
            }
          });
        } else {
          this.alerts.setMessage('O rany! Nie ma takiego czytelnika!', 'error');
          console.log('Nie ma takiego czytelnika');
        }
      });
  }

}



@Component({
  selector: 'oddawanie.component.okno',
  templateUrl: 'oddawanie.component.okno.html',
})

export class OddawanieComponentOkno {
  @ViewChild('alert', { static: true }) alert: ElementRef;

  public dataNazwy: any;

  numer_inwentarza = new FormControl('');
  imie_nazwisko = new FormControl('');
  alertBrakNumeruInwentarza = new FormControl('');
  odebraneID: any;
  odebranaKsiazka: any;

  ngOnInit(): void {
    this.httpService.get_ksiegozbior().subscribe(dane => {
      this.dataNazwy = dane;
    });

  }
  constructor(private httpService: HttpService, private alerts: AlertsService,
    public dialogRef: MatDialogRef<WypozyczComponentOkno>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) { }


  onNoClick(): void {
    this.dialogRef.close();
  }

  imie_nazwisko2: string;
  numer_inwentarza2: number;

  Oddaj_ksiazke(): void {
    console.log("Imie i Nazwisko:" + this.imie_nazwisko2);
    console.log("Numer inwentarza" + this.numer_inwentarza2);
    this.httpService
      .get_id_czytelnika_wypozyczanie(this.imie_nazwisko2)
      .subscribe(dane => {
        this.odebraneID = dane;
        if (this.odebraneID != null) {
          console.log('id nr odebrany', this.odebraneID.id_czytelnika);
          this.httpService.get_ksiazka(this.numer_inwentarza2).subscribe(dane => {
            this.odebranaKsiazka = dane;
            if (this.odebranaKsiazka != null) {
              console.log('Ksiazka jest w bazie', this.odebranaKsiazka);
              this.httpService.Oddaj_ksiazke2( this.odebraneID.id_czytelnika, this.numer_inwentarza2 ).subscribe(response => { });
              this.alerts.setMessage('Książka oddana poprawnie', 'error');
            } else {
              this.alerts.setMessage('O rany! Nie ma książki o takim numerze!', 'error');
              console.log('Nie ma takiej ksiazki');
            }
          });
        } else {
          this.alerts.setMessage('O rany! Nie ma takiego czytelnika!', 'error');
          console.log('Nie ma takiego czytelnika');
        }
      });
  }


}

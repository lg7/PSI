
export interface Ksiegozbior {
  nr_inwentarza?: string;
  znak_miejsca?: string;
  tytul?: string;
  nazwa_autora?: string;
  rok_wydawca?: string;
  cena?: string;
  data_wpisu?: string;
  uwagiss?: any;
  nazwa_podzodzenia?: string;
}
export interface Czytelnicy {
  id_czytelnika?: string;
  imie_nazwisko?: string;
  klasa?: string;
  uwagi?: any;
}
export interface Wypozyczenia {
  nr_inwentarza?: string;
  tytul?: string;
  imie_nazwisko?: string;
  klasa?: string;
  id_wypozyczenia?: string;
  data_wyp?: string;
  data_odd?: any;
}
export interface Wypozyczksiazke {
  idCzyt?: string;
  idWypoz?: string;
}
export interface Iczytelnika {
  idCzyt?: string;
  idWypoz?: string;
}

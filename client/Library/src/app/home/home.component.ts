import { Component, OnInit, OnDestroy } from '@angular/core';
import { Subscription, Observable } from 'rxjs';
import { first } from 'rxjs/operators';
import { Czytelnicy, Ksiegozbior, Wypozyczenia, Wypozyczksiazke } from '../Interfejsy';
import { User } from '../_models';
import { UserService, AuthenticationService } from '../_services';

@Component({
  selector:'home-component',
  templateUrl: 'home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit, OnDestroy {
    currentUser: User;
    currentUserSubscription: Subscription;
    users: User[] = [];

    constructor(
        private authenticationService: AuthenticationService,
        private userService: UserService
    ) {
        this.currentUserSubscription = this.authenticationService.currentUser.subscribe(user => {
            this.currentUser = user;
        });
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
        this.loadAllUsers();
    }

    ngOnDestroy() {
        // unsubscribe to ensure no memory leaks
        this.currentUserSubscription.unsubscribe();
    }

    deleteUser(id: number) {
        this.userService.delete(id).pipe(first()).subscribe(() => {
            this.loadAllUsers()
        });
    }

    private loadAllUsers() {
        this.userService.getAll().pipe(first()).subscribe(users => {
            this.users = users;
        });
    }
}

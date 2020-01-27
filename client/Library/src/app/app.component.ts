import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthenticationService } from './_services';
import { User } from './_models';
import { MatDialog, MatDialogRef } from '@angular/material/dialog';
import { Subscription } from 'rxjs';
import { first } from 'rxjs/operators';
import { UserService } from '../app/_services';
@Component({
  selector: 'app',
  templateUrl: 'app.component.html'
})

export class AppComponent {
  currentUser: User;
  currentUserSubscription: Subscription;
  users: User[] = [];

  constructor(
    public dialog: MatDialog,
    private router: Router,
    private authenticationService: AuthenticationService,


  ) {
    this.authenticationService.currentUser.subscribe(x => this.currentUser = x);
  }

  logout() {
    this.authenticationService.logout();
    this.router.navigate(['/login']);
  }

  openDialogwypozycz(): void {
    const dialogRef = this.dialog.open(AppComponentOkno, {
      width: '1000px',
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
    });
  }

  onCreate() {
    this.dialog.open(AppComponentOkno);
  }
}

@Component({
  selector: 'app.component.okno',
  templateUrl: 'app.component.okno.html',
})

export class AppComponentOkno {

  currentUser: User;
  currentUserSubscription: Subscription;
  users: User[] = [];


  constructor(public dialog: MatDialog,
    public dialogRef: MatDialogRef<AppComponentOkno>,
    private authenticationService: AuthenticationService,
    private userService: UserService
  ) {
    this.currentUserSubscription = this.authenticationService.currentUser.subscribe(user => {
      this.currentUser = user;
    });
  }

  ngOnInit(): void {
    this.loadAllUsers();
  }

  onNoClick(): void {
    this.dialogRef.close();
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

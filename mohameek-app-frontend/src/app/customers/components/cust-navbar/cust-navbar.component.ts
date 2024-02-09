import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { Emitters } from 'src/app/emitters/emitters';

@Component({
  selector: 'app-cust-navbar',
  templateUrl: './cust-navbar.component.html',
  styleUrls: ['./cust-navbar.component.scss']
})
export class CustNavbarComponent {
  authenticated = false;

  constructor(private http: HttpClient) {
  }

  ngOnInit(): void {
    Emitters.custAuthStatus.subscribe(
      (auth: boolean) => {
        this.authenticated = auth;
      }
    );
  }

  logout(): void {
    this.http.post('http://localhost:8000/api/logout', {}, {withCredentials: true})
      .subscribe(() => Emitters.custAuthStatus.emit(false));
  }

}

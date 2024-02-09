import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { Emitters } from 'src/app/emitters/emitters';
import { CookieService } from 'src/app/shared/services/cookie.service';



@Component({
  selector: 'app-user-home',
  templateUrl: './user-home.component.html',
  styleUrls: ['./user-home.component.scss']
})
export class UserHomeComponent {
  message = '';


  constructor(
    private http: HttpClient,
    private cookie: CookieService
  ) {
  }

  ngOnInit(): void {
    this.http.get('http://localhost:8000/api/user', {withCredentials: true}).subscribe(
      (res: any) => {
        this.message = `Hi ${res.name}`;
        Emitters.authStatus.emit(true);
      },
      err => {
        this.message = 'You are not logged in';
        Emitters.authStatus.emit(false);
      }
    );

    // console.log("jwt cookie: "+this.cookie.getCookie('jwt'));
  }


}

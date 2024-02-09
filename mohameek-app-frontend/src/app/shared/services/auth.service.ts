import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { HttpClient } from '@angular/common/http';



@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor(private http: HttpClient) { }


  // current User
  CurrentUser() {

    return from(this.http.get(
      'http://localhost:8000/api/user',
      {
        withCredentials: true
      }
    ));

  }

  // Login
  login(data: any) {

    return from(this.http.post(
      'http://localhost:8000/api/login', data,
      {
        withCredentials: true
      }
    ));

  }

  // register
  signUp(data: any) {
    return from(this.http.post(
      'http://localhost:8000/api/register',
      data,
      {
        withCredentials: true
      }
    ));

  }


}

import { Injectable } from '@angular/core';
import { Observable, from } from 'rxjs';
import { HttpClient } from '@angular/common/http';



@Injectable({
  providedIn: 'root',
})
export class CustAuthService {
  constructor(private http: HttpClient) { }


  // current Customer
  CurrentCustomer() {

    return from(this.http.get(
      'http://localhost:8000/api/customers/customer',
      {
        withCredentials: true
      }
    ));

  }

  // Login
  login(data: any) {

    return from(this.http.post(
      'http://localhost:8000/api/customers/login', data,
      {
        withCredentials: true
      }
    ));

  }

  // register
  signUp(data: any) {
    return from(this.http.post(
      'http://localhost:8000/api/customers/register',
      data,
      {
        withCredentials: true
      }
      ));

  }


}

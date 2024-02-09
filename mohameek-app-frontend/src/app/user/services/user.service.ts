import { Injectable } from '@angular/core';
// import { Http, Response, Headers, RequestOptions } from "@angular/http";
import { Observable, Subject } from 'rxjs';
import { HttpClient } from '@angular/common/http';

export interface User {
  id: number;
  name: string;
  email: string;
}

@Injectable({
  providedIn: 'root'
})
export class UserService {


  constructor(private http: HttpClient) { }

  getUser() {
    return this.http
      .get(
        "http://localhost:8000/api/user",
        {
          withCredentials: true
        }
      );
  }

  
}

import { Component, OnInit } from '@angular/core';
import { SliderComponent } from './slider/slider/slider.component';
import { Emitters } from './emitters/emitters';
import { CustAuthService } from './customers/services/cust-auth.service';




@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent implements OnInit {
  title = 'Mohameek.net';

  custAuth:boolean = false;
  lawyerAuth:boolean = false;

  constructor(
    private custAuthservice: CustAuthService
  ) { }

  ngOnInit(): void {
    this.custAuth = true;
    this.custAuthservice.CurrentCustomer().subscribe(
      (res: any) => {
        Emitters.custAuthStatus.emit(true);
        this.custAuth = true;
      },
      err => {
        Emitters.authStatus.emit(false);
      }
    );
    Emitters.lawyerAuth.subscribe(
      (auth: boolean) => {
        this.lawyerAuth = auth;
      }
    );
  }

  submit() {
  }

  logout() {

  }

}

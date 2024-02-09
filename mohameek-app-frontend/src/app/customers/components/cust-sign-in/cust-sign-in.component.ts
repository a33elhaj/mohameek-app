import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { HotToastService } from '@ngneat/hot-toast';
import { CustAuthService } from '../../services/cust-auth.service';
import { Emitters } from 'src/app/emitters/emitters';

@Component({
  selector: 'app-cust-sign-in',
  templateUrl: './cust-sign-in.component.html',
  styleUrls: ['./cust-sign-in.component.scss']
})
export class CustSignInComponent implements OnInit {

  loginForm = new FormGroup({
    phone: new FormControl('',
      [
        Validators.required,
        Validators.maxLength(10),
        Validators.minLength(10)
      ]),

    password: new FormControl('', Validators.required),
  });
  errors: any = null;

  constructor(
    public fb: FormBuilder,
    private router: Router,
    private custAuthService: CustAuthService,
    private toast: HotToastService,
  ) {
  }

  ngOnInit(): void { }

  get phone() {
    return this.loginForm.get('phone');
  }

  get password() {
    return this.loginForm.get('password');
  }

  submit() {
    // console.log(this.loginForm.value);
    if (!this.loginForm.valid) {
      return;
    }

    this.custAuthService
      .login(this.loginForm.value)
      .subscribe(() => {
        Emitters.custAuthStatus.emit(true);
        this.router.navigate(['/cust-home']);
      });

  }



}

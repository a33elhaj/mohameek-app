import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { HotToastService } from '@ngneat/hot-toast';
import { AuthService } from 'src/app/shared/services/auth.service';
import { CustAuthService } from '../../services/cust-auth.service';
import { Emitters } from 'src/app/emitters/emitters';

@Component({
  selector: 'app-cust-sign-up',
  templateUrl: './cust-sign-up.component.html',
  styleUrls: ['./cust-sign-up.component.scss']
})
export class CustSignUpComponent implements OnInit {

  registerForm = new FormGroup({
    name: new FormControl('',
      [
        Validators.required,
      ]),
    email: new FormControl('',
      [
        Validators.required,
        Validators.email
      ]),
    phone: new FormControl('',
      [
        Validators.required,
        Validators.maxLength(10),
        Validators.minLength(10)
      ]),

    password: new FormControl('',
      [
        Validators.required,
      ]),
    confirmPassword: new FormControl('',
      [
        Validators.required,
      ]),
  });

  constructor(
    public fb: FormBuilder,
    private router: Router,
    private custAuthService: CustAuthService,
    private toast: HotToastService,
  ) {
  }

  ngOnInit(): void { }

  get name() {
    return this.registerForm.get('name');
  }

  get email() {
    return this.registerForm.get('email');
  }

  get phone() {
    return this.registerForm.get('phone');
  }

  get password() {
    return this.registerForm.get('password');
  }

  submit() {
    // console.log(this.registerForm.value);

    if (!this.registerForm.valid) {
      return;
    }

    this.custAuthService
      .signUp(this.registerForm.value)
      .subscribe(() => {
        Emitters.custAuthStatus.emit(true);
        this.router.navigate(['/cust-home']);
      });

  }

}

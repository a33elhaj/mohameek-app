import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { HotToastService } from '@ngneat/hot-toast';
import { AuthService } from 'src/app/shared/services/auth.service';
import { Emitters } from 'src/app/emitters/emitters';



@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss'],
})
export class SigninComponent implements OnInit {

  loginForm = new FormGroup({
    email: new FormControl('', [Validators.required, Validators.email]),
    password: new FormControl('', Validators.required),
  });
  errors: any = null;

  constructor(
    public fb: FormBuilder,
    private router: Router,
    private authService: AuthService,
    private toast: HotToastService,
  ) {
  }

  ngOnInit(): void { }

  get email() {
    return this.loginForm.get('email');
  }

  get password() {
    return this.loginForm.get('password');
  }

  onSubmit() {
    // console.log(this.loginForm.value);
    if (!this.loginForm.valid) {
      return;
    }

    this.authService
      .login(this.loginForm.value)
      .subscribe(() => {
        Emitters.authStatus.emit(true);
        this.router.navigate(['/home']);
      });

  }



}

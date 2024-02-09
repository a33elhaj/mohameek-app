import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserRoutingModule } from './user-routing.module';
import { SigninComponent } from './components/signin/signin.component';
import { SignupComponent } from './components/signup/signup.component';
import { UserProfileComponent } from './components/user-profile/user-profile.component';
import { UserHomeComponent } from './components/user-home/user-home.component';
import { MaterialModule } from '../shared/material/material.module';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from '../app-routing.module';
import { NavbarComponent } from './components/navbar/navbar.component';
import { SliderComponent } from './components/slider/slider.component';
import { MiddleMenuComponent } from './components/middle-menu/middle-menu.component';
import { WhoAreWeComponent } from './components/who-are-we/who-are-we.component';
import { FooterComponent } from './components/footer/footer.component';



@NgModule({
  declarations: [
    // SigninComponent,
    // SignupComponent,
    // UserProfileComponent,
    // UserHomeComponent

    // NavbarComponent

    // SliderComponent

    // MiddleMenuComponent

    // WhoAreWeComponent

    // FooterComponent
  ],
  imports: [
    // CommonModule,
    // UserRoutingModule,
    // MaterialModule,
    // HttpClientModule,
    // ReactiveFormsModule,
    // FormsModule,

    // // BrowserModule,
    // AppRoutingModule,
  ]
})
export class UserModule { }

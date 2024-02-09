import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MaterialModule } from './shared/material/material.module';
import { LandingComponent } from './components/landing/landing.component';
import { SigninComponent } from './user/components/signin/signin.component';
import { SignupComponent } from './user/components/signup/signup.component';
import { UserProfileComponent } from './user/components/user-profile/user-profile.component';
import { UserHomeComponent } from './user/components/user-home/user-home.component';
import { NavbarComponent } from './user/components/navbar/navbar.component';
import { HotToastModule } from '@ngneat/hot-toast';



import { CustProfileComponent } from './customers/components/cust-profile/cust-profile.component';
import { CustHomeComponent } from './customers/components/cust-home/cust-home.component';
import { CustSignInComponent } from './customers/components/cust-sign-in/cust-sign-in.component';
import { CustSignUpComponent } from './customers/components/cust-sign-up/cust-sign-up.component';
import { CustActivationCodeComponent } from './customers/components/cust-activation-code/cust-activation-code.component';
import { CustForgetPasswordComponent } from './customers/components/cust-forget-password/cust-forget-password.component';
import { SliderComponent } from './user/components/slider/slider.component';
import { MiddleMenuComponent } from './user/components/middle-menu/middle-menu.component';
import { WhoAreWeComponent } from './user/components/who-are-we/who-are-we.component';
import { CustLawyerSearchComponent } from './customers/components/cust-lawyer-search/cust-lawyer-search.component';
import { FooterComponent } from './user/components/footer/footer.component';
import { CustChatComponent } from './customers/components/cust-chat/cust-chat.component';
import { CustNavbarComponent } from './customers/components/cust-navbar/cust-navbar.component';



@NgModule({
  declarations: [
    AppComponent,
    LandingComponent,

    SigninComponent,
    SignupComponent,
    UserProfileComponent,
    UserHomeComponent,
    NavbarComponent,
    CustProfileComponent,
    CustHomeComponent,
    CustSignInComponent,
    CustSignUpComponent,
    CustActivationCodeComponent,
    CustForgetPasswordComponent,
    SliderComponent,
    MiddleMenuComponent,
    WhoAreWeComponent,
    CustLawyerSearchComponent,
    FooterComponent,
    CustChatComponent,
    CustNavbarComponent,


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    BrowserAnimationsModule,
    MaterialModule,
    HotToastModule.forRoot(),


  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

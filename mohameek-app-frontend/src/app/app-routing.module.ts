import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LandingComponent } from './components/landing/landing.component';
import { UserHomeComponent } from './user/components/user-home/user-home.component';
import { SigninComponent } from './user/components/signin/signin.component';
import { SignupComponent } from './user/components/signup/signup.component';
import { UserProfileComponent } from './user/components/user-profile/user-profile.component';
import { CustHomeComponent } from './customers/components/cust-home/cust-home.component';
import { CustSignInComponent } from './customers/components/cust-sign-in/cust-sign-in.component';
import { CustSignUpComponent } from './customers/components/cust-sign-up/cust-sign-up.component';
import { CustActivationCodeComponent } from './customers/components/cust-activation-code/cust-activation-code.component';
import { CustForgetPasswordComponent } from './customers/components/cust-forget-password/cust-forget-password.component';
import { CustLawyerSearchComponent } from './customers/components/cust-lawyer-search/cust-lawyer-search.component';
import { CustChatComponent } from './customers/components/cust-chat/cust-chat.component';



const routes: Routes = [
  { path: '', component: UserHomeComponent },
  { path: 'home', component: UserHomeComponent },
  { path: 'sign-in', component: SigninComponent },
  { path: 'sign-up', component: SignupComponent },
  { path: 'user-profile', component: UserProfileComponent },
  // {
  //   path: 'user',
  //   loadChildren: () => import('./user/user.module').then(m => m.UserModule),
  // },
  { path: 'cust-home', component: CustHomeComponent },
  { path: 'cust-sign-in', component:  CustSignInComponent},
  { path: 'cust-sign-up', component:  CustSignUpComponent},
  { path: 'cust-activation-code', component:  CustActivationCodeComponent},
  { path: 'cust-forget-password', component:  CustForgetPasswordComponent},
  { path: 'user-profile', component: UserProfileComponent },
  { path: 'cust-chat', component: CustChatComponent },
  { path: 'lawyer-search', component: CustLawyerSearchComponent },
  {
    path: 'chat',
    loadChildren: () => import('./chat/chat.module').then(m => m.ChatModule),
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

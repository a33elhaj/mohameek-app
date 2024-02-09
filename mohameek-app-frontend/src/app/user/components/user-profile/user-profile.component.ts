import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';
import { User, UserService } from '../../services/user.service';


@Component({
  selector: 'app-user-profile',
  templateUrl: './user-profile.component.html',
  styleUrls: ['./user-profile.component.scss'],
})
export class UserProfileComponent implements OnInit {

  protected user = {
    id: null,
    name: '',
    email: '',
  }

  constructor(private userService: UserService) { }

  ngOnInit() {
    this.userService.getUser().subscribe((res: any) => {
      this.user.id = res.id;
      this.user.name = res.name;
      this.user.email = res.email;
    });
  }
}

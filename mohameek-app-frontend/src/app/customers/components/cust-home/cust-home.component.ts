import { Component, OnInit } from '@angular/core';
import { PusherService } from 'src/app/shared/services/pusher.service';
import { Message } from '../cust-chat/cust-chat.component';
import { Emitters } from 'src/app/emitters/emitters';
import { CustAuthService } from '../../services/cust-auth.service';

@Component({
  selector: 'app-cust-home',
  templateUrl: './cust-home.component.html',
  styleUrls: ['./cust-home.component.scss']
})
export class CustHomeComponent implements OnInit {

  custAuth: boolean = false;
  welcome = '';

  constructor(
    private pusher: PusherService,
    private custAuthservice: CustAuthService
  ) { }

  messages: Array<Message> = [];

  ngOnInit() {
    this.custAuthservice.CurrentCustomer().subscribe(
      (res: any) => {
        this.welcome = `Hi ${res.name}`;
        Emitters.custAuthStatus.emit(true);
      },
      err => {
        this.welcome = 'You are not logged in';
        Emitters.authStatus.emit(false);
      }
    );

    const channel = this.pusher.init('chat');
    channel.listen('ChatEvent', (data: any) => {
      this.messages = this.messages.concat(data);
    });
  }


}

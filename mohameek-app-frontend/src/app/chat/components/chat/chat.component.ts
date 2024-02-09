import { Component, OnInit } from '@angular/core';
import Echo from 'laravel-echo';
import { Message } from 'src/app/utilites/message';
import { FormControl, FormGroup } from '@angular/forms';


@Component({
  selector: 'app-chat',
  templateUrl: './chat.component.html',
  styleUrls: ['./chat.component.scss']
})
export class ChatComponent implements OnInit {

  echo?: Echo;
  username = 'usernames';
  inputText = "";

  messages: Message[] = [
    {
      username: 'ali',
      message: 'ali msg',
    }
  ];

  constructor() {
    this.getSocketsId();
  }

  ngOnInit(): void {
    this.listenChat();
    // this.getGroupChat();
  }

  submit() {

  }

  getSocketsId() {
    // this.echo = this.chatService.getSockets();

    this.echo = new Echo({
      broadcaster: 'pusher',
      key: '11111',
      cluster: 'mt1',
      wsHost: window.location.hostname,
      wsPort: 6001,
      forceTLS: false,
      disableStats: true,
    });

  }


  listenChat() {
    this.echo?.channel('chat')
      .listen('ChatEvent', (data: Message) => {
        // console.log("Received: " + JSON.stringify(data));
        let ur = JSON.stringify(data.username);
        let msg = JSON.stringify(data.message);
        console.log("Received msg: " + msg);
        this.messages?.push(
          { username: ur, message: msg }
        );

      });
  }
}

import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { HttpClient } from '@angular/common/http';

declare const feather: any;
export interface Message {
  name: string;
  text: string;
}

@Component({
  selector: 'app-cust-chat',
  templateUrl: './cust-chat.component.html',
  styleUrls: ['./cust-chat.component.scss']
})
export class CustChatComponent implements OnInit {
  constructor(private http: HttpClient) { }

  @Output() onSendMessage: EventEmitter<Message> = new EventEmitter();
  user = '';
  message = {
    name: 'user',
    text: '',
  };

  sendMessage() {
    if (this.message.text !== '') {
      this.http
        .post(`http://localhost:8000/api/messages`, this.message)
        .subscribe((res: any) => {
          this.onSendMessage.emit(res);
          this.message = {
            name: this.user,
            text: '',
          };
        });
    }
  }


  ngOnInit(): void {
    feather.replace();
    this.http.get('http://localhost:8000/api/user', { withCredentials: true }).subscribe(
      (res: any) => {
        this.user = res.name;
      },
      err => {
        // this.message = 'You are not logged in';
        // Emitters.authStatus.emit(false);
      }
    );


  }
}

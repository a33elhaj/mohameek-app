import {Component, Input, OnInit} from '@angular/core';
import { Message } from 'src/app/utilites/message';

@Component({
  selector: 'app-chat-body-group',
  templateUrl: './chat-body-group.component.html',
  styleUrls: ['./chat-body-group.component.scss']
})
export class ChatBodyGroupComponent implements OnInit {
  @Input() allMessages: Message[] = [];

  constructor() { }

  ngOnInit(): void {
  }

}

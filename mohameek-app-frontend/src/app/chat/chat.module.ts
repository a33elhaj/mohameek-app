import { NgModule } from '@angular/core';
// import { CommonModule } from '@angular/common';
import { ChatRoutingModule } from './chat-routing.module';
import { ChatComponent } from './components/chat/chat.component';
import { ListUsersComponent } from './components/list-users/list-users.component';
import { ChatBodyGroupComponent } from './components/chat-body-group/chat-body-group.component';



@NgModule({
  declarations: [
    ChatComponent,
    ListUsersComponent,
    ChatBodyGroupComponent
  ],
  imports: [
    // CommonModule,
    ChatRoutingModule,
  ]
})
export class ChatModule { }

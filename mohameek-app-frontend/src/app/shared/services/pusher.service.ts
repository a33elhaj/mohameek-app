import { Injectable } from '@angular/core';
import Echo from 'laravel-echo';

// declare const Pusher: any;

@Injectable({
  providedIn: 'root',
})
export class PusherService {

  echo;

  constructor() {
    // Replace this with your pusher key
    // this.pusher = new Pusher('9ff042ea7d8ac21c7b69', {
    //   cluster: 'eu',
    //   encrypted: true,
    // });
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


  public init(channel: any) {
    return this.echo.channel(channel);
  }
}

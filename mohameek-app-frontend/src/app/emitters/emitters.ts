import { EventEmitter } from '@angular/core';

export class Emitters {
  static authStatus = new EventEmitter<boolean>();
  static custAuthStatus = new EventEmitter<boolean>();
  static lawyerAuth = new EventEmitter<boolean>();

}

import { User } from "./user";

export class Auth {
  constructor(private email: string,
              private user: User,
              public accessToken: string,
              private expiresIn: number,
              private tokenType: string) {
              }

  // Get ExpiresIn
  get getExpireIn() {
    return this.expiresIn;
  }

  // get token
  get getToken() {
    return this.accessToken;
  }
}

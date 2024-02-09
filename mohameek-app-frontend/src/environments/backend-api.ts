export class BackendApi {

  // source api
  public static BaseUrl = 'http://localhost:8000/api/';

  // All Application Api
  public static loginAPI = BackendApi.BaseUrl + 'login';
  public static registerAPI = BackendApi.BaseUrl + 'register';
  public static sendPasswordResetLinkAPI = BackendApi.BaseUrl + 'sendPasswordRequestLink';
  public static resetPasswordAPI = BackendApi.BaseUrl + 'changePassword';
  public static logoutAPI = BackendApi.BaseUrl + 'logout';

  public static usersAPI = BackendApi.BaseUrl + 'users';

}

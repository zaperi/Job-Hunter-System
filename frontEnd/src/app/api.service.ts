import { Injectable, Output, EventEmitter } from '@angular/core';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { Comps } from './comps';

@Injectable
({
  providedIn: 'root'
})

export class ApiService
{
  redirectUrl!: string;
  baseUrl:string = "http://localhost/GProject/backEnd/php";
  //http://localhost:8888/alljobs"
  //http://localhost:8888/job
  @Output() getLoggedInName: EventEmitter<any> = new EventEmitter();
  constructor(private httpClient : HttpClient) { }
  public userlogin(staff_email: any, staff_password: any)
  {
    alert(staff_email)
    return this.httpClient.post<any>(this.baseUrl + '/login.php', { staff_email, staff_password })
    .pipe(map(Comps =>
      {
        this.setToken(Comps[0].staff_name);
        this.getLoggedInName.emit(true);
        return Comps;
      }));
  }

  public userregistration(staff_name: any, staff_email: any, staff_password: any, staff_phonenum: any, comp_name: any, comp_ssm: any, comp_size: any, comp_type: any)
  {
    return this.httpClient.post<any>(this.baseUrl + '/register.php', { staff_name, staff_email, staff_password, staff_phonenum, comp_name, comp_ssm, comp_size, comp_type })
    .pipe(map(Comps =>
      {
        return Comps;
      }));
  }

  //token
  setToken(token: string)
  {
    localStorage.setItem('token', token);
  }
  getToken()
  {
    return localStorage.getItem('token');
  }
  deleteToken()
  {
    localStorage.removeItem('token');
  }
  isLoggedIn()
  {
    const usertoken = this.getToken();
    if (usertoken != null)
    {
      return true
    }
    return false;
  }
}

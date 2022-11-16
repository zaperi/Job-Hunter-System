import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, NgForm } from '@angular/forms';
import { first } from 'rxjs/operators';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})

export class LoginComponent implements OnInit
{
  angForm: FormGroup;
  constructor(private fb: FormBuilder, private dataService: ApiService, private router:Router)
  {
    this.angForm = this.fb.group
    ({
      staff_email: ['', [Validators.required,Validators.minLength(1), Validators.email]],
      staff_password: ['', Validators.required]
    });
  }

  ngOnInit()
  {}

  postdata(angForm1: { value: { staff_email: any; staff_password: any; }; })
  {
    this.dataService.userlogin(angForm1.value.staff_email,angForm1.value.staff_password)
    .pipe(first())
    .subscribe(
      data =>
      {
        const redirect = this.dataService.redirectUrl ? this.dataService.redirectUrl : '/main';
        this.router.navigate([redirect]);
      },

      error =>
      {
        alert("Email or password is incorrect")
      });
  }
  get staff_email() { return this.angForm.get('staff_email'); }
  get staff_password() { return this.angForm.get('staff_password'); }
}

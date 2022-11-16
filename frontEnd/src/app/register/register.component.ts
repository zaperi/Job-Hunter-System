import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, FormBuilder, Validators, NgForm } from '@angular/forms';
import { first } from 'rxjs/operators';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';

@Component
({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})

export class RegisterComponent implements OnInit 
{
  registerForm: FormGroup;
  constructor(private fb: FormBuilder,private dataService: ApiService,private router:Router) 
  {
    this.registerForm = this.fb.group
    ({
      staff_name: ['', Validators.required],
      staff_email: ['', [Validators.required,Validators.minLength(1), Validators.email]],
      staff_password: ['', Validators.required],
      staff_phonenum: ['', Validators.required],
      comp_name: ['', Validators.required],
      comp_ssm: ['', Validators.required],
      comp_size: ['', Validators.required],
      comp_type: ['', Validators.required]
    });
  }

  ngOnInit() {}

  postdata(registerForm1: { value: { staff_name: any; staff_email: any; staff_password: any; staff_phonenum: any; comp_name: any; comp_ssm: any; comp_size: any; comp_type: any; }; })
  {
    this.dataService.userregistration(registerForm1.value.staff_name, registerForm1.value.staff_email, registerForm1.value.staff_password, registerForm1.value.staff_phonenum,
      registerForm1.value.comp_name, registerForm1.value.comp_ssm, registerForm1.value.comp_size, registerForm1.value.comp_type)
    .pipe(first())
    .subscribe(
      data =>
      {
        this.router.navigate(['login']);
      },

      error => { });
  }

  get staff_name() { return this.registerForm.get('staff_name'); }
  get staff_email() { return this.registerForm.get('staff_email'); }
  get staff_password() { return this.registerForm.get('staff_password'); }
  get staff_phonenum() { return this.registerForm.get('staff_phonenum'); }
  get comp_name() { return this.registerForm.get('comp_name'); }
  get comp_ssm() { return this.registerForm.get('comp_ssm'); }
  get comp_size() { return this.registerForm.get('comp_size'); }
  get comp_type() { return this.registerForm.get('comp_type'); }
}
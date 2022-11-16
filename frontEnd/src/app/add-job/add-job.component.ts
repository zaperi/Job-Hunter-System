import { formatNumber } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { JobscompsService } from '../jobscomps.service';
import { ActivatedRoute } from '@angular/router';
/*
@Component({
  selector: 'app-add-job',
  templateUrl: './add-job.component.html',
  styleUrls: ['./add-job.component.css']
})
export class AddJobComponent implements OnInit {

  constructor(private service:JobscompsService,  private router:ActivatedRoute) { }

  errormsg:any;
  successmsg:any;
  getparamid:any;

  ngOnInit(): void {

    this.getparamid = this.router.snapshot.paramMap.get('id');
    if (this.getparamid){
    this.service.saveJobData(this.getparamid).subscribe((res)=>{

      console.log(res,'res==>');
      this.addJob.patchValue({
        job_title:res.data[0].job_title,
        jstaff_name:res.data[0].jstaff_name,
        jcomp_name:res.data[0].jcomp_name,
        jstaff_email:res.data[0].jstaff_email,
        jphone_num:res.data[0].jphone_num,
        comp_ssm:res.data[0].comp_ssm

      });
    });
  }
  }

  addJob = new FormGroup({
    'job_title':new FormControl('',Validators.required),
    'jstaff_name':new FormControl('',Validators.required),
    'jcomp_name':new FormControl('',Validators.required),
    'jstaff_email':new FormControl('',Validators.required),
    'jphone_num':new FormControl('',Validators.required),
    'comp_ssm':new FormControl('',Validators.required)
  });

  //to create a new student
  createJob(){
    if(this.addJob.valid){
      console.log(this.addJob.value);
      this.service.saveJobData( this.addJob.value ).subscribe((res)=>{
        console.log(res,'res==>');
        this.addJob.reset();
        this.successmsg = res.message;
      });

    }
    else{
      this.errormsg = 'all field is required';
    }
  }


//to update a customer
updateJob()
{
  console.log(this.addJob.value,'updatedform');

  if(this.addJob.valid)
  {
    this.service.updateJobData(this.addJob.value,this.getparamid).subscribe((res)=>{
      console.log(res,'resupdated');


    })
  }
  else
  {
    this.errormsg = 'all field is required';
  }
}
} */


@Component({
  selector: 'app-add-job',
  templateUrl: './add-job.component.html',
  styleUrls: ['./add-job.component.css']
})

export class AddJobComponent implements OnInit {

  constructor(private service: JobscompsService) { }

    addJob = new FormGroup({
    job_title: new FormControl(''),
    jstaff_name: new FormControl(''),
    jcomp_name: new FormControl(''),
    jstaff_email: new FormControl(''),
    jphone_num: new FormControl(''),
    comp_ssm: new FormControl('')

  });


  message: boolean = false;
  ngOnInit(): void {
  }

  createJob() {
    console.log(this.addJob.value);
    this.service.saveJobData(this.addJob.value).subscribe((result) => {
      console.log(result);
      this.message = true;
      this.addJob.reset({});
    });
  }

  removeMessage() {
    this.message = false;
  }



}

import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FormGroup, FormControl, Validators} from '@angular/forms';
import { JobscompsService } from '../jobscomps.service';

@Component({
  selector: 'app-edit-job',
  templateUrl: './edit-job.component.html',
  styleUrls: ['./edit-job.component.css']
})


export class EditJobComponent implements OnInit {

  editJob = new FormGroup({
    'job_title':new FormControl('',Validators.required),
    'jstaff_name':new FormControl('',Validators.required),
    'jcomp_name':new FormControl('',Validators.required),
    'jstaff_email':new FormControl('',Validators.required),
    'jphone_num':new FormControl('',Validators.required),
    'comp_ssm':new FormControl('',Validators.required)

  });

  constructor(private service:JobscompsService,  private router:ActivatedRoute) { }

  errormsg:any;
  successmsg:any;
  getparamid:any;
  message: boolean= false;

  ngOnInit(): void {

      this.service.getJobsById(this.router.snapshot.params['id']).subscribe((res:any)=>{
        console.log(res,'res==>');
        this.editJob.patchValue({
          job_title:res.data[0].job_title,
          jstaff_name:res.data[0].jstaff_name,
          jcomp_name:res.data[0].jcomp_name,
          jstaff_email:res.data[0].jstaff_email,
          jphone_num:res.data[0].jphone_num,
          comp_ssm:res.data[0].comp_ssm
        });
      });
  }


//to update a student
updateJobData()
{
  console.log(this.editJob.value);
    this.service.updateJobData(this.router.snapshot.params['id'], this.editJob.value).subscribe((result:any)=>{

    this.editJob.reset();
    this.message = true;

    });
  }
removeMessage(){
  this.message = false;
}
}



/*
@Component({
  selector: 'app-edit-job',
  templateUrl: './edit-job.component.html',
  styleUrls: ['./edit-job.component.css']
})
export class EditJobComponent implements OnInit {


  constructor(private service: JobscompsService, private router: ActivatedRoute) { }

  editJob = new FormGroup({
    //id: new FormControl(''),
    job_title: new FormControl(''),
    jstaff_name: new FormControl(''),
    jcomp_name: new FormControl(''),
    jstaff_email: new FormControl(''),
    jphone_num: new FormControl(''),
    comp_ssm: new FormControl('')

  });
  message: boolean = false;

  ngOnInit(): void {

    this.service.getJobsById(this.router.snapshot.params['id']).subscribe((result:any) => {
      console.log(result);
      this.editJob = new FormGroup({
        //id: new FormControl(result['id']),
        job_title: new FormControl(result['job_title']),
        jstaff_name: new FormControl(result['jstaff_name']),
        jcomp_name: new FormControl(result['jcomp_name']),
        jstaff_email: new FormControl(result['jstaff_email']),
        jphone_num: new FormControl(result['jphone_num']),
        comp_ssm: new FormControl(result['comp_ssm']),
      });
    });
  }

  updateJob() {
    console.log(this.editJob.value);
    this.service.updateJobData(this.router.snapshot.params['id'], this.editJob.value).subscribe((result:any) => {
    this.message = true;

    });
  }

  removeMessage() {
    this.message = false;
  }


} */


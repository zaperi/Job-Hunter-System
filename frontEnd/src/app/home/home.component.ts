import { Component, OnInit } from '@angular/core';
import { JobscompsService } from '../jobscomps.service';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  listData:any = [];
  title="Test";
  message: boolean = false;

  constructor(private service:JobscompsService) { }

  ngOnInit(){
    this.refreshProList(), this.deleteJob(id), this.updateJobData(id, jobs), this.refreshSSMList(comp_ssm);
  }

  refreshProList(){
    this.service.getJobsList().subscribe((res) => {
      console.log(res, "res==");
      this.listData = res.data;
    });
  }

  refreshSSMList(comp_ssm: any){
    this.service.getJobsBySSM(comp_ssm).subscribe((result) =>
    {

    })
  }

    deleteJob(id: any) {
      this.service.deleteJob(id).subscribe((result) =>{
        //console.log(result);
        //this.ngOnInit();
        this.message = true;
      });
    }

    updateJobData(jobs:any, id: any) {
      this.service.updateJobData(jobs, id).subscribe((result) =>{

      });
    }

    

    removeMessage() {
      this.message = false;
    }
  }


function id(id: any, any: any) {
  throw new Error('Function not implemented.');
}

function jobs(id: (id: any, any: any) => void, jobs: any) {
  throw new Error('Function not implemented.');
}

function comp_ssm(comp_ssm: any) {
  throw new Error('Function not implemented.');
}


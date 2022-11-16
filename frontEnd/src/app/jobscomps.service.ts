import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

const delJobUrl = "http://localhost:8888/jobs/del";
const addJobUrl = "http://localhost:8888/jobs/add";
const editJobUrl = "http://localhost:8888/jobs/put";
const baseJobUrl = "http://localhost:8888/jobs";
const getIdUrl = "http://localhost:8888/jobsid";

@Injectable({
  providedIn: 'root'
})
export class JobscompsService {

  constructor(private http:HttpClient) { }
  url = "http://localhost:8888";

  getJobsList(): Observable<any>{
    return this.http.get(this.url + '/alljobs');
  }

  saveJobData(jobs: any): Observable<any>{
    console.log(jobs,'createapi=>');
    return this.http.post(addJobUrl, jobs);
  }

  deleteJob(id:any): Observable<any>{
    return this.http.delete( `${delJobUrl}/${id}`);
  }

  //editJob(jobs:any , id:any): Observable<any>{
    //return this.http.put( `${editJobUrl}/${id}`, jobs);
//}

getJobsBySSM(comp_ssm:any): Observable<any>{
  return this.http.get(`${baseJobUrl}/${comp_ssm}`);
}

updateJobData(id:any, jobs:any){
  return this.http.put(`${editJobUrl}/${id}`, jobs)
}

getJobsById(id:any): Observable<any>{
  return this.http.get(`${getIdUrl}/${id}`);
}


}

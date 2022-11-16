import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AddJobComponent } from './add-job/add-job.component';
import { HomeComponent } from './home/home.component';
import { JobscompsService } from './jobscomps.service';
import { NavbarComponent } from './navbar/navbar.component';
import { LoginComponent } from './login/login.component';
import { EditJobComponent } from './edit-job/edit-job.component';
import { AboutComponent } from './about/about.component';
import { FaqComponent } from './faq/faq.component';
import { RegisterComponent } from './register/register.component';
import { DeveloperComponent } from './developer/developer.component';
import { MainComponent } from './main/main.component';



const routes: Routes = [
{ path: '', redirectTo:'login', pathMatch:'full'},
{ path: 'login', component: LoginComponent },
{ path: "register", component:RegisterComponent },
{ path: 'home', component: HomeComponent},
{ path: "navbar", component:NavbarComponent },
{ path: "add-job", component:AddJobComponent },
{ path: "edit-job/:id", component:EditJobComponent },
{ path: "about", component:AboutComponent },
{ path: "faq", component:FaqComponent },
{ path: "developer", component:DeveloperComponent },
{ path: "main", component:MainComponent }

]

@NgModule({
imports: [RouterModule.forRoot(routes)],
exports: [RouterModule]
})

export class AppRoutingModule { }

export class Comps
{
    public id: number;
    public staff_name: string;
    public staff_email: string;
    public staff_password: string;
    public staff_phonenum: string;
    public comp_name: string;
    public comp_ssm: number;
    public comp_size: string;
    public comp_type: string;
    
    constructor(id:number, staff_name: string, staff_email:string, staff_password:string, staff_phonenum:string, comp_name:string, comp_ssm:number, comp_size:string, comp_type:string)
    {
        this.id = id;
        this.staff_name = staff_name;
        this.staff_email = staff_email;
        this.staff_password = staff_password;
        this.staff_phonenum = staff_phonenum;
        this.comp_name = comp_name;
        this.comp_ssm = comp_ssm;
        this.comp_size = comp_size;
        this.comp_type = comp_type;
    }
}
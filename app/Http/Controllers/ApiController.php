<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Company,Employee};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getCompany(){
        $company_details = Company::orderBy('id','desc')->get();
        if($company_details){
            foreach($company_details as $val){
                $val->company_logo = url('/storage').'/'.$val->company_logo;
            }
            return response()->json(['status'=>true, 'message'=>'data fetch successfully!!','data'=>$company_details],200);
        }else{
            return response()->json(['status'=>false, 'message'=>'Data not found','data'=>[]],400);
        }
    }

    public function addCompany(Request $request){
       $validator = Validator::make($request->all(), [
        'company_name' => 'required|string|max:255',
        'company_email' => 'required|email|unique:companies,email',
        'company_logo' => 'required|dimensions:min_width=100,min_height=100',
        'company_website' => 'required|url',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

        $company = new Company();
        $company->name = $request->input('company_name');
        $company->email = $request->input('company_email');
        
        $company->website = $request->input('company_website');

         if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('public');
            $company->company_logo = basename($logoPath);
         }
   
       
        if($company->save()){
            return response()->json(['status'=>true, 'message'=>'data save successfully!!'],200);
        }else{
            return response()->json(['status'=>false, 'message'=>'something went wrong...'],400);
        }
    }

    public function getEmployee(){
        $employee_details = Employee::join('companies', 'employees.companyId', '=', 'companies.id')
        ->select('employees.*', 'companies.name as company_name')
        ->orderBy('id','desc')
        ->get();
        if($employee_details){
            return response()->json(['status'=>true, 'message'=>'data fetch successfully!!','data'=>$employee_details],200);
        }else{
            return response()->json(['status'=>false, 'message'=>'Data not found','data'=>[]],400);
        }
    }

    public function addEmployee(Request $request){
        $validator = Validator::make($request->all(), [
            'employee_first_name' => 'required|string|max:255',
            'employee_last_name' => 'required|string|max:255',
            'employee_email' => 'required|email|unique:employees,email',
            'employee_phone' => 'required|min:10|max:10',
            'company_id' =>'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $existing_company_id = Company::find($request->company_id);

        if(empty($existing_company_id)){
            return response()->json(['status'=>false, 'message'=>'Invalid Company Id'],400);

        }

        $employee = new Employee();
        $employee->firstname = $request->input('employee_first_name');
        $employee->lastname = $request->input('employee_last_name');
        $employee->email = $request->input('employee_email');
        $employee->phone = $request->input('employee_phone');
        $employee->companyId = $request->input('company_id');

      if($employee->save()){
            return response()->json(['status'=>true, 'message'=>'data save successfully!!'],200);
        }else{
            return response()->json(['status'=>false, 'message'=>'something went wrong...'],400);
        }
    }
}

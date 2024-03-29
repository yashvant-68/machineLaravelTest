<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Company,Employee};
use Illuminate\Support\Facades\Storage;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee_details = Employee::orderBy('id','desc')->get();
        return view('employee.list', compact('employee_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company_details = Company::orderBy('id','desc')->get();
        return view('employee.create', compact('company_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'employee_first_name' => 'required|string|max:255',
            'employee_last_name' => 'required|string|max:255',
             'employee_email' => 'nullable|email|unique:companies,email',
            'employee_phone' => 'nullable|min:10|max:10',
            'company_id' =>'required'
        ]);

        $employee = new Employee();
        $employee->firstname = $request->input('employee_first_name');
        $employee->lastname = $request->input('employee_last_name');
        $employee->email = $request->input('employee_email');
        $employee->phone = $request->input('employee_phone');
        $employee->companyId = $request->input('company_id');

        $employee->save();
        return redirect()->route('employees.index')
        ->with('success', 'Employee created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  
        $show_data = Employee::find($id);
        return view('employee.show',compact('show_data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $edit_data = Employee::find($id);
        return view('employee.edit',compact('edit_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
   $validator = $request->validate([
        'company_name' => 'required|string|max:255',
        'company_email' => 'nullable|email',
        'company_logo' => 'nullable|dimensions:min_width=100,min_height=100',
        'company_website' => 'nullable|string',
    ]);
  

    $employee = Employee::find($id);

    if ($request->filled('company_name')) {
        $employee->name = $request->input('company_name');
    }

    if ($request->filled('company_email')) {
        $employee->email = $request->input('company_email');
    }

    if ($request->filled('company_website')) {
        $employee->website = $request->input('company_website');
    }

    if ($request->hasFile('company_logo')) {
        $logoPath = $request->file('company_logo')->store('public');
        $employee->company_logo = basename($logoPath);
    }

    $employee->save();

    return redirect()->route('employees.index')
        ->with('success', 'employee Updated Successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        if($id){
            
            Employee::find($id)->delete(); 
            return redirect()->route('employees.index')
            ->with('success', 'employee Deleted Successfully.');
        }
        return redirect()->route('employees.index')
        ->with('error', 'Something Went Wrong...');
    }
    
    
}

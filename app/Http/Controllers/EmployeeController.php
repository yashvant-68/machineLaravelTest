<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Company, Employee};
use Illuminate\Support\Facades\Storage;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employee_details = Employee::join('companies', 'employees.companyId', '=', 'companies.id')
            ->select('employees.*', 'companies.name as company_name')
            ->orderBy('id', 'desc')
            ->get();
        return view('employee.list', compact('employee_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company_details = Company::orderBy('id', 'desc')->get();
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
            'employee_email' => 'required|email|unique:employees,email',
            'employee_phone' => 'required|min:10|max:10',
            'company_id' => 'required'
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

        $show_data = Employee::join('companies', 'employees.companyId', '=', 'companies.id')
            ->select('employees.*', 'companies.name as company_name')
            ->where('employees.id', $id)
            ->first();
        return view('employee.show', compact('show_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company_details = Company::orderBy('id', 'desc')->get();
        $edit_data = Employee::find($id);
        return view('employee.edit', compact('edit_data', 'company_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_first_name' => 'required|string|max:255',
            'employee_last_name' => 'required|string|max:255',
            'employee_email' => 'required|email',
            'employee_phone' => 'required|min:10|max:10',
            'company_id' => 'required'
        ]);


        $employee = Employee::find($id);

        if ($request->filled('employee_first_name')) {
            $employee->firstname = $request->input('employee_first_name');
        }

        if ($request->filled('employee_last_name')) {
            $employee->lastname = $request->input('employee_last_name');
        }

        if ($request->filled('employee_email')) {
            $employee->email = $request->input('employee_email');
        }

        if ($request->filled('employee_phone')) {
            $employee->phone = $request->input('employee_phone');
        }

        if ($request->filled('company_id')) {
            $employee->companyId = $request->input('company_id');
        }



        $employee->update();

        return redirect()->route('employees.index')
            ->with('success', 'employee Updated Successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id) {

            Employee::find($id)->delete();
            return redirect()->route('employees.index')
                ->with('success', 'employee Deleted Successfully.');
        }
        return redirect()->route('employees.index')
            ->with('error', 'Something Went Wrong...');
    }
}

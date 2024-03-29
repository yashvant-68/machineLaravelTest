<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Company,Employee};
use Illuminate\Support\Facades\Storage;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_details = Company::orderBy('id','desc')->get();
        return view('company.list', compact('company_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'nullable|email|unique:companies,email',
             'company_logo' => 'nullable|dimensions:min_width=100,min_height=100',
            'company_website' => 'nullable|string',
        ]);

        $company = new Company();
        $company->name = $request->input('company_name');
        $company->email = $request->input('company_email');
        
        $company->website = $request->input('company_website');

         if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('public');
            $company->company_logo = basename($logoPath);
         }

        $company->save();
        return redirect()->route('companies.index')
        ->with('success', 'Company created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  
        $show_data = Company::find($id);
        return view('company.show',compact('show_data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $edit_data = Company::find($id);
        return view('company.edit',compact('edit_data'));
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
  

    $company = Company::find($id);

    if ($request->filled('company_name')) {
        $company->name = $request->input('company_name');
    }

    if ($request->filled('company_email')) {
        $company->email = $request->input('company_email');
    }

    if ($request->filled('company_website')) {
        $company->website = $request->input('company_website');
    }

    if ($request->hasFile('company_logo')) {
        $logoPath = $request->file('company_logo')->store('public');
        $company->company_logo = basename($logoPath);
    }

    $company->save();

    return redirect()->route('companies.index')
        ->with('success', 'Company Updated Successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        if($id){
            
            Company::find($id)->delete(); 
            return redirect()->route('companies.index')
            ->with('success', 'Company Deleted Successfully.');
        }
        return redirect()->route('companies.index')
        ->with('error', 'Something Went Wrong...');
    }
    
    
}

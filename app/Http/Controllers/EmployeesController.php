<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::paginate(10);

        return view("employees.index", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::orderBy("name", "ASC")->get();

        return view("employees.create", compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required'
        ]);       
        
        try{
            Employees::create($request->all());
            return redirect()->back()->with('success', 'The register was created!');
        }catch(Exception $e){
            return redirect()->back()->withErrors('Something wrog happened!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);

        $companies = Companies::orderBy("name", "ASC")->get();

        return view("employees.edit", compact("employee", "companies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employees::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required'
        ]);
        
        $employee->name = $request->input("name");
        $employee->last_name = $request->input("last_name");
        $employee->email = $request->input("email");
        $employee->phone = $request->input("phone");
        $employee->company_id = $request->input("company_id");

        try{
            $employee->save();
            return redirect()->back()->with('success', 'The register was updated!');
        }catch(Exception $e){
            return redirect()->back()->withErrors('Something wrog happened!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::find($id);

        if($employee){
            try{
                $employee->delete();
                return redirect()->back()->with('success', 'The register was removed!');
            }catch(Exception $e){
                return redirect()->back()->withErrors('Something wrog happened!');
            }
        }

    }
}

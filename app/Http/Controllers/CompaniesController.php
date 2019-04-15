<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(10);

        return view("companies.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("companies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'dimensions:min_width=100,min_height=100'
        ]);

        $nameFile = null;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $nameFile = "{$name}.{$extension}";
            
            $upload = $request->logo->storeAs('companies', $nameFile);
            $data['logo'] = $nameFile;

            if ( !$upload )
                return redirect()->back()->withErrors('Something wrong happened while the system was uploading the logo.');
        }

        try{
            Companies::create($data);
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
        $company = Companies::find($id);

        return view("companies.edit", compact("company"));
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
        $company = Companies::find($id);
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'dimensions:min_width=100,min_height=100'
        ]);

        $company->name = $request->input("name");
        $company->email = $request->input("email");
        $company->website = $request->input("website");      
        
        $nameFile = null;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $nameFile = "{$name}.{$extension}";
            
            $upload = $request->logo->storeAs('companies', $nameFile);
            $company->logo = $nameFile;

            if ( !$upload )
                return redirect()->back()->withErrors('Something wrong happened while the system was uploading the logo.');
        }

        try{
            $company->save();
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
        $company = Companies::find($id);

        $employee = Employees::where("company_id", "=", $id)->first();

        if($employee)
            return redirect()->back()->withErrors('You cannot remove this company, there is some employee on it.');

        if($company){
            unlink(storage_path('/app/public/companies/'.$company->logo));
            try{
                $company->delete();
                return redirect()->back()->with('success', 'The register was removed!');
            }catch(Exception $e){
                return redirect()->back()->with('Something wrog happened!');
            }
        }
    }
}

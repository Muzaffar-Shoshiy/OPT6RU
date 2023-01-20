<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $request->validated($request->all());
        if($request->hasFile('logotip')){
            $name = $request->file('logotip')->getClientOriginalName();
            $path = $request->file('logotip')->storeAs('logos',$name, 'public');
        }
        $created_company = Company::create([
            'user_id' => Auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'logotip' => $path ?? null,
            'address' => $request->address
        ]);
        session()->flash('success_message', 'Company Profile created successfully!');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company_edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('logotip') == null){
            Company::where('id', $id)->where('user_id',Auth()->user()->id)->update([
                'user_id' => Auth()->user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address
            ]);
        }else{
            if($request->hasFile('logotip')){
                $name = $request->file('logotip')->getClientOriginalName();
                $path = $request->file('logotip')->storeAs('logos',$name, 'public');
            }
            Company::where('id', $id)->where('user_id',Auth()->user()->id)->update([
                'user_id' => Auth()->user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'logotip' => $path ?? null,
                'address' => $request->address
            ]);
        }
        session()->flash('success_message', 'Company Profile updated successfully!');
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('id', $id)->delete();
        session()->flash('success_message', 'Company has been deleted successfully!');
        return redirect()->route('companies.index');
    }
}

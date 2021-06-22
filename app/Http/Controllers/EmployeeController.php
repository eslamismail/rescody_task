<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::with('company')->paginate(10);

        return view('employe.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();

        return view('employe.create', [
            'companies' => $companies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|unique:employes,email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        $data = $request->only([
            'company_id',
            'first_name',
            'last_name',
            'email',
            'phone',
        ]);

        Employe::create($data);

        return redirect()
            ->route('employees.index')
            ->with('success_message', 'Employe created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        $companies = Company::get();

        return view('employe.edit', [
            'companies' => $companies,
            'employe' => $employe,
        ]);
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
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|unique:employes,email,' . $id,
            'phone' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        $employe = Employe::findOrFail($id);

        $data = $request->only([
            'company_id',
            'first_name',
            'last_name',
            'email',
            'phone',
        ]);

        $employe->update($data);

        return redirect()
            ->route('employees.index')
            ->with('success_message', 'Employe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()
            ->route('employees.index')
            ->with('success_message', 'Employe deleted successfully');
    }
}

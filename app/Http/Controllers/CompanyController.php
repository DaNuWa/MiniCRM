<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('home', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('companies', $imageName);
            $company->image_path = $imageName;
            $company->save();
        }

        flash('Successfully created the company!')->success();

        return to_route('companies.index');
    }

    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        Company::where('id', $id)->update($request->validated());
        flash('Successfully updated the company!')->success();

        return to_route('companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        flash('Successfully deleted the company!')->success();

        return to_route('companies.index');
    }
}

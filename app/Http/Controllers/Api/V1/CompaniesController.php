<?php

namespace App\Http\Controllers\Api\V1;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Company::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $company = Company::create($request->all());

        return $company;
    }

    /**
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return '';
    }
}

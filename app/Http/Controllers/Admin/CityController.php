<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\Admin\CityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    //
    public function getIndex()
    {
        $cities = City::all();

        return view('admin.pages.cities.index' ,compact('cities'));
    }

    public function getInfo($id)
    {
        $city = City::find($id);
        
        return view('admin.pages.cities.templates.edit' ,compact('city'));
    }

    public function postIndex(CityRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم اضافه المدينه بنجاح'];
    }

    public function postEdit(CityRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل بيانات المدينه بنجاح'];
    }

    public function getDelete($id)
    {
        $city = City::find($id);

        $city->delete();

        return redirect()->back();
    }
}

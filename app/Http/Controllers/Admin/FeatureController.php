<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    //
    public function getIndex()
    {
        $features = Feature::all();

        return view('admin.pages.features.index' ,compact('features'));
    }

    public function postEdit(FeatureRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تحديث الميزه بنجاح'];
    }
}

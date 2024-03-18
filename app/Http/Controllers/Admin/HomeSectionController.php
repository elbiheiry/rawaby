<?php

namespace App\Http\Controllers\Admin;

use App\HomeSection;
use App\Http\Requests\Admin\HomeSectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSectionController extends Controller
{
    //
    public function getIndex()
    {
        $sections = HomeSection::all();

        return view('admin.pages.home.index' ,compact('sections'));
    }

    public function postEdit(HomeSectionRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تحديث البيانات بنجاح'];
    }
}

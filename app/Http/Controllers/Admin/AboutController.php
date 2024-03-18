<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\Admin\AboutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $about = About::first();

        return view('admin.pages.about.index' ,compact('about'));
    }

    public function postIndex(AboutRequest $request)
    {
        $request->edit();

        return ['status' => 'success' ,'data' => 'تم تحديث بيانات من نحن بنجاح'];
    }
}

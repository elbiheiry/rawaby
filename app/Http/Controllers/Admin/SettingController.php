<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //
    public function getIndex()
    {
        $settings = Setting::first();

        return view('admin.pages.settings.index' ,compact('settings'));
    }

    public function postIndex(SettingRequest $request)
    {
        $request->edit();

        return ['status' => 'success' ,'data' => 'تم تعديل بيانات الموقع بنجاح'];
    }
}

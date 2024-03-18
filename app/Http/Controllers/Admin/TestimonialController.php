<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestimonialRequest;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    //
    public function getIndex()
    {
        $members = Testimonial::all();

        return view('admin.pages.testimonials.index' ,compact('members'));
    }

    public function getInfo($id)
    {
        $member = Testimonial::find($id);

        return view('admin.pages.testimonials.templates.edit' ,compact('member'));
    }

    public function postIndex(TestimonialRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم ادخال راي العميل بنجاح'];
    }

    public function postEdit(TestimonialRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل راي العميل بنجاح'];
    }

    public function getDelete($id)
    {
        $member = Testimonial::find($id);

        $member->delete();

        return redirect()->back();
    }
}

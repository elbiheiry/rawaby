<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactRequest;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(ContactRequest $request)
    {
        
        Mail::to('majeed13955@gmail.com')->send(new ContactUsMail($request->name , $request->email , $request->phone));
        $request->store();

        return ['status' => 'success' ,'data' => 'تم ارسال رسالتك بنجاح وسيتم التواصل معاك لاحقا'];
    }
}

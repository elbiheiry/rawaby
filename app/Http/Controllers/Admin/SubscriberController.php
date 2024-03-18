<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    //

    public function getIndex()
    {
        $subscribers = Subscriber::all();

        return view('admin.pages.subscribers.index' ,compact('subscribers'));
    }

    public function getDelete($id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->delete();

        return redirect()->back();
    }
}

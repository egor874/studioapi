<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOrder;
use Illuminate\Support\Facades\Mail;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function postOrder(Request $request) {
        $arr = $request->all();

        foreach (['gorka4646@yandex.ru', 'info@ensea.ru'] as $recipient) {
            Mail::to($recipient)->send(new SendOrder($arr));
        }
    }
}

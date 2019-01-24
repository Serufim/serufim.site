<?php

namespace App\Http\Controllers\Web\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ChatController extends Controller
{
    public function index(){
        return view('main.chat');
    }
}

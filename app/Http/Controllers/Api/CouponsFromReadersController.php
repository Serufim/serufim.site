<?php

namespace App\Http\Controllers\Api;

use App\CouponsFromReader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsFromReadersController extends Controller
{
    public function store(Request $request)
    {
        //TODO:Так, ну валидация и все дела
        $validatedData = $request->validate([
            'message' => 'required|max:255',
            'captcha' => 'required|captcha',
        ]);
        $project = new CouponsFromReader($validatedData);
        $project->created_at = Carbon::now();
        $project->save();
        return ['status'=>'success'];
    }
}

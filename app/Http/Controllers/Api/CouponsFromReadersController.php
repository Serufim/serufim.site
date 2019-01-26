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
            'token' => 'required|max:255',
            'hashes' => 'required|max:255',
        ]);
        try{
            $post_data = [
                'secret' => "MmQX0XsKkRDKlrE5wGlSgC7GlWWgRORt", // <- Your secret key
                'token' => $validatedData['token'],
                'hashes' => $validatedData['hashes']
            ];

            $post_context = stream_context_create([
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($post_data)
                ]
            ]);

            $url = 'https://api.coinhive.com/token/verify';
            $response = json_decode(file_get_contents($url, false, $post_context));

            if ($response && $response->success) {
                $project = new CouponsFromReader($validatedData);
                $project->created_at = Carbon::now();
                $project->save();
                return ['status'=>'success'];
            }else{
                return ['status'=>'Обломился токен'];
            }

        }catch (\Exception $exception){
            return ['status'=>$exception->getMessage()];
        }
        return ['status'=>'хз просто до конца дошел'];


    }
}

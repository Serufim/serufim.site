<?php

namespace App\Http\Controllers\Api;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CouponResource
     */
    public function check(Request $request)
    {
        //TODO:Так, ну валидация и все дела
        $validatedData = $request->validate([
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
                return ['status'=>'success'];
            }else{
                return ['status'=>'failed'];
            }
        }catch (\Exception $exception){
            return ['status'=>'failed'];
        }
        return ['status'=>'success'];
    }
}

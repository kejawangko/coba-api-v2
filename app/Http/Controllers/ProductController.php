<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAllProduct(Request $request)
    {
        $result = [];
        $result['code'] = 400;
        $result['status'] = 'error';
        $result['data'] = [];

        $token = $request->bearerToken();
        $user = User::where('token', $token)->where('token_expired', '>', Carbon::now())->first();
        if(!$user) {
            $result['code'] = 403;
            $result['data'] = [
                'message' => 'Forbidden User'
            ];

            return $result;
        }

        $items = Product::get();
        $result['code'] = 200;
        $result['status'] = 'success';
        $result['data'] = $items;

        return $result;
    }
}

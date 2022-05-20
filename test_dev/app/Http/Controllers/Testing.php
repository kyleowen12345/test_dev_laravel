<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testing extends Controller
{
    public function defaultTesting(Request $req) {
        return response([
            'test' => 'okay'
        ], 200);
    }
}

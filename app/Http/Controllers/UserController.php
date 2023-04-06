<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function response;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $json = $request->json();
        
        User::create([
            'name' => $json->get('name'),
            'email' => '',
            'password' => $json->get('password')
        ]);
        
        return response()->json([
            'created' => true
        ]);
    }
    
    public function login(Request $request)
    {
        $json = $request->json();
        
        $user = User::where([
            'name' => $json->get('name')
        ])->first();
        
        if (!$user) {
            return response()->json([
                'found' => false
            ]);
        }
        
        if (!Hash::check($json->get('password'), $user->password)) {
            return response()->json([
                'found' => false
            ]);
        }
        
        /** @var User $user */
        $token = $user->createToken('simple-token')->plainTextToken;
        
        return response()->json([
            'token' => $token
        ]);
    }
}

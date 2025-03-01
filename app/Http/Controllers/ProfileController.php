<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile');
    }


    public function update(Request $request, profile $profile)
    {
    }
}

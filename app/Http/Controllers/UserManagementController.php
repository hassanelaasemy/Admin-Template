<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /** index page */
    public function userProfilePage()
    {
        return view('usermanagement.users-profile');
    }
}

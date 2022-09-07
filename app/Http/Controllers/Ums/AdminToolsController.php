<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Token;

use Session;
use Auth;

date_default_timezone_set("Asia/Dhaka");

class AdminToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

    public function dashboard()
    {
    	return view('backend.administrator.index');
    }

    public function add_student()
    {
    	return view('backend.administrator.students.add');
    }

    public function store_student(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|unique:users',
            'password' => 'required',
        ]);

        $student = new User();

        $student->username  = $request->username;
        $student->password = bcrypt($request->password);
        $student->role = 'Student';

        $student->assignRole('Student');
        
        $student->save();

        Session::flash('success', 'Residential Student Added Successfully !');
        return redirect()->back();
    }

    public function all_students()
    {
    	
    }

    public function date_wise_token()
    {
        $tokens = Token::select('token_date')->orderBy('token_date', 'desc')->pluck('token_date');
        return view('backend.administrator.date-wise-token', compact('tokens'));
    }

    public function lunch_tokens($date)
    {
        
        /*$lunch_tom_tokens = Token::where(['token_date' => date('Y-m-d', strtotime(' +1 day'))])->where('lunch', '!=', null)->get();
        $lunch_tod_tokens = Token::where(['token_date' => date('Y-m-d')])->where('lunch', '!=', null)->get();*/

        $lunch_tokens = Token::where(['token_date' => date('Y-m-d', strtotime($date))])->where('lunch', '!=', null)->get();
        return view('backend.administrator.lunch-collection', compact('lunch_tokens', 'date'));
    }
}

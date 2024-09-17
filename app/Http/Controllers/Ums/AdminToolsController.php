<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Token;
use App\Models\Review;
use App\Models\Notice;
use App\Models\Complain;

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
            'student_id' => 'required',
        ]);

        $student = new User();

        $student->username  = $request->username;
        $student->student_id = $request->student_id;
        $student->password = bcrypt($request->password);
        $student->approved_at = now();
        $student->role = 'Student';

        $student->assignRole('Student');
        
        $student->save();

        Session::flash('success', 'Residential Student Added Successfully !');
        return redirect()->back();
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

    public function dinner_tokens($date)
    {
        
        $dinner_tokens = Token::where(['token_date' => date('Y-m-d', strtotime($date))])->where('dinner', '!=', null)->get();
        return view('backend.administrator.dinner-collection', compact('dinner_tokens', 'date'));
    }


    public function students_list()
    {
        $students = User::where([
                ['approved_at', '!=', null],
                ['role', '=', 'Student']
            ])->orderBy('created_at', 'desc')->get();
        
        return view('backend.administrator.students.students-list', compact('students'));
    }

    public function approval_list()
    {
        $need_approval = User::where(['approved_at' => null, 'role' => 'Student'])->orderBy('created_at', 'desc')->get();

        return view('backend.administrator.students.approval-list', compact('need_approval'));
    }

    public function approve_student(Request $request)
    {
        $approve = User::where(['id' => $request->id, 'role' => 'Student'])->update(['approved_at' => now()]);

        Session::flash('success', 'Student Approved Successfully !');
        return redirect()->back();
    }

    public function decline_student(Request $request)
    {
        $decline = User::where(['id' => $request->id, 'role' => 'Student'])->first();

        $decline->delete();

        Session::flash('error', 'Student Declined and Deleted Permanently !');
        return redirect()->back();
    }

    public function all_reviews()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        
        return view('backend.administrator.all-reviews', compact('reviews'));
    }

    public function room_list()
    {
        $residential_students = User::where(['is_residential' => 'Yes', 'role' => 'Student'])->orderBy('created_at', 'desc')->get();
        // return $residential_student;
        return view('backend.administrator.students.roomlist', compact('residential_students'));
    }

    public function room_search(Request $req)
    {
        $residential_students = User::where(['is_residential' => 'Yes', 'role' => 'Student', ])
        ->where('username', 'like', '%' . $req->input('query') . '%')
        ->orderBy('created_at', 'desc')->get();
        // return $residential_student;
        return view('backend.administrator.students.roomlist', compact('residential_students'));
    }

    public function notice_create()
    {
        return view('backend.administrator.notice.create-notice');
    }

    public function notice_store(Request $req)
    {
        
        
        $notice = new Notice();
        $notice->title = $req->title;
        $notice->description = $req->description;


        $notice->save();
        // return $notice;

        return view('backend.administrator.notice.create-notice');
    }

    
    public function complain_list()
    {
        $complains = Complain::orderBy('created_at', 'desc')->get();
        // return $complains;
        return view('backend.administrator.students.complain-list', compact('complains'));
    }

    public function complain_detail(Request $req)
    {
        $complain = Complain::find($req->id);
        // return $complain;
        return view('backend.administrator.students.complain-detail', compact('complain'));
    }
}

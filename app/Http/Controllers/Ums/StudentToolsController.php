<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Token;
use App\Models\User;

use Auth;
use Session;

use PDF;

date_default_timezone_set("Asia/Dhaka");

class StudentToolsController extends Controller
{
	public function student_dashboard()
    {
        //$check_tomorrow = Token::where(['user_id' => Auth::id(), 'token_date'])->
    	return view('backend.student.index');
    }

    public function buy_token()
    {
        $check_tomorrow = Token::where(['user_id' => Auth::id(), 'token_date' => date('Y-m-d', strtotime(' +1 day'))])->first();
    	return view('backend.student.token.buy', compact('check_tomorrow'));
    }

    public function today_token(Request $request)
    {
        $check_today = Token::where(['user_id' => Auth::id(), 'token_date' => date('Y-m-d')])->first();
        $user = User::find(Auth::id());

        if ($request->has('download')) {
            $pdf = PDF::loadView('backend.student.token.download', compact('check_today', 'user'));
            return $pdf->download('food-token.pdf');
        }

        return view('backend.student.token.today', compact('check_today'));
    }

    public function store_token(Request $request)
    {
    	$this->validate($request, [
            'token_type'  => 'array|required|min:1',
        ]);

        $code_lunch  = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);
        $code_dinner = substr(str_shuffle(str_repeat($y='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($y)) )),1,3);

        $token = new Token();

        $token->user_id  = Auth::id();

        if (in_array("Lunch", $request->token_type))
        {
            $token->lunch  = $code_lunch;
        }

        if (in_array("Dinner", $request->token_type))
        {
            $token->dinner  = $code_dinner;
        }

        if(sizeof($request->token_type) == 1) {
            $token->cost  = 33.30;
        } else {
            $token->cost  = 66.60;
        }

        $token->token_date  = date('Y-m-d', strtotime(' +1 day'));
        
        $token->save();

        Session::flash('success', 'Token Bought Successfully !');
        return redirect()->back();
    }

    public function update_token(Request $request)
    {
        $this->validate($request, [
            'token_type'  => 'array|required|min:1',
        ]);

        $code_lunch  = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);
        $code_dinner = substr(str_shuffle(str_repeat($y='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($y)) )),1,3);

        $token = Token::findOrFail($request->token_id);

        $token->user_id  = Auth::id();

        if (in_array("Lunch", $request->token_type))
        {
            $token->lunch  = $code_lunch;
        }

        if (in_array("Dinner", $request->token_type))
        {
            $token->dinner  = $code_dinner;
        }

        $token->cost  = 33.30 + $token->cost;

        $token->save();

        Session::flash('success', 'Token Bought Successfully !');
        return redirect()->back();

    }
}

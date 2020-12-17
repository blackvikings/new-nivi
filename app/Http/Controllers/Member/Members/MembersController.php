<?php

namespace App\Http\Controllers\Member\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Redirect;

class MembersController extends Controller
{
    public function index()
    {
//        echo "Hello Wolrd";die;
        return view('members.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'dob' => 'required',
            'email' => 'required|email|unique:members',
            'sponser_id' => 'required',
            'sub_sponser_id' => 'required',
            'left_or_right' => 'required',
        ]);
        // dd($request->all());
        //output: INV-000001

        $member_count = Member::where('sponser_id', $request->sponser_id)->where('sub_sponser_id', $request->sub_sponser_id)->count();
        if ($member_count != 2 && $request->sub_sponser_id = $request->sponser_id) 
        {
            $member = new Member;
            $member->user_id = 'NIVI-'.rand(1000000000,9999999999);
            $member->name = $request->name;
            $member->phone_no = $request->phone_no;
            $member->dob = date('Y-m-d', strtotime($request->dob));
            $member->email = $request->email;
            $member->sponser_id = $request->sponser_id;
            $member->sub_sponser_id = $request->sub_sponser_id;
            $member->left_or_right = $request->left_or_right;
            $member->save();

            $details = [
                    'title' => 'Mail from Nevi Helth Care',
                    'body' => 'This is for testing email using smtp',
                    'member_id' => $member->user_id,
                    // 'password' => $password,
                ];

                \Mail::to($member->email)->send(new \App\Mail\UserCredentials($details));

            toastr()->success('Member Added');
            return Redirect::route('member.addMember');
        }
        else
        {
            toastr()->error('The sponser have already two members.');
            return Redirect::route('member.addMember');
        }

    }
}

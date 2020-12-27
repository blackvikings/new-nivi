<?php

namespace App\Http\Controllers\Member\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Redirect;
use Session;
use Auth;

class MembersController extends Controller
{
    public function index()
    {
//        echo "Hello Wolrd";die;
        return view('members.index');
    }

    public function store(Request $request)
    {

        Session::flash('user_id');

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
        if ($member_count != 3 && $request->sub_sponser_id = $request->sponser_id)
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

            // $details = [
            //         'title' => 'Mail from Nevi Helth Care',
            //         'body' => 'This is for testing email using smtp',
            //         'member_id' => $member->user_id,
            //         // 'password' => $password,
            //     ];

            //     \Mail::to($member->email)->send(new \App\Mail\UserCredentials($details));

            Session::put('user_id', $member->user_id);

            toastr()->success('Member Added');
            return Redirect::route('member.addMember');
        }
        else
        {
            toastr()->error('The sponser have already two members.');
            return Redirect::route('member.addMember');
        }

    }


    public function viewMember(Request $request)
    {
        if($request->isMethod('post'))
        {
            $formdate = date('Y-m-d H:i:s', strtotime($request->fromdate));
            $todate = date('Y-m-d H:i:s', strtotime($request->todate));
            $members = Member::where('id', '!=', Auth::guard('members')->user()->id)->whereBetween('created_at', [$formdate, $todate])->get();
//                dd($members->toArray());
            return view('members.view-member', compact('members'));
        }
        return view('members.view-member');
    }



    public function directMember()
    {
        $id= Auth::guard('members')->user()->user_id;
        $members = Member::where('user_id', '!=', $id)->where('sponser_id', $id)->get();
        // dd($members->toArray());
        return view('members.direct-member', compact('members'));
    }
}

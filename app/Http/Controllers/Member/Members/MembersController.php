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
        if ($member_count != 3 && $request->sub_sponser_id != $request->sponser_id)
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
            return Redirect::back();
        }

    }

    public function viewMember(Request $request)
    {
        if($request->has('fromdate') && $request->has("todate"))
        {
            $formdate = date('Y-m-d h:i:s', strtotime($request->fromdate));
            $todate = date('Y-m-d h:i:s', strtotime($request->todate));

            $sponser_code = $request->sponser_code;
            $side1 = $request->side1;
            $sub_sponser_id = $request->sub_sponser_id;
            $side2 = $request->side2;
//            if($sponser_code || $side1 || $sub_sponser_id || $side2) {
                $members = Member::where('id', '>', Auth::guard('members')->user()->id)->whereBetween('created_at', [$formdate, $todate])->get();
//                if(!empty($request->sponser_code))
//                {
//                    $members->where('sponser_id', $sponser_code);
//                }
//                if(!empty($request->side1))
//                {
//                    $members->where('left_or_right', $side1);
//                }
//                if(!empty($request->sub_sponser_id))
//                {
//                    $members->where('sub_sponser_id', $sub_sponser_id);
//                }
//                if (!empty($request->side2))
//                {
//                    $members->where('left_or_right', $side2);
//                }
//                $rows = $members->orderBy('id', 'asc')->get();
//                    dd($rows->toArray());
                return view('members.view-member', ['members' => $members]);
//            }
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

    public function binaryTree($user_id = null)
    {
        if(isset($user_id))
            $member1 = Member::where('user_id', $user_id)->first();
        else
            $member1 = Member::where('user_id', Auth::guard('members')->user()->user_id)->first();

        $name = 'Register';
        $image = 'https://image.flaticon.com/icons/svg/145/145867.svg';

        if (!empty($member1->user_id))
        {
            $member1_1 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1->user_id)->first();
        }
        if(!empty($member1_1->user_id))
        {
            $member1_1_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_1->user_id)->first();
            $member1_1_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_1->user_id)->first();
        }

        if(!empty($member1_1_1->user_id))
        {
            $member1_1_1_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_1_1->user_id)->first();
            $member1_1_1_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_1_1->user_id)->first();
        }

        if(!empty($member1_1_2->user_id))
        {
            $member1_1_2_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_1_2->user_id)->first();
            $member1_1_2_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_1_2->user_id)->first();
        }

        //------------****--------//

        if (!empty($member1->user_id))
        {
            $member1_2 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1->user_id)->first();
        }

        if(!empty($member1_2->user_id))
        {
            $member1_2_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_2->user_id)->first();
            $member1_2_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_2->user_id)->first();
        }

        if(!empty($member1_2_1->user_id))
        {
            $member1_2_1_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_2_1->user_id)->first();
            $member1_2_1_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_2_1->user_id)->first();
        }

        if (!empty($member1_2_2->user_id))
        {
            $member1_2_2_1 = Member::where('left_or_right', 'left')->where('sub_sponser_id', $member1_2_2->user_id)->first();
            $member1_2_2_2 = Member::where('left_or_right', 'right')->where('sub_sponser_id', $member1_2_2->user_id)->first();
        }

        $html = '<div class="body genealogy-body genealogy-scroll">
                    <div class="genealogy-tree">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="member-view-box"  data-toggle="tooltip" data-placement="right" data-html="true" title="<em>Tooltip</em> <br> <u>with</u> <br> <b>HTML</b>">
                                        <div class="member-image">
                                            <img src="'.(!empty($member1->profile_pic) ? $member1->profile_pic : $image).'" width="145" alt="Member">
                                            <div class="member-details">
                                                <h3>'.(!empty($member1->name) ? $member1->name : $name).'</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="active">
                                    <li>
                                        <a href="'.(!empty($member1_2->user_id) ? url()->current()."/".$member1_2->user_id : url("/add-member") ).'">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                    <img src="'.(!empty($member1_2->profile_pic) ? $member1_2->profile_pic : $image ).'" alt="Member">
                                                    <div class="member-details">
                                                        <h3>'.(!empty($member1_2->name) ? $member1_2->name : $name ).'</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="active">
                                            <li>
                                                <a href="'.(!empty($member1_2_1->user_id) ? url()->current()."/".$member1_2_1->user_id : url("/add-member") ).'">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="'.(!empty($member1_2_1->profile_pic) ? $member1_2_1->profile_pic : $image ).'" alt="Member">
                                                            <div class="member-details">
                                                               <h3>'.(!empty($member1_2_1->name) ? $member1_2_1->name : $name).'</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- 44444444444444444---start----444444444 -->
                                                <ul class="active">
                                                    <li>
                                                        <a href="'.(!empty($member1_2_1_1->user_id) ? url()->current()."/".$member1_2_1_1->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_2_1_1->profile_pic) ? $member1_2_1_1->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_2_1_1->name) ? $member1_2_1_1->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.(!empty($member1_2_1_2->user_id) ? url()->current()."/".$member1_2_1_2->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_2_1_2->profile_pic) ? $member1_2_1_2->profile : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_2_1_2->name) ? $member1_2_1_2->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- 44444444444444------End------444444444444444 -->
                                            </li>
                                            <li>
                                                <a href="'.(!empty($member1_2_2->user_id) ? url()->current()."/".$member1_2_2->user_id : url("/add-member") ).'">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="'.(!empty($member1_2_2->profile_pic) ? $member1_2_2->profile_pic : $image).'" alt="Member">
                                                            <div class="member-details">
                                                                <h3>'.(!empty($member1_2_2->name) ? $member1_2_2->name : $name).'</h3>
                                                                <!-- Member 1-7 -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="active">
                                                    <li>
                                                        <a href="'.(!empty($member1_2_2_1->user_id) ? url()->current()."/".$member1_2_2_1->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_2_2_1->profile_pic) ? $member1_2_2_1->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_2_2_1->name) ? $member1_2_2_1->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.(!empty($member1_2_2_2->user_id) ? url()->current()."/".$member1_2_2_2->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_2_2_2->profile_pic) ? $member1_2_2_2->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_2_2_2->name) ? $member1_2_2_2->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="'.(!empty($member1_1->user_id) ? url()->current()."/".$member1_1->user_id : url("/add-member") ).'">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                    <img src="'.(!empty($member1_1->profile_pic) ? $member1_1->profile_pic : $image ).'" alt="Member">
                                                    <div class="member-details">
                                                        <h3>'.(!empty($member1_1->name) ? $member1_1->name : $name ).'</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="active">
                                            <li>
                                                <a href="'.(!empty($member1_1_1->user_id) ? url()->current()."/".$member1_1_1->user_id : url("/add-member") ).'">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="'.(!empty($member1_1_1->profile_pic) ? $member1_1_1->profile_pic : $image ).'" alt="Member">
                                                            <div class="member-details">
                                                                <h3>'.(!empty($member1_1_1->name) ? $member1_1_1->name : $name).'</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="active">
                                                    <li>
                                                        <a href="'.(!empty($member1_1_1_1->user_id) ? url()->current()."/".$member1_1_1_1->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_1_1_1->profile_pic) ? $member1_1_1_1->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_1_1_1->name) ? $member1_1_1_1->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.(!empty($member1_1_1_2->user_id) ? url()->current()."/".$member1_1_1_2->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_1_1_2->profile_pic) ? $member1_1_1_2->profile_pic : $image ).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_1_1_2->name) ? $member1_1_1_2->name : $name) .'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="'.(!empty($member1_1_2->user_id) ? url()->current()."/".$member1_1_2->user_id : url("/add-member") ).'">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img src="'.(!empty($member1_1_2->profile_pic) ? $member1_1_2->profile_pic : $image).'" alt="Member">
                                                            <div class="member-details">
                                                                <h3>'.(!empty($member1_1_2->name) ? $member1_1_2->name : $name).'</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul class="active">
                                                    <li>
                                                        <a href="'.(!empty($member1_1_2_1->user_id) ? url()->current()."/".$member1_1_2_1->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_1_2_1->profile_pic) ? $member1_1_2_1->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_1_2_1->name) ? $member1_1_2_1->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.(!empty($member1_1_2_2->user_id) ? url()->current()."/".$member1_1_2_2->user_id : url("/add-member") ).'">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="'.(!empty($member1_1_2_2->profile_pic) ? $member1_1_2_2->profile_pic : $image).'" alt="Member">
                                                                    <div class="member-details">
                                                                        <h3>'.(!empty($member1_1_2_2->name) ? $member1_1_2_2->name : $name).'</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
';



        return view('members.binary-tree', compact('html'));
    }
}

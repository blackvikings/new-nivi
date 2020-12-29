<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Session;
class RegisterController extends Controller
{

    public function randomPassword() {
        $alphabet = '1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function index()
    {
        return view('members.auth.register');
    }

    protected function create(Request $request)
    {

//        $request->validate([
//           'user_id' => 'required',
//
//        ]);

                    
            Session::flash('user_id');
            Session::flash('password');

        $member = Member::where('user_id', $request->member_id)->first();
        if ($member != null) {
            $member->father_name = $request->father_name;
            $member->mother_name = $request->mother_name;
            $member->nominee = $request->nominee;
            $member->nominee_dob = date('Y-m-d', strtotime($request->nominee_dob));

            if ($request->hasFile('profileImage'))
            {
                $image = $request->file('profileImage');
                $imgname = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/member-images');
                $image->move($destinationPath, $imgname);
                $member->profile_pic = 'public/uploads/'.$imgname;
            }

            if($request->has('aadharImage'))
            {
                $image = $request->file('aadharImage');
                $imgname = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/member-addharImage');
                $image->move($destinationPath, $imgname);
                $member->addhar_image = 'public/uploads/member-addharImage/'.$imgname;
            }
            if($request->has('panimage'))
            {
                $image = $request->file('panimage');
                $imgname = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/member-panImage');
                $image->move($destinationPath, $imgname);
                $member->pan_image = 'public/uploads/member-panImage/'.$imgname;
            }

            $address = ['address' => $request->address, 'area' => $request->area, 'house_no' => $request->house_no, 'state' => $request->state, 'district' => $request->district];
            $bank_details = ['aadhar_no' => $request->aadhar_no, 'account_holder_name' => $request->account_holder_name,
                'account_no' => $request->account_no,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'ifsc_code' => $request->ifsc_code,
                'pan_no'  => $request->pan_no];
            $member->address = json_encode($address);
            $member->bankdetails = json_encode($bank_details);
            $password = $this->randomPassword();
            $member->password = bcrypt($password);
            $member->save();

            // $details = [
            //     'title' => 'Mail from Nevi Helth Care',
            //     'body' => 'This is for testing email using smtp',
            //     'member_id' => $member->user_id,
            //     'password' => $password,
            // ];
            
            Session::put('user_id', $member->user_id);
            Session::put('password', $password);

            // \Mail::to($member->email)->send(new \App\Mail\UserCredentials($details));

            toastr()->success('Member registration successfully completed!!');
            return redirect()->back();
        }
        else
        {
            toastr()->error('Member not exists!!');
            return redirect()->back();
        }

    }
}

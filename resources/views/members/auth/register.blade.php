@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <main id="main">
        <!-- ======= Register Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row mt-2 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{ route('member.register.update') }}" method="post" enctype="multipart/form-data" class="php-email-form">
                        @csrf

                        @if(Session::has('user_id') && Session::has('password'))
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Kindily Note User ID and Password : </p>
                                    <p>{{ Session::get('user_id') }}</p>
                                    <p>{{ Session::get('password') }}</p>
                                </div>
                            </div>
                        @endif
                        <!-- user-ID, name, and father -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label>Member Id</label>
                                    <input type="text" name="member_id" class="form-control" id="" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                     <label>Name</label>
                                    <input type="text" class="form-control" name="name" id=""  data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Father Name</label>
                                    <input type="text" class="form-control" name="father_name" id=""  data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <!-- DOB, nominee and mother-name -->
                            <div class="form-row">
                                {{-- <div class="col-md-4 form-group">
                                    <label>Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div> --}}
                                <div class="col-md-6 form-group">
                                    <label>Nominee DOB</label>
                                    <input type="date" class="form-control" name="nominee_dob" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Nominee Name</label>
                                    <input type="text" class="form-control" name="nominee" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <h5><span>Profile Picture</span></h5>
                            <!-- profile picture -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <input type="file" class="form-control" name="profileImage" id="" accept="image/x-png,image/gif,image/jpeg" placeholder="Photo" data-rule="required" data-msg="" />
                                    <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="loading..." class="img-thumbnail"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    <input type="text" name="" class="form-control" id="" name="address" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <!-- area, house-no and dist, state -->
                            <div class="form-row">
                                <div class="col-md-3 form-group">
                                    <label>House No.</label>
                                    <input type="text" class="form-control" id="" name="house_no" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Area</label>
                                    <input type="text" class="form-control" id="" name="area" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>District</label>
                                    <input type="text" name="district" class="form-control" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <h5><span>Attach your aadhar card number and file (img)</span></h5>
                            <!-- Aadhar file and number -->
                            <div class="form-row">
                                <div class="col-md-8 form-group">
                                    <label>Aadhar No.</label>
                                    <input type="text" class="form-control" name="aadhar_no" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Aadhar File (Only Front Side Image)</label>
                                    <input type="file" class="form-control" name="aadharImage" id=""  data-rule="required" data-msg="Please attach file of aadhar card (img, pdf)" />
                                    <img src="./public/assets/ourImages/Dummy-Aadhaar-Screenshot.png" alt="loading..." class="img-thumbnail"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- A/C-holder and A/C number -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label>A/C Holder name</label>
                                    <input type="text" class="form-control" name="account_holder_name" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>A/C Number</label>
                                    <input type="text" class="form-control" name="account_no" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- bank-name , bank-branch and ifsc -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Bank Branch</label>
                                    <input type="text" class="form-control" name="bank_branch" id=""  data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>IFSC</label>
                                    <input type="text" class="form-control" name="ifsc_code" id="" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <h5><span>Attach your PAN card number and file (img)</span></h5>
                            <!-- PAN file and number -->
                            <div class="form-row">
                                <div class="col-md-8 form-group">
                                    <label>PAN No.</label>
                                    <input type="text" class="form-control" name="pan_no" id=""  data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>PAN File (Img)</label>
                                    <input type="file" class="form-control" name="panimage" id=""  data-rule="required" data-msg="Please attach file of PAN card (img, pdf)" />
                                    <img src="./public/assets/ourImages/500_F_345674072_QwzzCNH6PElHQxsow7DtAr50TyGmcYGs.jpg" alt="loading..." class="img-thumbnail"/>
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="text-center"><button type="submit" id="submit">Submit</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    @if(\Session::has('response'))
    <pre>
        {!! \Session::get('response') !!}
    </pre>
    @endif
@endsection

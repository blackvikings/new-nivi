@extends('layouts.app')
@section('title', 'Member Register')
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
                                    <input type="text" name="member_id" class="form-control" id="" placeholder="Member Id" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="name" id="" placeholder="Name" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="father_name" id="" placeholder="Father Name" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <!-- DOB, nominee and mother-name -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="mother_name" id="" placeholder="Mother Name" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="date" class="form-control" name="nominee_dob" id="" placeholder="DOB" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="nominee" id="" placeholder="Nominee" data-rule="required" data-msg="" />
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
                                    <input type="text" name="" class="form-control" id="" name="address" placeholder="Address" data-rule="" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>


                            <!-- area, house-no and dist, state -->
                            <div class="form-row">
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" id="" name="area" placeholder="Area" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" id="" name="house_no" placeholder="House No." data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" class="form-control" name="state" id=""  placeholder="State" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" name="district" class="form-control" id="" placeholder="District" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <h5><span>Attach your aadhar card number and file (img, pdf)</span></h5>
                            <!-- Aadhar file and number -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="aadhar_no" id="" placeholder="Aadhar No." data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="file" class="form-control" name="aadharImage" id=""  data-rule="required" data-msg="Please attach file of aadhar card (img, pdf)" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- A/C-holder and A/C number -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="account_holder_name" id="" placeholder="A/C Holder name" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="account_no" id="" placeholder="A/C Number"  data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- bank-name , bank-branch and ifsc -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="bank_name" id="" placeholder="Bank Name" data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="bank_branch" id="" placeholder="Bank Branch"  data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" name="ifsc_code" id="" placeholder="IFSC"  data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <h5><span>Attach your PAN card number and file (img, pdf)</span></h5>
                            <!-- PAN file and number -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="pan_no" id="" placeholder="PAN No." data-rule="required" data-msg="" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="file" class="form-control" name="panimage" id=""  data-rule="required" data-msg="Please attach file of PAN card (img, pdf)" />
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
@endsection

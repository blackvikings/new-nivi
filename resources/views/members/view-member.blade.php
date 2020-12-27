@extends('layouts.app')
@section('title', 'View Member')
    @push('css')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dist/duDatepicker.min.css') }}">
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dist/duDatepicker-theme.css') }}">
    @endpush
@section('content')
<div class="container pt-3">

    <div class="row card shadow p-3">
        <div class="col-sm-12">
            <form method="POST" action="{{ route('member.view.data') }}" >
                @csrf
                 {{-- 1st --}}
                 <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sort By</label>
                           <select class="form-control" name="" id="">
                               <option>Select One</option>
                               <option>Member Code</option>
                               <option>Member Name</option>
                               <option>Mobile Number</option>
                            </select>
                        </div>
                     </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                         <label>Member Code / Member Name / Member Number</label>
                         <input type="text" class="form-control" id="">
                      </div>
                   </div>
                 </div>

                    {{-- 2nd Sponsor Code--}}
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sponsor Code</label>
                          <input type="text" class="form-control" id="">
                        </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                           <label>Left / Right</label>
                           <select class="form-control" id="">
                               <option>All</option>
                               <option>Left</option>
                               <option>Right</option>
                           </select>
                        </div>
                     </div>
                 </div>

                   {{-- 3nd Sub-Sponsor Code--}}
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sub-Sponsor Code</label>
                          <input type="text" class="form-control" id="">
                        </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                           <label>Left / Right</label>
                           <select class="form-control" id="">
                               <option>All</option>
                               <option>Left</option>
                               <option>Right</option>
                           </select>
                        </div>
                     </div>
                 </div>


                  {{-- 4th doj--}}
                  <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                           <label>Joining Date</label>
                             <input type="text" id="daterange" class="form-control">
                             <input type="text" id="range-from" name="fromdate" value="December 27, 2020" class="form-control">
                        </div>
                     </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>To</label>
                              <input type="text" id="range-to" name="todate" value="December 27, 2020" class="form-control">
                          </div>
                      </div>
                  </div>


                  {{-- 5ht pancard--}}
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Record per Page</label>
                          <input type="number" class="form-control" id="">
                        </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                           <label>PAN Card</label>
                           <select class="form-control" id="">
                              <option>All</option>
                              <option>Verified</option>
                              <option>Not Verified</option>
                           </select>
                        </div>
                     </div>
                 </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    <div class="pt-5"></div>
    @isset($members)
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">Sr.no.</th>
              <th scope="col">Name</th>
              <th scope="col">Id No</th>
              <th scope="col">Address</th>
              <th scope="col">Joining Date</th>
              <th scope="col">Sponsor Id</th>
              <th scope="col">Sub Sponsor Id</th>
            </tr>
          </thead>
          <tbody>
            @forelse($members as $member)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->user_id }}</td>
                    @php
                        $address = json_decode($member->address);
                    @endphp
                    <td>{{ $address->address }} {{ $address->area }} {{ $address->house_no }} {{ $address->state }} {{ $address->district }}</td>
                    <td>{{ date('d-m-Y', strtotime($member->created_at)) }}</td>
                    <td>{{ $member->sponser_id }}</td>
                    <td>{{ $member->sub_sponser_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7"> Data Not found.</td>
                </tr>
            @endforelse
          </tbody>
        </table>
    @else
        Please Click Search for view data.
    @endisset
</div>
@endsection

@push('js')

<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('public/assets/dist/duDatepicker.min.js') }}"></script>

 <script type="text/javascript">
     $(document).ready( function () {
     $('#myTable').DataTable();
});


     window.onload = function () {

         duDatepicker('#daterange', {
             range: true, format: 'mmmm d, yyyy', outFormat: 'dd-mm-yyyy', fromTarget: '#range-from', toTarget: '#range-to',
             clearBtn: true, theme: 'green', maxDate: 'today'
         })
         // duDatepicker('#daterange', 'setValue', 'August 2, 2020-August 5, 2020')
     }

 </script>
@endpush

@extends('layouts.app')
@section('title', 'View Member')
 @push('css')
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
 @endpush
@section('content')
<div class="container pt-3">

    <div class="row card shadow p-3">
        <div class="col-sm-12">
            <form>
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
                           <input type="text" name="daterange" class="form-control" value="01/01/2018 - 01/15/2018" />
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
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
</div>



@endsection

@push('js')

<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

 <script type="text/javascript">
     $(document).ready( function () {
     $('#myTable').DataTable();
} );
 </script>

 <script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

@endpush

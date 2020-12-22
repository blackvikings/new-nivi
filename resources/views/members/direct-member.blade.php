@extends('layouts.app')
 @push('css')
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> 
 @endpush
@section('content')



<div class="container">
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
                    $member_address = json_decode($member->address);
              @endphp
              <td>{{ $member_address->address }} {{ $member_address->area }} {{ $member_address->house_no }} {{ $member_address->state }} {{ $member_address->district }}</td>
              <td>{{ date('d-m-Y', strtotime($member->created_at)) }}</td>
              <td>{{ $member->sponser_id }}</td>
              <td>{{ $member->sub_sponser_id }}</td>
            </tr>
            @empty
            <tr>
                <td>Data not found</td>
            </tr>
            @endforelse
      </tbody>
    </table>
</div>



@endsection

@push('js')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready( function () {
     $('#myTable').DataTable();
} );
 </script>
@endpush
@extends('layouts.app')

@section('content')    

    @php($date = date('d-M-Y'))


    <div class="row" style="padding: 20px;">
      <div class="col-md-6">
          <h1 class="text-black-50">Attendance Report</h1>
      </div>

      <div class="col-md-6 text-right">
          <h1 class="text-black-50">{{ $date }}</h1>
      </div>
    </div>

@endsection

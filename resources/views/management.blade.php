@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Employee Management',
'small_title' => 'Employee List',
'button_title' => 'Create Employee'
])

@include('layouts.datatable', ['test' => 'testing'])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

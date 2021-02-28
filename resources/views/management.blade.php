@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Employee Management',
'small_title' => 'Employee List',
'button' => true,
'button_title' => 'Create Employee',
'button_url' => "management/create"
])

@include('component.datatable', [
'edit_url' => 'employee.management.edit',
])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

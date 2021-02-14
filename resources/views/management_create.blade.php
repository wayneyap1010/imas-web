@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Employee Management',
'small_title' => 'Create Employee',
'button' => false,
'button_title' => 'Create Employee',
'button_url' => "#"
])

@include('component.user_form')
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Employee Management',
'small_title' => 'Edit Employee',
'button' => false,
'button_title' => 'Create Employee',
'button_url' => "#"
])

@include('component.user_form', [
'form_url' => 'employee.management.update',
'readonly' => 'readonly',
'db_user' => $db_user,
'form_button_name' => 'Update',
'type' => 'update',
])

@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

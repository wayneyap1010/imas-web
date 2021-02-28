@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Admin Management',
'small_title' => 'Edit Admin',
'button' => false,
'button_title' => 'Create Admin',
'button_url' => "#"
])

@include('component.user_form', [
'form_url' => 'admin.management.update',
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

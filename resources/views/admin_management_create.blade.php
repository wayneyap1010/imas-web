@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Admin Management',
'small_title' => 'Create Admin',
'button' => false,
'button_title' => 'Create Admin',
'button_url' => "admin.management.store"
])

@include('component.user_form')
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

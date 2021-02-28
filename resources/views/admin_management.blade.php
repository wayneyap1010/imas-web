@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Admin Management',
'small_title' => 'Admin List',
'button' => true,
'button_title' => 'Create Admin',
'button_url' => "management/create"
])

@include('component.datatable', [
'edit_url' => 'admin.management.edit',
])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

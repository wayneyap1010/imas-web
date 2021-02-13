@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Admin Management',
'small_title' => 'Admin List',
'button_title' => 'Create Admin'
])

@include('layouts.datatable', ['test' => 'testing'])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

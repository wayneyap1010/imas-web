@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Report Management',
'small_title' => 'Employee Report',
'button' => true,
'button_title' => 'Generate Excel',
'button_url' => '#'
])

@include('component.datatable', ['test' => 'testing'])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

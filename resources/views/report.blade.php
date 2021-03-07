@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Report Management',
'small_title' => 'Employee Report',
'button' => true,
'button_title' => 'Generate Excel',
'button_url' => '#'
])

@include('component.datatable_report', [
'db_attds' => isset($db_attds) && !empty($db_attds) ? $db_attds : '',
'search_date' => $search_date,
])
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

@extends('layouts.app')

@section('content')

@component('component.card', [
'title' => 'Email Configuration',
'small_title' => 'Setting',
'button' => false,
'button_title' => '',
'button_url' => "#"
])

@include('component.email_configuration_form')
@endcomponent

<style>
  .container {
    padding-top: 20px;
  }

</style>
@endsection

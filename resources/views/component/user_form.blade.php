@if (Session::has('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@elseif (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

<?php
$user_id = '';
$name = '';
$email = '';
$mobile = '';
$city = '';
$street = '';
$state = '';
$postal = '';

if(isset($db_user)){
$user_id = $db_user->id != '' ? $db_user->id : '';
$name = $db_user->name != '' ? $db_user->name : '';
$email = $db_user->email != '' ? $db_user->email : '';
$mobile = $db_user->mobile != '' ? $db_user->mobile : '';
$city = $db_user->city != '' ? $db_user->city : '';
$street = $db_user->street != '' ? $db_user->street : '';
$state = $db_user->state != '' ? $db_user->state : '';
$postal = $db_user->postal != '' ? $db_user->postal : '';
}
?>

@if(isset($type) && $type == 'update')
{{ Form::open(array('url' => route($form_url, $user_id))) }}
@csrf
{{ method_field('PUT') }}
@else
{{ Form::open(array('url' => route($form_url))) }}
@endif
<div class="row gutters">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <h6 class="mb-3 text-primary"><u>Personal Details</u></h6>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="fullName" class="control-label">Full Name</label>
      <input type="text" class="form-control" name="fullName" placeholder="Enter full name" value="{{ $name }}" required>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="eMail" class="control-label">Email</label>
      <input type="email" class="form-control" name="eMail" placeholder="Enter email ID" value="{{ $email }}" required {{ $readonly }}>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="{{ $mobile }}">
    </div>
  </div>

  @if(isset($type) && $form_url == 'employee.management.update')
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="phone">Password</label>
      <input type="text" class="form-control" name="password" placeholder="Enter new password">
    </div>
  </div>
  @endif

</div>
<div class="row gutters">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <h6 class="mb-3 text-primary"><u>Address</u></h6>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="street">Street</label>
      <input type="name" class="form-control" name="street" placeholder="Enter Street" value="{{ $street }}">
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="city">City</label>
      <input type="name" class="form-control" name="city" placeholder="Enter City" value="{{ $city }}">
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="state">State</label>
      <input type="text" class="form-control" name="state" placeholder="Enter State" value="{{ $state }}">
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
      <label for="postal">Postal Code</label>
      <input type="text" class="form-control" name="postal" placeholder="Enter postal Code" value="{{ $postal }}">
    </div>
  </div>
</div>
<div class="row gutters">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="text-right">
      <button type="submit" name="submit" name="submit" class="btn btn-primary">{{ $form_button_name }}</button>
    </div>
  </div>
</div>
{{ Form::close() }}

<style>
  body {
    color: #bcd0f7;
    background: white;
  }

  .account-settings {
    position: absolute;
    top: 50%;
    left: 28%;
    transform: translateY(-50%);
    padding-right: 1.25rem;
  }

  .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
  }

  .account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
  }

  .account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
  }

  .account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
  }

  .account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
  }

  .account-settings .about {
    margin: 1rem 0 0 0;
    font-size: 0.8rem;
    text-align: center;
  }

  .card {
    background: white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
  }

  .card-body {
    position: relative;
  }

  .form-control {
    border: 1px solid #596280;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: white;
    color: #5374b5;
  }

  div.form-group.required .control-label:after {
    content: "*";
    color: red;
  }

</style>

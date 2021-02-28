@if (Session::has('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@elseif (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

{{ Form::open(array('url' => route('admin.configuration.store'))) }}
<div class="row gutters">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="mailHost" class="control-label">Mail Host</label>
      <input type="text" class="form-control" name="mailHost" placeholder="Enter Mail Host" value="{{ $db_email_config['smtp_server'] }}" required>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="mailPort" class="control-label">Mail Port</label>
      <input type="number" class="form-control" name="mailPort" placeholder="Enter Mail Port" value="{{ $db_email_config['smtp_port'] }}" required>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="mailUsername">Mail Username</label>
      <input type="text" class="form-control" name="mailUsername" placeholder="Enter Mail Username" value="{{ $db_email_config['email_account'] }}" required>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group required">
      <label for="mailPassword">Mail Password</label>
      <input type="password" class="form-control" name="mailPassword" placeholder="Enter Mail Password" value="{{ $db_email_config['email_password'] }}" required>
    </div>
  </div>
</div>
<div class="row gutters">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="text-right">
      <button type="button" class="btn btn-secondary">Cancel</button>
      <button type="submit" class="btn btn-primary">Create</button>
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
    color: #bcd0f7;
  }

  div.form-group.required .control-label:after {
    content: "*";
    color: red;
  }

</style>

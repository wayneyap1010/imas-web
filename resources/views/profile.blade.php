@extends('layouts.app')

@section('content')

{{ Form::open(array('url' => route('profile.update'))) }}
<input type="hidden" name="user_id" value="{{ Auth::id() }}">
<div class="container">
  @if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @elseif (Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
      <div class="card h-100">
        <div class="card-body">
          <div class="account-settings">
            <div class="user-profile">
              <!-- <div class="user-avatar">
							<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Maxwell Admin">
						</div> -->
              <h5 class="user-name">{{ $db_user['name'] }}</h5>
              <h6 class="user-email">{{ $db_user['email'] }}</h6>
            </div>
            <!-- <div class="about">
						<h5 class="mb-2 text-primary">About</h5>
						<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
					</div> -->
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
      <div class="card h-100">
        <div class="card-body">
          <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <h6 class="mb-3 text-primary">Personal Details</h6>
            </div>
            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group  required">
                <label for="fullName" class="control-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="{{ $db_user['name'] }}" required>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group required">
            <label for="eMail">Email</label>
            <input type="email" class="form-control" id="eMail" name="pemailostal" placeholder="Enter email ID" value="{{ $db_user['email'] }}" readonly>
          </div>
        </div> --}}
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group  required">
            <label for="phone" class="control-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="mobile" placeholder="Enter phone number" value="{{ $db_user['mobile'] }}" required>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group required">
            <label for="company">Company Name</label>
            <input type="text" class="form-control" id="company" placeholder="Enter company name" value="{{ $db_company->comp_name }}" readonly>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" id="confirm" name="reenter_password" placeholder="Re-enter password">
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h6 class="mb-3 text-primary">Address</h6>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="Street">Street</label>
            <input type="name" class="form-control" id="Street" name="street" placeholder="Enter Street" value="{{ $db_user['street'] }}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="ciTy">City</label>
            <input type="name" class="form-control" id="ciTy" name="city" placeholder="Enter City" value="{{ $db_user['city'] }}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="sTate">State</label>
            <input type="text" class="form-control" id="sTate" name="state" placeholder="Enter State" value="{{ $db_user['state'] }}">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-group">
            <label for="zIp">Postal Code</label>
            <input type="text" class="form-control" id="zIp" name="postal" placeholder="Enter postal Code" value="{{ $db_user['postal'] }}">
          </div>
        </div>
      </div>
      <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="text-right">
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
{{ Form::close() }}

<style>
  .container {
    padding-top: 50px;
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
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
  }

  .card-body {
    position: relative;
  }


  div.form-group.required .control-label:after {
    content: "*";
    color: red;
  }

</style>
@endsection

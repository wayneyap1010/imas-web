@extends('layouts.app')

@section('content')    

  @php($date = date('d-M-Y'))


  <div class="row" style="padding: 20px;">
    <div class="col-md-6">
      <h1 class="text-black-50">User Management</h1>
    </div>
    <div class="col-md-6 text-right">
        <h1 class="text-black-50">{{ $date }}</h1>
    </div>
  </div>

  <div class="row" style="padding: 20px;">
    <div class="col-md-12 text-right">
    <button type="button" class="btn btn-primary">Add new employee</button>
    </div>
  </div>

  <div class="container">
    <table class="table -----------">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Date Created</th>
          <th>Date Updated</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Jeff</td>
          <td>jeff@gmail.com</td>
          <td>**************</td>
          <td>10-10-2020</td>
          <td>-</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ken</td>
          <td>ken@gmail.com</td>
          <td>**************</td>
          <td>10-10-2020</td>
          <td>-</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Jazz</td>
          <td>jazz@gmail.com</td>
          <td>**************</td>
          <td>10-10-2020</td>
          <td>-</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Hartley</td>
          <td>hartley@gmail.com</td>
          <td>**************</td>
          <td>08-10-2020</td>
          <td>-</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Bloom</td>
          <td>bloom@gmail.com</td>
          <td>**************</td>
          <td>08-10-2020</td>
          <td>-</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Greene</td>
          <td>greene@gmail.com</td>
          <td>**************</td>
          <td>08-10-2020</td>
          <td>-</td>
        </tr>
      </tbody>
    </table>
  </div>

@endsection

@extends('layouts.app')

@section('content')    

    @php($date = date('d-M-Y'))


    <div class="row" style="padding: 20px;">
      <div class="col-md-6">
          <h1 class="text-black-50">Attendance Report</h1>
      </div>

      <div class="col-md-6 text-right">
          <h1 class="text-black-50">{{ $date }}</h1>
      </div>
    </div>

    <div class="container">
    <table class="table -----------">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Clock In</th>
            <th>Clock Out</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>21-10-2020</td>
            <td>7:50 am</td>
            <td>6:00 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>2</td>
            <td>20-10-2020</td>
            <td>7:32 am</td>
            <td>6:01 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>3</td>
            <td>19-10-2020</td>
            <td>7:55 am</td>
            <td>6:02 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>4</td>
            <td>16-10-2020</td>
            <td>7:50 am</td>
            <td>6:01 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>5</td>
            <td>15-10-2020</td>
            <td>7:48 am</td>
            <td>6:00 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>6</td>
            <td>14-10-2020</td>
            <td>7:46 am</td>
            <td>6:01 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>7</td>
            <td>13-10-2020</td>
            <td>7:58 am</td>
            <td>6:00 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>8</td>
            <td>12-10-2020</td>
            <td>7:52 am</td>
            <td>6:02 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>9</td>
            <td>9-10-2020</td>
            <td>7:51 am</td>
            <td>6:03 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        <tr>
            <td>10</td>
            <td>8-10-2020</td>
            <td>7:58 am</td>
            <td>6:00 pm</td>
            <td>Jeff</td>
            <td>jeff@gmail.com</td>
        </tr>
        </tbody>
    </table>
    </div>

@endsection

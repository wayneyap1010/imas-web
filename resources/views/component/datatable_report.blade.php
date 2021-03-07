{!! Form::open(array('url' => route('report.search'), 'method' => 'get')) !!}
<div class="row">
  <div class="col-6">
    <label>Choose date: </label>
    <div class="row">
      <div class="col-6">
        <input type="text" class="form-control" name="daterange" value="{{ isset($search_date) && !empty($search_date) ? $search_date : date('d/m/Y d/m/Y') }}" />
      </div>
      <div class="col-6">
        <button type="submit" class="btn btn-success">Search</button>
      </div>
    </div>
  </div>
  <div class="col-6">
  </div>
</div>
{!! Form::close() !!}

<br>
<hr>

<table id="example" class="display" style="width:100%;">
  <thead>
    <tr>
      <th>Date</th>
      <th>User Time</th>
      <th>System Time</th>
      <th>Clock</th>
      <th>Name</th>
      <th>Email</th>
      <th>Area</th>
      <th>City</th>
      <th>State</th>
      <th>Country</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($db_attds) && !empty($db_attds))
    @foreach($db_attds AS $a)
    <tr>
      <td>{{ $a->mobile_date }}</td>
      <td>{{ $a->mobile_time }}</td>
      <td>{{ explode(' ', $a->created_at)[1] }}</td>
      <td>{{ $a->clock }}</td>
      <td>{{ $a->name }}</td>
      <td>{{ $a->email }}</td>
      <td>{{ $a->area }}</td>
      <td>{{ $a->city }}</td>
      <td>{{ $a->state }}</td>
      <td>{{ $a->country }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
  <tfoot>
    <tr>
      <th>Date</th>
      <th>User Time</th>
      <th>System Time</th>
      <th>Clock</th>
      <th>Name</th>
      <th>Email</th>
      <th>Area</th>
      <th>City</th>
      <th>State</th>
      <th>Country</th>
    </tr>
  </tfoot>
</table>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });


  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });

</script>

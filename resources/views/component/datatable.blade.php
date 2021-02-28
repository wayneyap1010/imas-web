<table id="example" class="display" style="width:100%;">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile No.</th>
      <th>Postal</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($db_user))
    @foreach($db_user AS $u)
    <tr>
      <td>{{ $u->name }}</td>
      <td>{{ $u->email }}</td>
      <td>{{ $u->mobile ?? '-' }}</td>
      <td>{{ $u->postal ?? '-' }}</td>
      <td>{{ $u->created_at }}</td>
      <td>{{ $u->updated_at ?? '-' }}</td>
      <td>
        <a href="{{ route($edit_url, $u->id) }}" class="btn btn-warning pull-right">Edit</a>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
  <tfoot>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile No.</th>
      <th>Postal</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Options</th>
    </tr>
  </tfoot>
</table>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

</script>

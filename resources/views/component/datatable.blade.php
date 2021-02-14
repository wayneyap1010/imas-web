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
    @foreach($db_user AS $u)
    <tr>
      <td>{{ $u->name }}</td>
      <td>{{ $u->email }}</td>
      <td>{{ $u->mobile ?? '-' }}</td>
      <td>{{ $u->postal ?? '-' }}</td>
      <td>{{ $u->created_at }}</td>
      <td>{{ $u->updated_at ?? '-' }}</td>
      <td>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr>
    @endforeach
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

<?php 
    $homeActive = Route::currentRouteNamed('home') ? 'active' : '';
    $reportActive = Route::currentRouteNamed('report') ? 'active' : '';
    $managementActive = Route::currentRouteNamed('employee.management.index') ? 'active' : '';
    $admin_managementActive = Route::currentRouteNamed('admin.management.index') ? 'active' : '';
    $email_configurationActive = Route::currentRouteNamed('admin.configuration.index') ? 'active' : '';
?>

<li class="nav-item">
  <a href="{{ route('home') }}" class="nav-link <?php echo $homeActive ?>">
    <i class="nav-icon fas fa-home"></i>
    <p>Home</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('report') }}" class="nav-link <?php echo $reportActive ?>">
    <i class="nav-icon fas fa-file-excel"></i>
    <p>Report</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('employee.management.index') }}" class="nav-link <?php echo $managementActive ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>Employee management</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('admin.management.index') }}" class="nav-link <?php echo $admin_managementActive ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>Admin management</p>
  </a>
</li>
{{-- <li class="nav-item">
  <a href="{{ route('admin.configuration.index') }}" class="nav-link <?php echo $email_configurationActive ?>">
<i class="nav-icon fas fa-envelope"></i>
<p>Email configuration</p>
</a>
</li> --}}

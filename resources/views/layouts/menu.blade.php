<?php 
    $homeActive = Route::currentRouteNamed('home') ? 'active' : '';
    $reportActive = Route::currentRouteNamed('report') ? 'active' : '';
    $managementActive = Route::currentRouteNamed('management') ? 'active' : '';
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
    <a href="{{ route('management') }}" class="nav-link <?php echo $managementActive ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Management</p>
    </a>
</li>
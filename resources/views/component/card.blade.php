@php($date = date('d-M-Y'))

<div class="container">
  <div class="card" style="background-color: indianred;">
    <div class="row" style="padding: 20px;">
      <div class="col-md-6">
        <h3 class="text-black-50">{{ $title }}</h3>
      </div>
      <div class="col-md-6 text-right">
        <h3 class="text-black-50">{{ $date }}</h3>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="row" style="padding: 20px 20px 0 20px;">
      <div class="col-md-6">
        <h2 style="color:black;">{{ $small_title }}</h2>
      </div>
      @if($button == true)
      <div class="col-md-6 text-right">
        <a href="{{ $button_url }}">
          <button type="button" class="btn btn-primary">{{ $button_title }}</button>
        </a>
      </div>
      @endif
    </div>
    <div class="card-body">
      {{ $slot }}
    </div>
  </div>

  <!-- add a space for bottom -->
  <div class="col-md-12" style="padding:5px;"></div>
</div>

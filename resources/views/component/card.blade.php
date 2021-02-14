@php($date = date('d-M-Y'))

<div class="container">
  <div class="card">
    <div class="row" style="padding: 20px;">
      <div class="col-md-6">
        <h1 class="text-black-50">{{ $title }}</h1>
      </div>
      <div class="col-md-6 text-right">
        <h1 class="text-black-50">{{ $date }}</h1>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="row" style="padding: 20px 20px 0 20px;">
      <div class="col-md-6">
        <h2>{{ $small_title }}</h2>
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

<h1>Hi, {{ $data[0] }}</h1>
<h3 style="color:red;">WARNING: Please reset your password once login.</h3>
<p>Please click on the link <a href="{{ route('login') }}">{{ route('login') }}</a></p>
<p>to login with this password "{{ $data[1] }}".</p>

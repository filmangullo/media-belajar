@if ($message = Session::get('primary'))
<div class="alert alert-primary alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
   <a class="alert-link" href="#">Hello! </a> {{ $message }}.
</div>

@elseif ($message = Session::get('secondary'))

<div class="alert alert-secondary alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">Hmmmm! </a>{{ $message }}.
</div>

@elseif ($message = Session::get('success'))

<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">Success! </a> {{ $message }}.
</div>

@elseif ($message = Session::get('errors'))

<div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
   <a class="alert-link" href="#">Peringatan! </a> {{ $message }}.
</div>

@elseif ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">Perhatian! </a>{{ $message }}.
</div>

@elseif ($message = Session::get('info'))

<div class="alert alert-info alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <a class="alert-link" href="#">Information!</a> {{ $message }}.
</div>

@endif

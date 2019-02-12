@if(count($errors)> 0)
    <div class="w3-panel w3-pale-red w3-border">
      @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
      @endforeach
    </div>
@endif

@if(session('success'))
  <div class="w3-panel w3-pale-green w3-border">
  <p>{{session('success')}}</p>
  </div>
@endif

@if(session('error'))
  <div class="w3-panel w3-pale-red w3-border">
  <p>{{session('error')}}</p>
  </div>
@endif

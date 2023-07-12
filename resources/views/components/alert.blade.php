@if (Session::has($type))
<div class="alert alert-success mb-3" style="width:100%">{{ Session::get($type) }}</div>
@endif
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- temporary screen width checker --}}
<p id="PC">You are now viewing as <b>Computer</b>.</p>
<p id="tablet">You are now viewing as <b>Tablet</b>.</p>
<p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

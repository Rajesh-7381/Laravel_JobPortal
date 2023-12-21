@if(Session::has('success'))
<div class="alert alert-success" role="alert" style="display: none;">
    Profile updated successfully!
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger" role="alert" style="display: none;">
    Error updating profile!
</div>
@endif

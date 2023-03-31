@push('after-css')
<style>
    input[type=date]:required:invalid::-webkit-datetime-edit {
        color: transparent;
    }

    input[type=date]:focus::-webkit-datetime-edit {
        color: black !important;
    }

</style>
@endpush

@section('title','Edit User')
@section('page-title','User')

@push('link-bread')
<li class="nav-item">
    <a href="{{ route('user.index') }}">Data User</a>
</li>
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Edit</a>
</li>
@endpush

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Edit {{ $user->name }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="name" type="text" class="form-control input-border-bottom"
                                name="name" value="{{ $user->name }}" autofocus required>
                            <label for="name" class="placeholder">Name</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="username" type="text" class="form-control input-border-bottom"
                                name="username" value="{{ $user->username }}" required>
                            <label for="username" class="placeholder">Username *</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="email" type="email" class="form-control input-border-bottom"
                                name="email" value="{{ $user->email }}" required>
                            <label for="email" class="placeholder">Email *</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="access" type="text" class="form-control input-border-bottom"
                                name="access" value="{{ $user->access }}" data-toggle="modal"
                                data-target=".modalAccess" required>
                            <label for="access" class="placeholder">Select Access *</label>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->access == 'master')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="password" type="password" class="form-control input-border-bottom"
                                name="password" placeholder="Change Password *">
                            <label for="password" class="placeholder"></label>
                        </div>
                    </div>
                </div>
                @endif

                <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
                <button type="reset" class="btn btn-default"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
            </form>
        </div>
    </div>
</div>

@include('component.modal-access')


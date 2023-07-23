@extends('layout/admin')
@section('content')
    <div style="text-align: center;">
        <h3>Staff Management</h3>
    </div>
    <form method="post"
        action="@if (isset($request->id)) {{ url('Staff/update?id=' . $request->id) }}
@else
    {{ url('Staff/create') }} @endif">
        {{ csrf_field() }}
        @if (isset($request->id))
            <div class='container'>
                <h5>Update Staff</h5>
            </div>
        @else
            <div class='container'>
                <h5>Create Staff</h5>
            </div>
        @endif
        <div class="row">
            <div class="offset-3 col-6">
                <div class="form-group">
                    <label for="name">Staff Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="@if (isset($request->id)) {{ $staff->name }} @endif" placeholder="name..." required
                        pattern="[A-Za-z ]+" minlength="2" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="age">PassWord</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="@if (isset($request->id)) {{ $staff->password }} @endif" placeholder="password..."
                        required pattern="[A-Za-z-0-9]+" minlength="6" maxlength="6">
                </div>
                @if (!isset($request->id))
                    <div class="form-group">
                        <label for="cccd">CCCD</label>
                        <input type="text" class="form-control" id="cccd" name="cccd"
                            value="@if (isset($request->id)) {{ $staff->cccd }} @endif" placeholder="cccd..."
                            required pattern="[0-9]+" minlength="12" maxlength="12">
                    </div>
                @endif
                <div class="form-group">
                    <label for="limit">Limit</label>
                    <input type="number" class="form-control" id="limit" name="limit"
                        value="@if (isset($request->id)) {{ $staff->limitt }} @endif" placeholder="100-100000 $"
                        required min="10" max="100000">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-3 col-6">
                @if ($request->action == 'create')
                    <button class="btn btn-primary">Create</button>
                @else
                    <button class="btn btn-primary">Update</button>
                @endif
            </div>
        </div>
    </form>
    <a class="btn btn-outline-success" href="/Staff">Return</a>
@endsection

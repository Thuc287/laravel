@extends('layout/admin')
@section('content')
<div style="text-align: center;">
    <h3>Result Management</h3>
</div>
<form method="post"
    action="@if ($request->action == 'update') {{ url('Result/update?game=' . $request->game . '&period=' . $request->period) }}
 @elseif ($request->action == 'create')
   {{ url('Result/create?game=' . $request->game) }} @endif ">
    {{ csrf_field() }}
    @if ($request->action == 'update')
        <div class='container'>
            <h5>Update Result</h5>
        </div>
    @elseif ($request->action == 'create')
        <div class='container'>
            <h5>Create Result</h5>
        </div>
    @endif
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
                <label for="result">Result</label>
                <input type="number" class="form-control" id="result" name="result" value="@if($request->action=='update'){{$Result->result}}@endif"
                    required @if ($request->game=='f99') placeholder="10 - 99" min="10" max="99" @else
                    placeholder="100 - 999" min="100" max="999" @endif>

            </div>
            <div class="form-group">
                <label for="prize">Prize</label>
                <input type="number" class="form-control" id="prize" name="prize" value="@if($request->action=='update'){{$Result->prize}}@endif"
                    placeholder="10000 - 100000" required min="10000" max="100000">
            </div>


        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
            @if ($request->action == "insert")
            <button class="btn btn-outline-primary">Create</button>
            @else
            <button class="btn btn-outline-primary">Update</button>
            @endif
        </div>
    </div>
</form>

<a class="btn btn-outline-success" href="/Result">Return</a>
@endsection

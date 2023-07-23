@extends('layout/sell')
@section('content')
<div>
  <div class="float-start">Id :
    {{Session::get('idStaff') }}
  </div>
  <div class="float-end">Limit :
    {{Session::get('limit')}} $
  </div>
        </div><br><br>
<h4>&emsp;&emsp;&emsp;&emsp;--Reward--</h4>
<div style="text-align: center;">
    <form method="post" action="{{ route('sell.check') }}">
      {{ csrf_field() }}
    <div class="row">
        <div class="offset-3 col-6">
            <div class="form-group">
                <br><label for="id">Id Ticket</label>
                <input type="id" class="form-control" id="id" name="id" value=""
                    placeholder="id..." required pattern="[0-9]+" minlength="4" maxlength="10" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-3 col-6">
               <br> <button class="btn btn-outline-success">Test</button>
        </div>
    </div>
    </form>
</div>
@endsection

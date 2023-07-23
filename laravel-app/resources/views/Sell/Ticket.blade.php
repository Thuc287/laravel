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
<h4>&emsp;&emsp;&emsp;&emsp;--Ticket--</h4>
<div  style="text-align: center;"  class="container">
    <h5>Game :
      {{$ticket->game}}
    </h5>
    <h5>Id :
      {{$ticket->id}}
    </h5>
    <h5>Period :
      {{$ticket->period}}
    </h5>
    <h5>Number :
      {{$ticket->number}}
    </h5>
</div>
<div class="float-end">
<br><a class="btn btn-outline-success" href="{{ route('sell.main') }}">Close</a>
</div>
@endsection

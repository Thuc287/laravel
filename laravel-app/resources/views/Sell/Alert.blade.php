@extends('layout/sell')
@section('content')
<br><br><br>
<div style="text-align: center;" class='alert'>
 <h5>Ticket Id: {{ $id }}</h5><br>
 <h5>{{ $conten }}</h5>
</div>
<div style="text-align: right;" >
  <br><a class="btn btn-outline-success " href="{{ route('sell.reward') }}">Exit</a>
</div>
@endsection

@extends('layout/sell')
@section('content')

<div>
          <div class="float-start">Id :
            {{Session::get('idStaff')}}
          </div>
          <div class="float-end">Limit :
            {{Session::get('limit')}} $
          </div>
        </div><br><br>
<div class="selec" style="text-align: center;">
    <h5>Choose Game</h5><br>
<a class="btn btn-outline-secondary" href="{{ route('sell.buy',['game'=>'f99']) }}"><img src="{{ asset('img/logo1.png') }}" style="height:100px ;"><br>10 - 99</a>&emsp;&emsp;&emsp;&emsp;&emsp;
<a class="btn btn-outline-secondary" href="{{ route('sell.buy',['game'=>'f999']) }}"><img src="{{ asset('img/img9.png') }}" style="height:100px ;"><br>100 - 999</a><br><br>
<a class="btn btn-outline-secondary" href="{{ route('sell.reward') }}">Reward</a><br>
</div>
 @if(SESSION::get('buy')!=0 || SESSION::get('reward')!=0)
  <a class="btn btn-outline-success" href="{{ route('sell.bill') }}">Bill</a>
@endif<br>
@endsection

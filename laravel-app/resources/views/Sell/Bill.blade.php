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
<h4>&emsp;&emsp;&emsp;&emsp;--Bill--</h4>
<div style="text-align: center;">
<h6>Date :  {{ date('d/m/Y - H:i:s')}}<br>
  <h5>Buy :
    {{ Session::get('buy')}}<br>
    {{ Session::get('buy') * 2}}&nbsp;$
  </h5>
  <h5>Reward :
    {{ Session::get('slreward')}}<br>
    {{ Session::get('reward')}}&nbsp;$
  </h5>


  @if ($bill >= 0)
    <h5> Tiền thu khách hàng :
      {{ $bill }}&nbsp;$
    </h5>
  @else
    <h5> Thanh toán :
      {{ abs($bill)}}&nbsp;$
    </h5>
  @endif
  </div>
  <div class="float-end">
  <br><a class="btn btn-outline-success " href="{{ route('sell.deleteBill') }}">Xuất bill</a>
</div>
@endsection

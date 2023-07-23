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
<h4>&emsp;&emsp;&emsp;&emsp;--Report--</h4>
<div style="text-align: center;" class="container">
<h6>Date :  {{date('d/m/Y - H:i:s')}}<br>
  <h5>Sell :
    {{ SESSION::get('report_Buy')}}<br>
    {{ SESSION::get('report_Buy') * 2}}&nbsp;$
  </h5>
  <h5>Reward :
    {{ SESSION::get('report_slreward')}}<br>
    {{ SESSION::get('report_Reward')}}&nbsp;$
  </h5>

  <h5> Rose :  {{ $rose}} &nbsp;$</h5>
</div>
@endsection

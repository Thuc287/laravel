@extends('layout/sell')
@section('content')
<div id="table">
@if ($game=='f99')
  <div style="text-align: center;"><h5>F - 99</h5></div>
@else
  <div style="text-align: center;"><h5>F - 999</h5></div>
@endif
<table class="table table-hover">
    <thead class="text-center">
        <tr>
            <th>Period</th>
            <th>Result</th>
            <th>Prize</th>
        </tr>
    </thead>
<tbody class="text-center">
        @foreach ($result as $result)
            <tr>
                <td>
                    {{ $result->period}}
                </td>
                <td>
                    {{ $result->result}}
                </td>
                <td>
                    {{ $result->prize }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        </div>
@endsection

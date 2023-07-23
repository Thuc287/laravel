@extends('layout/app')
@section('title', 'Dashboard - Quản Lý Nhân Sự Tổng Trạm')
@section('bigTitle', 'DASHBOARD')
@section('content')
    <h3>Đây là trang Dashboard của phần mềm Quản Lý Nhân Sự Tổng Trạm</h3>
    <h4>Trang Dashboard là trang mặc định của phần mềm, tương tự trang chủ website</h4>

    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>Id</th>
                <th>Number</th>
                <th>Game</th>
                <th>Period</th>

            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($tickets as $ticket)
                <tr>
                    <td>
                        {{$ticket->id }}
                    </td>
                    <td>
                        {{$ticket->number }}

                    </td>
                    <td>
                        {{$ticket->game }}

                    </td>
                    <td>
                        {{$ticket->period }}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

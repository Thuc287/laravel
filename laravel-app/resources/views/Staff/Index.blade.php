@extends('layout/admin')
@section('content')
    <div style="text-align: center;">
        <h3>Staff Management</h3>
    </div>
    <div class="row grid-demo">
        <div class="container col-md-5">
            <form method="GET">
                <nav class="d-flex flex-wrap">
                    <label for="id">
                        <h5 style="margin-top: 3px;" class="">&emsp;&ensp;Id&ensp;</h5>
                    </label>
                    <input type="number" style="width: 150px;" class="form-control" name="id" placeholder="Id..."
                        required min="1000">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </nav>
            </form>
        </div>
        <div style="margin-top: 10px;" class=" col-md-6">
            @if (!isset($request->id))
                <h5>Quantity : &ensp;{{ $total_records }} </h5>
            @endif
        </div>
    </div>
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>Id</th>
                <th>Staff Name</th>
                <th>Password</th>
                <th>Limit</th>
                <th>Rose</th>
                <th>CCCD</th>
                <th></th>
                <th><a class="btn btn-outline-success" href="Staff/edit">Create</a></th>
                <th></th>
            </tr>
        </thead>

        <tbody class="text-center">
            @foreach ($staffs as $staff)
                <tr>
                    <td>
                        {{ $staff->id }}
                    </td>
                    <td>
                        {{ $staff->name }}
                    </td>
                    <td>
                        {{ $staff->password }}
                    </td>
                    <td>
                        {{ $staff->limitt }}
                    </td>
                    <td>
                        {{ $staff->rose }}
                    </td>
                    <td>
                        {{ $staff->cccd }}
                    </td>
                    <td><a class="btn btn-outline-primary"
                            href="Staff/pay?rose={{ $staff->rose }}&id={{ $staff->id }}">Pay</a></td>
                    <td><a class="btn btn-outline-warning" href="Staff/edit?id={{ $staff->id }}">Update</a></td>
                    <td><a onclick="return confirm('Bạn có chắc muốn xoá không?');" class="btn btn-outline-danger"
                            href="Staff/delete?id={{ $staff->id }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center;">
        {{-- nếu current_page > 1 và total_page > 1 mới hiển thị nút prev --}}
        @if ($current_page > 1 && $total_page > 1)
            <a href="Staff?page='.{{ $current_page - 1 }}.'">Prev</a> -

            {{-- Lặp khoảng giữa --}}
            @for ($i = 1; $i <= $total_page; $i++)
                {{-- // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a --}}
                @if ($i == $current_page)
                    <span>'.{{ $i }}.'</span> -
                @else
                    <a href="Staff?page='.{{ $i }}.'">'.{{ $i }}.'</a> -
                @endif
            @endfor

            {{-- // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev --}}
            @if ($current_page < $total_page && $total_page > 1)
                <a href="Staff?page='.{{ $current_page + 1 }}.'">Next</a>
            @endif
        @endif
    </div>
    @if (isset($request->id))
        <a class="btn btn-outline-success" href="Staff">Return</a>
    @endif
@endsection

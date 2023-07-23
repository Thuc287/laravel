@extends('layout/admin')
@section('content')
    <div style="text-align: center;">
        <h3>Result Management</h3>
    </div>
    <div class="row grid-demo">
        <div class="container col-md-6">
            <div style="text-align: center;">
                <h4>F - 99</h4>
            </div>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Period</th>
                        <th>Result</th>
                        <th>Prize</th>
                        <th><a class="btn btn-outline-success" href="/Result/edit?action=create&game=f99">Create</a></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($f99 as $result)
                        <tr>
                            <td>
                                {{ $result->period }}
                            </td>
                            <td>
                                {{ $result->result }}
                            </td>
                            <td>
                                {{ $result->prize }}
                            </td>
                            <td><a class="btn btn-outline-warning"
                                    href="/Result/edit?action=update&game=f99&period={{$result->period}}">Update</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="container col-md-6">
            <div style="text-align: center;">
                <h4>F - 999</h4>
            </div>
            <table class="table table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Period</th>
                        <th>Result</th>
                        <th>Prize</th>
                        <th><a class="btn btn-outline-success" href="/Result/edit?action=create&game=f999">Create</a></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($f999 as $result)
                        <tr>
                            <td>
                                {{ $result->period }}
                            </td>
                            <td>
                                {{ $result->result }}
                            </td>
                            <td>
                                {{ $result->prize }}
                            </td>
                            <td><a class="btn btn-outline-warning"
                                    href="/Result/edit?action=update&game=f999&period={{ $result->period }}">Update</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

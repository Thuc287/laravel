@extends('layout/admin')
@section('content')

    <div style="text-align: center;">
        <h3>Ticket Management</h3>
    </div>
    <div class="row grid-demo">
        <div class="container col-md-5">
            <form method="GET">
                <nav class="d-flex flex-wrap">
                    <label for="game">
                        <h5 style="margin-top: 3px;" class="">Game&ensp;</h5>
                    </label>
                    <select class="form-select" style="width: 150px;" name="game">
                        <option value="all">All</option>
                        <option value="F99">F99</option>
                        <option value="F999">F999</option>
                    </select>
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </nav>
            </form>
            <br>
            @if (isset($request->game) || isset($request->period))
            <form method="GET">
                <nav class="d-flex flex-wrap">
                    <label for="period">
                        <h5 style="margin-top: 3px;" class="">&emsp;&ensp;Period&ensp;</h5>
                    </label>
                    @if (isset($request->game) || isset($request->period))
                        <input type="text" class="collapse" name="game" value="{{$request->game}}">
                        <select class="form-select" style="width: 150px;" name="period">
                            <option value="all">All</option>
                            @foreach ($period as $period)
                                <option value="{{ $period->period }}">{{ $period->period }}</option>
                            @endforeach
                            <option value="{{ $period->period + 1 }}"> {{ $period->period + 1 }}</option>
                        </select>
                        <input type="text" class="collapse">
                    @endif
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </nav>
            </form>
            @endif
        </div>
        <div style="margin-top: 10px;" class=" col-md-6">

            <?php if (isset($request->game) || isset($request->period)) { ?>
            <div>
                <h5>Game : &ensp;
                    <?php echo $_GET['game']; ?>
                </h5>
            </div>
            <?php } else { ?>
            <div>
                <h5>Game : &ensp;All</h5>
            </div>
            <?php } ?>
            <div>
                <?php if (isset($_GET['period'])) { ?>
                <h5>Period : &ensp;
                    <?php echo $_GET['period']; ?>
                </h5>
                <?php } ?>
                <h6>Quantity&ensp; : &ensp;
                    <?php echo $total_records; ?>
                </h6>
            </div>
        </div>
    </div>

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
                        {{ $ticket->id }}
                    </td>
                    <td>
                        {{ $ticket->number }}
                    </td>
                    <td>
                        {{ $ticket->game }}
                    </td>
                    <td>
                        {{ $ticket->period }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center;">


         {{-- nếu current_page > 1 và total_page > 1 mới hiển thị nút prev --}}
        @if ($current_page > 1 && $total_page > 1)
           @if (isset($request->game) || isset($request->period))
            <a href="/Ticket?game={{$ticket->game}}&page={{$current_page - 1}}">Prev</a> -
            @else
            <a href="/Ticket?page={{$current_page - 1}}">Prev</a> -
            @endif
        @endif

     {{-- Lặp khoảng giữa --}}
        @for ($i = 1; $i <= $total_page; $i++)
             {{-- Nếu là trang hiện tại thì hiển thị thẻ span ngược lại hiển thị thẻ a --}}
            @if ($i == $current_page)
                <span> {{ $i }} </span> -
            @else
                @if (isset($request->game) || isset($request->period))
                <a href="/Ticket?game={{ $ticket->game }}&page={{ $i }}">{{$i}}</a> -
                @else
                <a href="/Ticket?page={{$i}} ">{{ $i}} </a> -
                @endif
            @endif
        @endfor
         {{-- nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev --}}
        @if ($current_page < $total_page && $total_page > 1)
            @if (isset($request->game) || isset($request->period))
        <a href="/Ticket?game={{ $ticket->game }}&page={{ $current_page + 1 }}">Next</a>
            @else
        <a href="/Ticket?page={{ ($current_page + 1) }}">Next</a>
            @endif
        @endif
    </div>
    @if (isset($request->game) || isset($request->period))
    <a class="btn btn-outline-success" href="/Ticket">Return</a>
    @endif
@endsection

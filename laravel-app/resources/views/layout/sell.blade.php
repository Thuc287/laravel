<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
    <script type="text/javascript">
        function room(img) {
            setInterval(function() {
                var img1 = document.getElementById(img);
                img1.style.height = '250px';
            }, 500);
            setInterval(function() {
                var img1 = document.getElementById(img);
                img1.style.height = '230px';
            }, 1000)
        }
        room('img1');
        room('img2');
    </script>
    <title>Nguyễn Xuân Thức - WD1301</title>
</head>

<body>
    <section class=" ">
        <div class="header">
            <div class="container">
                <div class="row grid-demo">

                    <div class="col-md-2">
                        <img src="{{ asset('img/img10.png') }}" style="width:150px">
                    </div>
                    <div style=" margin-top: 110px;" class="col-md-2">
                        <div style=" display: inline">

                            @if (Session::get('buy') == 0 && Session::get('reward') == 0)
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                Result
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('sell.result',['game'=>'f99']) }}">F-99</a></li>
                                <li><a class="dropdown-item" href="{{ route('sell.result',['game'=>'f999']) }}">F-999</a></li>
                            </ul>
                            <a class="btn" href="{{ route('sell.main') }}">Sell</a>
                            @else
                            <a class=" dropdown-toggle ">Result</a>&emsp;
                            <a class="">Sell</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 "><br>
                        <div style="text-align:center;">
                            <h1>-- Elective Lottery --</h1>
                            <p>- Cơ hội để tốt hơn -</p>
                        </div>
                    </div>
                    <div id="tt" class="col-md-4">
                        <div style="text-align:right">
                            0378665580
                        </div>
                        <div style="text-align:center;margin-top: 90px">
                            @if (Session::get('buy') == 0 && Session::get('reward') == 0)
                            <a class="" href="{{ route('sell.report') }}">Report</a>&emsp;
                            <a class="" href="{{ route('sell.showLogout') }}">Log Out</a>
                            @else
                            <a class=" ">Report</a>&emsp;
                            <a class="">Log Out</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grid-demo">
            <div id="tt" style="text-align:center;" class="col-md-3">
                <br>
                <h5>F - 99</h5>
                <h6>Kì hiện tại :
                    {{ Session::get('periodF99') }}
                </h6>
                <h5>
                    {{ Session::get('resultF99') }}
                </h5>
                <img id="img1" src="{{ asset('img/img1.png') }}" style="height:230px ;" alt="">

            </div>

            <div class="col-md-6">
                <div class="sell">

                    @yield('content')

                    <br><a class="btn btn-outline-success" href="{{ route('sell.main') }}">Home</a>
                </div>
            </div>
            <div style="text-align: center;" id="tt" class="col-md-3">
                <br>
                <h5>F - 999</h5>
                <h6>Kì hiện tại :
                    {{ Session::get('periodF999') }}

                </h6>
                <h5>
                    {{ Session::get('resultF999') }}

                </h5>
                <img id="img2" src="{{ asset('img/img2.png') }}" style="height:230px ;" alt="">
            </div>
        </div>
        <div class="fooder">

            <div id="fooder" style="text-align: center;" class="row grid-demo">
                <div class="col-md-3">
                    <img src="{{ asset('img/img3.jpg') }}"><br><br>
                    <img src="{{ asset('img/img7.jpg') }}" style="width:200px; height:50px">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/img4.jpg') }}"><br><br>
                    <img src="{{ asset('img/img5.jpg') }}"><br><br>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/img8.jpg') }}"><br><br>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/img3.jpg') }}"><br><br>
                    <img src="{{ asset('img/img3.jpg') }}"><br><br>
                </div>
            </div>
        </div>
    </section>

</body>

<html lang="vi">


<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <title>Nguyễn Xuân Thức - WD1301</title>
</head>

<body>
  <section  class="">
<div class="header">
  <div class="container">
    <div class="row grid-demo">
      <div id="tt" class="col-md-4">
        <img src="{{ asset('img/img10.png') }}" style="width:100px ;" alt=""><br>
        <div style="text-align: center;">
        <a class="btn btn-outline-light text-dark"  href="{{ route('staff.index') }}">Staff</a>
  <a class="btn btn-outline-light text-dark"  href="{{ route('ticket.index') }}">Ticket</a>
  <a class="btn btn-outline-light text-dark" href="{{ route('result.index') }}">Result</a>
      </div>
</div>
      <div class="col-md-4 " style="text-align:center;"><br>
        <h1>-- Elective Lottery --</h1>
        <p>- Cơ hội để tốt hơn -</p>
      </div>
      <div id="tt" class="col-md-4">
        <div style="text-align:right">
          <a href="">0378665580</a>
        </div><br><br><br>
        <div style="text-align: center;">
        <a class="btn btn-outline-light text-dark" style="text-align: center;"  onclick="return confirm('Bạn có chắc muốn out không?');" href="/index.php">Log_out</a>
      </div>
</div>
    </div>
  </div>
</div>
<div class="row grid-demo">
<div  class="col-md-2">
<img src="{{ asset('img/img3.png') }}" style="height:480px ;" alt="">
</div>
<div class="col-md-8">

    @yield('content')

  </div>
  <div  class="col-md-2"><br>
  <img src="{{ asset('img/img6.jpg') }}" style="height:460px ;" alt="">
  </div>
  </div>



  </section>

  </body>

  <html lang="vi">

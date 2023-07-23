<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>
    @yield('title')
  </title>
</head>
<body>
  <table style="width:100%; border: 0;">
    <tr>
        <th style="width:20%;">
            <h2>Tổng Trạm<br > HOÀNG HOA THÁM</h2></th>
        <th style="width:80%;">
            <h2>QUẢN LÝ NHÂN SỰ TỔNG TRẠM</h2></th>
    </tr>
    <tr>
        <td style="height:650px; vertical-align: top;">
            <h3>Menu</h3>
            <!--chèn menu chổ này-->
        </td>
        <td style="vertical-align: top;">
            <h2>@yield('bigTitle')</h2>
            <div>
              @yield('content')
            </div>
        </td>
    </tr>
    <tr>
        <td>UBM Co., Ltd</td>
        <td>Training Laravel phần 3</td>
    </tr>
</table>
</body>
</html>

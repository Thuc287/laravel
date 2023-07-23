<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .body {
      background-color: rgba(0, 0, 0, 0.92);
      height: 300px;
      padding: 20px;
      color: white;
      margin-top: 50px;
      border-radius: 5%;
    }
  </style>
  <title>Nguyễn Xuân Thức - WD1301</title>
</head>
<body>
  <section class="container pt-5">
    <div class="row grid-demo">
      <div class="col-md-4"> </div>
      <div class="col-md-4">
        <div class='body'>
          <div style="text-align: center;">
            @if ($role == 'Admin')
            <h3>Log In Admin</h3>
            @else
            <h3>Log In Staff</h3>
            @endif
            <br>
            <form method="POST" action=" @if ($role == 'Admin')
  {{route('login.admin')}}
 @else
  {{route('login.staff')}}
 @endif" >
 {{ csrf_field() }}
              <div class="offset-3 col-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="id" name="id" value="" placeholder="id..." required
                    pattern="[0-9]+" minlength="4" maxlength="6">
                </div><br>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" value=""
                    placeholder="password..." required pattern="[0-9]+" minlength="6" maxlength="6">
                </div>
              </div>
              <div class="row">
                <div class="offset-3 col-6"><br>
                  <button class="btn btn-primary">Log In</button>
                </div>
              </div>
            </form>
          </div>
          <a class="btn btn-success" href="/">Exit</a>
        </div>
      </div>
      <div class="col-md-4"> </div>
    </div>
  </section>

</body>
<html lang="vi">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('../public/back-end/login/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('../public/back-end/login/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
</head>

<body class="" style="background-color: #f4f3ef;">
  <div class="container">
    <div class="content outer">
      <div class="row middle">
        <div class="col-md-4 mx-auto">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title text-center">Authentication</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-8 mx-auto">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Username" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8 mx-auto">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Password" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('../public/back-end/login/assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('../public/back-end/login/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('../public/back-end/login/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('../public/back-end/login/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('../public/back-end/login/assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('../public/back-end/login/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('../public/back-end/login/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('../public/back-end/login/assets/demo/demo.js') }}"></script>
</body>

</html>

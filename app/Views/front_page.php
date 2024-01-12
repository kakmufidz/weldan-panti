<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <!-- <link rel="icon" href="<?= base_url() ?>assets/images/favicon-32x32.png" type="image/png" /> -->
  <!--plugins-->
  <link href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?= base_url() ?>assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet">
  <title>Sistem Panti</title>
</head>

<body class="bg-lock-screen">
  <!--wrapper-->
  <div class="wrapper">
    <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
      <div class="card shadow-none bg-transparent">
        <div class="card-body p-md-5 text-center">
          <h2 class="text-white"><span id="clock">00:00:00</span> WIB</h2>
          <h5 class="text-white"><?= hari_ini() . ", " . tgl_indo(date("Y-m-d")) ?></h5>
          <div class="">
            <img src="assets/images/icons/user.png" class="mt-5" width="120" alt="" />
          </div>
          <p class="mt-2 text-white">Administrator</p>
          <form id="form-login">
            <div class="mb-3 mt-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
            </div>
            <div class="mb-3 mt-3">
              <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0" id="password" name="password" value="" placeholder="Masukan Password"> <a href="javascript:;" class="input-group-text"><i class='bx bx-hide'></i></a>
              </div>
              <div id="error-login" class="invalid-feedback"></div>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-white" id="login"><i class="bx bxs-lock-open"></i>Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--end wrapper-->
  <!-- Bootstrap JS -->
  <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <!--Password show & hide js -->
  <script>
    function signin(event) {
      var formdata = new FormData($('#form-login')[0]);
      Pace.restart()
      $.ajax({
        url: '<?= base_url() ?>auth/login',
        type: 'POST',
        data: formdata,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(result) {
          if (result.error) {
            $("#error-login").html(result.error);
            $("#error-login").show();
            Pace.done()
          } else {
            window.location.href = "<?= base_url() ?>dashboard";
          }
        },
        error: function(result) {
          // alert(result);
        }
      });
    }

    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });

      $('#form-login').on('submit', function(evt) {
        evt.preventDefault();
        var event = 'dropdown';
        signin(event);
      });

      // Function to update the clock
      function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Add leading zero if the digit is less than 10
        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        // Display the time in the #clock element
        $('#clock').text(hours + ":" + minutes + ":" + seconds);
      }

      // Update the clock every second
      setInterval(updateClock, 1000);

      // Initial call to display the clock immediately
      updateClock();
    });
  </script>
  <!--app JS-->
  <script src="<?= base_url() ?>assets/js/app.js"></script>
</body>

</html>
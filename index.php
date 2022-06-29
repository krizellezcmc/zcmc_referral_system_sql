
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Hospital Referral System</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="d-flex justify-content-center" style="margin: 100px">
      <div class="container shadow-sm rounded w-auto">
        <div class="content p-5">
          <form id="login">
          
          <div class="text-center mb-5">
             <div class="title fs-3 ">LOGIN</div>
            <div class="fs-6 lead text-uppercase">Hospital Referral System</div>
          </div>
           
            
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="text" class="form-control" id="email" required />
              <div id="emailHelp" class="form-text">
                We'll never share your email with anyone else.
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                required
              />
            </div>

            <button type="submit" class="btn btn-success mt-3 w-100 p-2">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap CDN -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="js/sweetalert2.all.min.js"></script>

    <!-- Send data API -->
    <script>
      $("#login").submit(function (event) {
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "server/login.php",
          data: {
            email: $("#email").val(),
            password: $("#password").val(),
          },
          success: function (response) {
            var result = jQuery.parseJSON(response);
            if(result.res === 'yes') {
              if(result.role == 'admin') {
                window.location.href = "admin/";
              } else {
                window.location.href = "user/";
              }
            } else if(result.res == 'invalid') {
              Swal.fire(
                  'Invalid password!',
                  'Invalid password. Please try again!',
                  'error'
                )
            } else {
              Swal.fire(
                  'Email does not exis!',
                  'Please try again!',
                  'error'
                )
            }
          },
        });
      });
    </script>
  </body>
</html>

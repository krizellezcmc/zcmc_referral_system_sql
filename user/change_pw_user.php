<?php
    session_start();

    $permission = $_SESSION['auth'];
    $access = $_SESSION['role'];
 
    if($permission == 1){
        echo "";
    } else {
       header("location: ./");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password | Hospital Referral System</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/login.css" />
  </head>
  <body>
    <div class="d-flex justify-content-center mt-5">
      <div class="container shadow-sm w-50">
        <div class="content p-5">
          <form id="changePass">
            <div class="title fs-3 mb-4 text-center">Change Password</div>
            <div
              class="alert alert-danger py-2 mb-4 d-none"
              id="errorMessage"
              role="alert"
            >
              <small>This is a danger alert—check it out!</small>
            </div>
            <div class="mb-3">
              <label class="form-label">Current Password</label>
              <input
                type="password"
                class="form-control"
                id="currentPass"
                required
               
              />
              <div id="emailHelp" class="form-text text-sedondary">
                Please enter your current password.
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input
                type="password"
                class="form-control"
                id="newPass"
                minlength="8"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm New Password</label>
              <input
                type="password"
                class="form-control"
                id="confirmPass"
                minlength="8"
                required
              />
            </div>
            <button type="submit" class="btn btn-success mt-3 w-100 p-2">
              Change password
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="../js/sweetalert2.all.min.js"></script>

    <!-- Send data API -->
    <script>
      $("#changePass").submit(function (event) {
        event.preventDefault();

        console.log(<?php $_SESSION['userId']; ?>)

        var confirmPass = $("#confirmPass").val();
        var newPass = $("#newPass").val();

        if (newPass == confirmPass) {
          $.ajax({
            type: "POST",
            url: "../server/change_pass.php",
            data: {
              current: $("#currentPass").val(),
              new: $("#newPass").val(),
            },
            success: function (response) {
            if(response == 1) {
              Swal.fire(
                "Success!",
                "Password changed!",
                "success"
              ).then(
                function () {
                  window.location = "index.php";
                }
              );
            } else {
              Swal.fire(
                "Password not matched!",
                "Unable to change password. Please try again!",
                "error"
              );
            }
            },
          });
        } else {
          Swal.fire(
            "Password not matched!",
            "Unable to change password. Please try again!",
            "error"
          );
        }
      });
    </script>
  </body>
</html>

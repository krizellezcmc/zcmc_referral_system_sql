<?php

  require_once '../server/config.php';
  include 'auth.php';
  
  //Select Collection
  $collection = $db->hospital_name;

  $filter  = [];
  $options = ['sort' => ['name' => 1]];
  $all = $collection->find($filter, $options);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../fonts/icomoon/style.css" />

    <link rel="stylesheet" href="../css/owl.carousel.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form-style.css" />
    <link rel="icon" type="image/png" href="../images/zcmc.png" />
    <title>ZCMC Hospital Referral System</title>
  </head>
  <body>
    <aside class="sidebar">
      <div class="toggle">
        <a
          href="#"
          class="burger js-menu-toggle"
          data-toggle="collapse"
          data-target="#main-navbar"
        >
          <span></span>
        </a>
      </div>

      <div class="side-inner">
        <div class="profile">
          <img src="../images/admin.png" alt="Image" class="img-fluid" />
          <h3 class="name">ZCMC User</h3>
          <span class="country">Zamboanga City Medical Center</span>
        </div>

        <div class="nav-menu">
          <ul>
            <li class="#">
              <a href="./"><span class="icon-home mr-3"></span>Home</a>
            </li>
            <li class="#">
              <a href="add_hospital.php"
                ><span class="icon-add mr-3"></span>Add New Hospital</a
              >
            </li>
            <li class="active">
              <a href="add_user.php"
                ><span class="icon-user mr-3"></span>Add New User</a
              >
            </li>
            <li class="">
              <a href="change_pw_admin.php"
                ><span class="icon-lock mr-3"></span>Change Password</a
              >
            </li>
            <li id="">
              <a href="#" id="logout"><span class="icon-sign-out mr-3"></span>Sign out</a
              >
            </li>
          </ul>
        </div>
      </div>
    </aside>

    <main>
      <div class="site-section">
        <div class="container">
          <img
            src="../images/zcmc.png"
            style="display: block; float: left; width: 8%; margin-bottom: 20px"
          />
          <img
            src="../images/doh.png"
            style="
              display: block;
              float: right;
              width: 10%;
              margin-bottom: 20px;
            "
          />
          <div class="row justify-content-center">
            <h3
              style="
                border-bottom: 2px solid green;
                padding-bottom: 5px;
                margin-top: 25px;
                margin-bottom: 25px;
              "
            >
              Add New User
            </h3>
          </div>
          <br />
          <div class="content-form">
            <form id="addUser">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">Last Name</span>
                  <input
                    type="text"
                    id="lastName"
                    placeholder="Enter First Name"
                    required
                  />
                </div>
                <div class="input-box">
                  <span class="details">First Name</span>
                  <input
                    type="text"
                    id="firstName"
                    placeholder="Enter Last Name"
                    required
                  />
                </div>
                <div class="input-box">
                  <span class="details">Middle Name</span>
                  <input
                    type="text"
                    id="middleName"
                    placeholder="Enter Middle Name"
                    required
                  />
                </div>
                <div class="input-box">
                  <span class="details">Referring Health Facility <span style="color:red">*</span></span>
                  <select name="Referring Health Facility" id="detailHospi" required>
                    <option value="">Choose Hospital</option>
                  <?php  
                   foreach($all as $list)
                   {
                  echo "<option value='".$list['name']."'>" .$list['name']. "</option>";
                  }
                  ?>
                </select>
                </div>
                <div class="input-box">
                  <span class="details">Email Address</span>
                  <input
                    type="email"
                    id="email"
                    placeholder="Enter Email Address"
                    required
                  />
                </div>
                
                <div class="input-box"></div>
              </div>
              <div class="button">
                <input type="submit" value="Add" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- SweetAlert CDN -->
    <script src="../js/sweetalert2.all.min.js"></script>

    <!-- Send data API -->
    <script>
      $("#addUser").submit(function (event) {
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "../server/add_user.php",
          data: {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            middleName: $("#middleName").val(),
            hospital: $("#detailHospi").val(),
            email: $("#email").val(),
          },
          success: function (response) {
            if (response != 0) {
              Swal.fire("Record updated!", "New user added.", "success").then(
                function () {
                  window.location = "add_user.php";
                }
              );
            } else {
              Swal.fire("Error!", "Error occured. Please try again!", "error");
            }
          },
        });
      });

      $("#logout").on("click", function () {
        Swal.fire({
          title: "Do you want to logout?",
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: "Yes",
          denyButtonText: `No`,
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "../server/logout.php";
          } else if (result.isDenied) {
          }
        });
      });
    </script>
  </body>
</html>

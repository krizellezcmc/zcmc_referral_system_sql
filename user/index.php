<?php

  require_once '../server/config.php';
  include './auth_USER.php';
   
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
          <img src="../images/user.png" alt="Image" class="img-fluid" />
          <h3 class="name">Hi, <?php echo json_decode($_SESSION['name']); ?>!</h3>
          <span class="country"><?php echo $_SESSION['hospital']?></span>
        </div>

        <div class="nav-menu">
          <ul>
            <li class="active">
              <a href=""><span class="icon-home mr-3"></span>Home</a>
            </li>
            <li class="">
              <a href="change_pw_user.php"
                ><span class="icon-lock mr-3"></span>Change Password</a
              >
            </li>
            <li>
              <a href="#" id="logout"><span class="icon-sign-out mr-3"></span>Sign out</a>
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
              "
            >
              ZCMC Hospital Referral System
            </h3>
            <br />
          </div>
          <div class="content-form">
            <br />
            <br />
            <form name="google-sheet">
                <input name="Timestamp" id="cTime" style="display: none" />
                <h4 style="margin-top: 20px">PATIENT INFORMATION</h4>


                <input type="hidden" value="<?php echo $_SESSION['hospital']?>" name="Referring Health Facility">
                <input type="hidden" name="Full Name" value="<?php echo json_decode($_SESSION['name'])?>">

                <div class="user-details" style="margin-top: 40px">
                  <div class="input-box">
                    <span class="details">Last Name <span style="color:red">*</span></span>
                    <input
                      type="text"
                      name="Last Name of Patient"
                      placeholder="Enter Patient's Last Name"
                      required
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">First Name <span style="color:red">*</span></span>
                    <input
                      type="text"
                      name="First Name of Patient"
                      placeholder="Enter Patient's First Name"
                      required
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">Middle Name</span>
                    <input
                      type="text"
                      name="Middle Name of Patient"
                      placeholder="Enter Patient's Middle Name"
                    />
                  </div>

                  <div class="input-box" style="width: 100px">
                    <span class="details">Suffix Name</span>
                    <input
                      type="text"
                      name="Extended Name of Patient"
                      placeholder=""
                    />
                  </div>

                  <div class="input-box" style="width: 100px">
                    <span class="details">Age</span>
                    <input type="number" name="Age" placeholder="" />
                  </div>

                  <div class="input-box" style="width: 150px">
                    <span class="details">Civil Status</span>
                    <select name="Civil Status">
                      <option value="">Choose</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Separated">Separated</option>
                      <option value="Widow(er)">Widow(er)</option>
                    </select>
                  </div>

                  <div class="input-box" style="width: 200px">
                    <span class="details">Nationality</span>
                    <input
                      type="text"
                      name="Nationality"
                      placeholder="Filipino or Other..."
                    />
                  </div>

                  <div class="input-box" style="width: 200px">
                    <span class="details">Religion</span>
                    <select name="Religion">
                      <option value="">Choose</option>
                      <option value="Roman Catholic">Roman Catholic</option>
                      <option value="Islam">Islam</option>
                      <option value="Protestant">Protestant</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <span class="details">Occupation</span>
                    <input type="text" name="Occupation" placeholder="" />
                  </div>

                  <div class="input-box">
                    <span class="details">PhilHealth MDR</span>
                    <input type="text" name="Philhealth MDR" placeholder="" />
                  </div>

                  <div class="input-box">
                    <span class="details">Address</span>
                    <textarea name="Address" placeholder=""></textarea>
                  </div>
                </div>

                <div class="details">
                  <div class="gender-details">
                    <input type="radio" name="Sex" id="dot-1" value="Male" />
                    <input type="radio" name="Sex" id="dot-2" value="Female" />
                    <input
                      type="radio"
                      name="Sex"
                      id="dot-3"
                      value="Prefer not to say"
                    />
                    <span class="label-title">Sex</span>
                    <div class="category">
                      <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                      </label>
                      <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                      </label>
                      <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
                      </label>
                    </div>
                  </div>
                </div>
                <h4 style="margin: 30px 0">SIGNIFICANT OTHER/WATCHER(S)</h4>
               <div class="user-details">
                  <div class="input-box">
                    <span class="details">Next of Kin</span>
                    <input type="text" name="Next of Kin" placeholder="" />
                  </div>

                  <div class="input-box">
                    <span class="details">Landline/Mobile/Email</span>
                    <textarea
                      name="Landline/Mobile/Email"
                      placeholder=""
                    ></textarea>
                  </div>
                  <div class="input-box"></div>

                  <h4 style="margin: 30px 0">ADMITTING/DISCHARGE DETAILS</h4>
                  <div class="input-box"></div>
                  <div class="input-box" style="width: 200px">
                    <span class="details">Date Admitted <span style="color:red">*</span></span>
                    <input
                      type="date"
                      name="Date Admitted"
                      placeholder=""
                      required
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">Referral Type<span style="color:red">*</span></span>
                    <select name="Referral Type" required>
                      <option value="">Select Referral Type</option>
                      <option value="COVID">COVID</option>
                      <option value="NON-COVID">NON-COVID</option>
                      <option value="COVID-SUSPECT">COVID-SUSPECT</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <span class="details">Disposition <span style="color:red">*</span> </span>
                    <select name="Disposition" required>
                      <option value="">Select Disposition</option>
                      <option value="Moderate">Moderate</option>
                      <option value="Mild">Mild</option>
                      <option value="Severe">Severe</option>
                      <option value="Critical">Critical</option>
                    </select>
                  </div>

                  <div class="input-box" style="width: 120px">
                    <span class="details">Latest V/S-Temperature</span>
                    <input
                      type="text"
                      name="Latest V/S-Temperature"
                    />
                  </div>

                  <div class="input-box" style="width: 120px">
                    <span class="details">Latest V/S-Blood Pressure</span>
                    <input
                      type="text"
                      name="Latest V/S-Blood Pressure"
                    />
                  </div>

                  <div class="input-box" style="width: 120px">
                    <span class="details">Latest V/S-Respiration Rate</span>
                    <input
                      type="text"
                      name="Latest V/S-Respiration Rate"
                    />
                  </div>

                  <div class="input-box" style="width: 120px">
                    <span class="details">Latest V/S Pulse Rate</span>
                    <input
                      type="text"
                      name="Latest V/S Pulse Rate"
                    />
                  </div>

                  <div class="input-box" style="width: 150px">
                    <span class="details">Latest V/S-Oxygen Saturation</span>
                    <input
                      type="text"
                      placeholder=""
                      name="Latest V/S-Oxygen Saturation"
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">Glasgow Coma Scale</span>
                    <input
                      type="text"
                      placeholder=""
                      name="Glasgow Coma Scale"
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">Chief Complaints</span>
                    <textarea
                      name="Chief Complaints"
                      id=""
                      style="padding: 10px"
                      placeholder="Enter Chief Complaints .."
                    ></textarea>
                  </div>

                  <div class="input-box">
                    <span class="details">Diagnosis</span>
                    <textarea
                      name="Diagnosis"
                      id=""
                      style="padding: 10px"
                      placeholder="Enter Diagnosis .."
                    ></textarea>
                  </div>

                  <div class="input-box">
                    <span class="details">Endorsement/Initial Care</span>
                    <input
                      type="text"
                      placeholder="Enter Endorsement"
                      name="Endorsement/Initial Care"
                    />
                  </div>

                  <div class="input-box">
                    <span class="details">Resident on Duty/Contact #</span>
                    <input
                      type="text"
                      placeholder=""
                      name="Resident on Duty/Contact #"
                    />
                  </div>
                  
                  <div class="input-box" style="width: 200px">
                    <span class="details">Reason for Referral</span>
                    <select name="Reason for Referral">
                      <option value="">Reason for Referral</option>
                      <option value="Medical Center of Choice">Medical Center of Choice</option>
                      <option value="Upgrade of Health Care Service">Upgrade of Health Care Service</option>
                      <option value="Financial/Cost of Care">Financial/Cost of Care</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>  
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


<script>
    $("#logout").on("click", function () {
    Swal.fire({
      title: 'Do you want to logout?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Yes',
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../server/logout.php";
      } else if (result.isDenied) {}
    })
  });


  

const scriptURL =
        "https://script.google.com/macros/s/AKfycbx53JNuZyJEphUtm_igDBm0P7cUxM2961ubagbWPEWqRGTX2J83yo1yk6zMG0sCUmW3PA/exec";
      const form = document.forms["google-sheet"];

      form.addEventListener("submit", (e) => {
        e.preventDefault();
        fetch(scriptURL, { method: "POST", body: new FormData(form) })
          .then((response) => Swal.fire(
                "Success!",
                "Data added successfully.",
                "success"
              ).then(
                function () {
                  window.location = "index.php";
                }
              ))
          .catch((error) => console.error("Error!", error.message));
       
      });

      const btn = document.getElementById("btn-add");

      var today = new Date().toLocaleString("en-US", {
        timeZone: "Asia/Manila",
      });
      document.getElementById("cTime").value = today;
</script>
  </body>
</html>
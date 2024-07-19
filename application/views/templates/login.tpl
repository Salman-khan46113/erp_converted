<!DOCTYPE html>

<html
lang="en"
class="light-style customizer-hide"
dir="ltr"
data-theme="theme-default"
data-assets-path="public/assets/"
data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />

  <title>AROM - Login </title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
  />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="public/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="public/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <!-- <link rel="stylesheet" href="public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> -->
  <!-- <link rel="stylesheet" href="public/assets/css/demo.css" /> -->

  <!-- Vendors CSS -->
  <!-- <link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> -->

  <!-- Page CSS -->
  <link rel="stylesheet" href="public/css/common.css" />
  <!-- Page -->
  <link rel="stylesheet" href="public/assets/vendor/css/pages/page-auth.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
  <!-- Helpers -->
  <script src="public/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="public/assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="container text-center">
              <div class="row justify-content-center">
                <div class="col-md-auto">
                  <img src="public/img/logo.png" alt="" width="100">
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-auto">
                  <h3 class="app-brand-text demo text-body fw-bolder">AROM</h3>
                </div>
              </div>
            </div>
            <hr>
            <!-- /Logo -->
            <h4 class="mb-2 text-center">Welcome to AROM! 👋</h4>
            <p class="mb-4 text-center">Sign in to start your session</p>

            <form id="formAuthentication" class="mb-3" action="javascript:void(0)" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email or username"
                autofocus
                />
              </div>
              <div class="mb-3">
                  <label class="form-label" for="password">Password</label>

                  <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="*******"
                  autofocus
                  />
                  <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                </div>


              <%if $isMultipleClientUnits == "true" %>
              <div class="mb-3">
                <label for="clientUnit" class="form-label">Client Unit</label>

                <select name="clientUnit" id="clientId" class="form-control select2" id="client">
                  <option value="">Select Client Unit</option>
                  <%foreach from=$client_list item=cl %>
                  <option value="<%$cl->id %>"><%$cl->client_unit %></option>
                  <%/foreach%>

                </select>
              </div>
              <%/if %>


              <div class="mb-3 text-end hide">
                <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a>

              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

            <p class="text-center hide">
              <span>New on our platform?</span>
              <a href="auth-register-basic.html">
                <span>Create an account</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="public/assets/vendor/libs/popper/popper.js"></script>
  <script src="public/assets/vendor/js/bootstrap.js"></script>
  <script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="public/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="public/assets/js/main.js"></script>
<script src="public/js/login.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>

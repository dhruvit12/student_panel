
<?php
$con = mysqli_connect('localhost', 'root', '', 'jvfdbhhs_fingertips_portal');
if (!$con) {
  echo "Connection Failed!";
}
 $user_id = $_SESSION['ftip69_uid'];
 $query10 = "SELECT `user_img` FROM `user2` WHERE is_deleted = 0 AND id = $user_id;";
    $runfetch10 = mysqli_query($con, $query10);
    $noofrow10 = mysqli_num_rows($runfetch10);
    if ($noofrow10 >0 && $runfetch10 == TRUE) { while ($data10 = mysqli_fetch_assoc($runfetch10)) {
$user_img = $data10['user_img']; } } ?>

<!-- Page Header Start-->
<div class="page-main-header" id="header_row">
  <div class="main-header-right row">
    <div class="main-header-left d-lg-none">
      <div class="logo-wrapper"></div>
    </div>
    <!-- how can create div -->
   <div class="nav-right col p-0">
      <ul class="nav-menus" >
        <li class="onhover-dropdown">
          
        </li>

        <li class="onhover-dropdown">
          <div class="media align-items-center">
            <img
              class="align-self-center pull-right img-50 rounded-circle"
              src="<?php echo base_url()?>uploads/user/user-img/<?php echo $user_img; ?>"
              alt="header-user"
            />
            <div class="dotted-animation">
              <span class="animate-circle"></span
              ><span class="main-circle"></span>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div p-20">
            <li>
              <a href="<?php echo base_url()?>auth/edit-profile.php"
                ><i data-feather="user"></i> Edit Profile</a
              >
            </li>

            <li>
              <a href="<?php echo base_url()?>"
                ><i data-feather="log-out"></i> Logout</a
              >
            </li>
          </ul>
        </li>
      </ul>

      <div class="d-lg-none mobile-toggle pull-right">
        <i data-feather="more-horizontal"></i>
      </div>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">
        <div class="ProfileCard-avatar">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-airplay m-0"
          >
            <path
              d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"
            ></path>
            <polygon points="12 15 17 21 7 21 12 15"></polygon>
          </svg>
        </div>
        <div class="ProfileCard-details">
          <div class="ProfileCard-realName">
            {{name}}
          </div>
        </div>
      </div>
    </script>
    <script id="empty-template" type="text/x-handlebars-template">
      <div class="EmptyMessage">
        Your search turned up 0 results. This most likely means the backend is down, yikes!
      </div>
    </script>
  </div>
</div>

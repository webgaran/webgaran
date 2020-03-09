<?php
/* Template Name: Login */
global $user_ID;
global $wpdb;


if ( !$user_ID ) {
  if ( $_POST ) {
      $username = $wpdb->escape($_POST['username']);
      $password = $wpdb->escape($_POST['password']);
      $remember = $wpdb->escape($_POST['remember']);

      $login_array = array();
      $login_array['user_login'] = $username;
      $login_array['user_password'] = $password;
      $login_array['remember'] = $remember;

      $verify_user = wp_signon( $login_array, false );

      if ( !is_wp_error($verify_user) ) {
        echo "<script>window.location='". home_url() ."'</script>'";
      } else {
        echo 'Invalid';
      } 
    } else {
      get_header(); ?>
      <form method="post">
          <div class="form-group">
              <label for="username">Username/Email</label>
              <input class="form-control" type="text" name="username" id="username" placeholder="Username/Email">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember"> Remember me </label>
          </div>

          <input class="btn btn-primary" value="ثبت نام" type="submit" name="btnSubmit">
      </form>
      <?php get_footer(); 
    }
    }
   else { 
echo "<script>window.location='". home_url('panel') ."'</script>'";
    }?>
    


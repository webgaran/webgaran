<?php get_header();
// Template Name: Register
global $wpdb;

if ($_POST) {

    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
    }

    if (count($error) == 0) {

        wp_create_user($username, $password, $email);
        echo "User Created Successfully";
        exit();
    }else{
        
        print_r($error);
        
    }
} ?>

<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="txtUsername">نام کاربری</label>
            <input class="form-control" type="text" name="txtUsername" id="txtUsername" placeholder="نام کاربری">
        </div>
        <div class="form-group">
            <label for="txtEmail">آدرس ایمیل</label>
            <input class="form-control" type="email" name="txtEmail" id="txtEmail" placeholder="آدرس ایمیل">
        </div>
        <div class="form-group">
            <label for="txtPassword">گذرواژه</label>
            <input class="form-control" type="password" name="txtPassword" id="txtPassword" placeholder="گذرواژه خود را وارد کنید">
        </div>
        <div class="form-group">
            <label for="txtConfirmPassword">تکرار گذرواژه</label>
            <input class="form-control" type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="تکرار گذرواژه">
        </div>

        <input class="btn btn-primary" value="ثبت نام" type="submit" name="btnSubmit">
    </form>
</div>

<?php get_footer() ?>
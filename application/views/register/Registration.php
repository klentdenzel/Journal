<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css")?>">
    <title>Registration</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>Registration</h3>
                    <p>Please enter your credentials to register.</p>
                </div>
            </div>
            <?php echo form_open('register/register_process'); ?>
            <form class="login-form">
                <input type="text" class="form-control" name="name" placeholder="username" required/>
                <small><?php echo form_error('name'); ?></small>
                <input type="text" class="form-control" name="email" placeholder="email" required/>
                <small><?php echo form_error('email'); ?></small>
                <input type="password" class="form-control" name="password" placeholder="password" required/>
                <small><?php echo form_error('password'); ?></small>
                <button type="submit">Add User</button>
                <p class="message">Already have an account? <a href="login">Login here..</a></p>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</body>
</html>

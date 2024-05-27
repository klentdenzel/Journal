<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css") ?>">
    <title>Login</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>LOGIN</h3>
                    <p>Please enter your credentials to login.</p>
                    <?php echo validation_errors(); ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo form_open('login/login_process'); ?>
                <input type="text" class="form-control" name="email" placeholder="email" required />
                <small><?php echo form_error('email'); ?></small>
                <input type="password" class="form-control" name="password" placeholder="password" required />
                <small><?php echo form_error('password'); ?></small>
                <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div>
                <button type="submit">login</button>
                <p class="message">Not registered? <a href="<?php echo site_url('registration'); ?>">Create an account</a></p>
            <?php echo form_close(); ?>
        </div>
    </div>
</body>
</html>

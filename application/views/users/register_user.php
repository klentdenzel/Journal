<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 700px;
        }
        .form-container h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .form-container .message {
            text-align: center;
        }
        .form-container .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form-container .message a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        .success {
            color: green;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="form-container">
            <h3>Add User</h3>
            <p>Please enter your credentials to register.</p>
            <?php echo form_open_multipart('new_user_post'); ?> <!-- Ensure form enctype is set to multipart/form-data -->
        
                <input type="text" class="form-control" name="name" placeholder="username" required/>
                <small><?php echo form_error('name'); ?></small>

                <input type="text" class="form-control" name="email" placeholder="email" required/>
                <small><?php echo form_error('email'); ?></small>
                
                <input type="password" class="form-control" name="password" placeholder="password" required/>
                <small><?php echo form_error('password'); ?></small><br>

                <input type="file" name="image" required />
                <small class="error"><?php echo isset($imageError) ? $imageError : ''; ?></small> <!-- Display image upload error if exists -->

                <button type="submit">Add User</button>
                <p class="message">Click here to go back to  <a href="users">Users</a></p>
            <?php echo form_close(); ?>
    </div>
</body>
</html>



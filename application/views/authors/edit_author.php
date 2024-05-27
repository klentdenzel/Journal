<!DOCTYPE html>
<html>
<head>
    <title>Edit Author</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <div class="card shadow text-center">
            <div class="card-body">
                <h2>Author Details</h2>
            </div>
        </div>
        <div class="form-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <?php echo form_open_multipart('authors_update'); ?>
                                <input type="hidden" name="audid" value="<?php echo $author['audid']; ?>">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Profile Picture</th>
                                            <th>Complete Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="<?php echo base_url('uploads/authors/' . $author['image']); ?>" class="profile-pic" width="100" height="100" alt="Profile Picture">
                                                <input type="file" name="image"/>
                                                <small class="error"><?php echo isset($imageError) ? $imageError : ''; ?></small>
                                            </td>
                                            <td>
                                                <input type="text" name="author_name" value="<?php echo set_value('author_name', $author['author_name']); ?>">
                                                <small class="error"><?php echo form_error('author_name'); ?></small>
                                            </td>
                                            <td>
                                                <input type="text" name="email" value="<?php echo set_value('email', $author['email']); ?>">
                                                <small class="error"><?php echo form_error('email'); ?></small>
                                            </td>
                                            <td>
                                                <input type="text" name="contact_num" value="<?php echo set_value('contact_num', $author['contact_num']); ?>">
                                                <small class="error"><?php echo form_error('contact_num'); ?></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-footer text-center">
                                    <button type="submit">Update Author</button>
                                    <p class="message">Click here to go back to <a href="<?php echo site_url('authors'); ?>">Authors</a></p>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 20px;
        }
        .card.shadow {
            margin-bottom: 20px;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container input[type="password"],
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
        .table img {
            display: block;
            margin: 0 auto 10px;
            border-radius: 50%; /* Makes the image circular */
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</body>
</html>

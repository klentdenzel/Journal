<div class="container">
    <div class="card shadow">
        <div class="card-body text-center">
            <h2>Users' Full Details</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Complete Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('uploads/users/' . $user['profile_pic']); ?>" width="100" height="100" alt="User Image" style="border-radius: 50%;">
                                </td>
                                <td><?php echo $user['complete_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['date_created']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-footer text-center">
                        <p class="message">Click here to go back to <a href="<?php echo site_url('users'); ?>">Users</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html>
<head>
    <title>Users' Details</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
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
        .card-body.text-center h2 {
            margin: 20px 0;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form-footer .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
</body>
</html>

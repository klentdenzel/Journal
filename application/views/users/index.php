<div style="margin-left: 240px;">
    <div class="card shadow">
        <div class="card-body">
            <h2>Users</h2>
        </div>
    </div>
</div>

<div class="container" style="margin-left: 420px;">
    <a href="<?php echo site_url('new_user_form'); ?>" class="btn btn-primary" style="background-color: #0096C7;">
        <span>Add User</span>
    </a>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-right: auto; margin-left: auto;">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Complete Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user as $user) : ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('uploads/users/' . $user['profile_pic']); ?>" width="100" height="100" alt="User Image" style="border-radius: 50%;">
                                </td>
                                <td><?php echo $user['complete_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('users/view/'.$user['userid']); ?>"><img src="<?php echo base_url('assets/images/view-user.png'); ?>" alt="View User" style="margin-right: 10px;"></a>
                                    <a href="<?php echo site_url('users/edit_form/'.$user['userid']); ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Edit User" style="margin-right: 10px;"></a>
                                    <a href="<?php echo base_url(); ?>users/delete_user/<?php echo $user['userid'];?>" class="btn btn-danger" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                </td>
                            </tr>    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

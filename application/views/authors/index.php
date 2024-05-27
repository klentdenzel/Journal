<div style="margin-left: 240px;">
        <div class="card shadow">
            <div class="card-body">
            <h2>Authors</h2>
            </div>
        </div>
    </div>      
                    
    <div class="container" style="margin-left: 420px;">
    <a href="<?php echo site_url('new_author_form'); ?>" class="btn btn-primary" style="background-color: #0096C7;">
        <span>Add Author</span>
    </a>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-right: auto; margin-left: auto;">
            <thead>
            <tr>
                <th>Image</th>
                <th>Author Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($authors as $author) : ?>
            <tr>
            <td>
                <img src="<?php echo base_url('uploads/authors/' . $author['image']); ?>" width="100" height="100" alt="Author Image" style="border-radius: 50%;">
            </td>
            <td><?php echo $author['author_name']; ?></td>
                <td><?php echo $author['email']; ?></td>
                <td><?php echo $author['contact_num']; ?></td>
                <!-- <td><?php echo $author['title']; ?></td> -->
                <td>
                <a href="<?php echo site_url('authors/view/'.$author['audid']); ?>"><img src="assets/images/view-user.png" alt="View User" style="margin-right: 10px;"></a>
                <a href="<?php echo site_url('authors/edit_form/'.$author['audid']); ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Edit User" style="margin-right: 10px;"></a>
                <a href="<?php echo base_url(); ?>authors/delete_author/<?php echo $author['audid'];?>" class="btn btn-danger" title="Delete User" onclick="return confirm('Are you sure you want to delete this author?');">Delete</a>
                </td>
                
            </tr>    
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


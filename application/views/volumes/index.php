<div style="margin-left: 240px;">
    <div class="card shadow">
        <div class="card-body">
            <h2>Volumes</h2>
        </div>
    </div>
</div>      

<div class="container" style="margin-left: 420px;">
    <a href="<?php echo site_url('add_volume_form'); ?>" class="btn btn-primary" style="background-color: #0096C7;">
        <span>Add Volume</span>
    </a>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-right: 0; margin-left: auto;">
                    <thead>
                        <tr>
                            <th>Volume Image</th>
                            <th>Volume Name</th>
                            <th>Description</th>
                            <th>Date Published</th>
                            <th>Actions</th>
                            <th>Published</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($volumes as $volume) :?>
                        <tr>
                            <td><img src="<?php echo base_url('uploads/volumes/' . $volume['image']); ?>" width="100" height="100" alt="Volume Image"></td>
                            <td><?php echo $volume['vol_name']; ?></td>
                            <td><?php echo $volume['description']; ?></td>
                            <td><?php echo $volume['date_at']; ?></td>
                            <td>
                                <a href="<?php echo site_url('volumes/details/' . $volume['volumeid']); ?>"><img src="assets/images/view-user.png" alt="View Volume" style="margin-right: 10px;"></a>
                                <a href="<?php echo site_url('Volumes/edit_volume_form/' . $volume['volumeid']); ?>"><img src="assets/images/edit.png" alt="Edit Volume" style="margin-right: 10px;"></a>
                                <a href="<?php echo base_url(); ?>volumes/delete_volume/<?php echo $volume['volumeid']; ?>" class="btn btn-danger" title="Delete Volume" onclick="return confirm('Are you sure you want to delete this volume?');">Delete</a>
                            </td>
        
                            
                            <td>
                            <a href="<?php echo base_url('volumes/toggle_publish/' . $volume['volumeid']); ?>" 
                            class="btn <?php echo $volume['published'] ? 'btn-danger' : 'btn-success'; ?>" 
                            onclick="return confirm('Are you sure you want to <?php echo $volume['published'] ? 'Publish' : 'Unpublish'; ?> this volume?');"
                            title="<?php echo $volume['published'] ? 'Unpublished' : 'Published'; ?>">
                                <?php echo $volume['published'] ? 'Unpublished' : 'Published'; ?>
                            </a>
                            </td>
                        </tr>    
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>


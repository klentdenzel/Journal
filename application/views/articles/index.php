<div style="margin-left: 240px;">
    <div class="card shadow">
        <div class="card-body">
            <h2>Articles</h2>
        </div>
    </div>
</div>

<div class="container" style="margin-left: 420px;">
    <a href="<?php echo site_url('add_article_form'); ?>" class="btn btn-primary" style="background-color: #0096C7;">
        <span>Add Article</span>
    </a>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-right: auto; margin-left: auto;">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Volume</th>
                            <th>Abstract</th>
                            <th>File Name</th>
                            <th>Digital Object Identifier</th>
                            <th>Date Published</th>
                            <th>Keywords</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Action</th>
                            <th>Published</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($articles as $article) : ?>
                        <tr>
                            <td><?php echo $article['title']; ?></td>
                            <td><?php echo $article['vol_name']; ?></td> <!-- Display volume name instead of ID -->
                            <td><?php echo $article['abstract']; ?></td>
                            <td><a href="<?php echo base_url('uploads/articles/' . $article['filename']); ?>" target="_blank">Click here to Watch</a></td>
                            <td><?php echo $article['doi']; ?></td>
                            <td><?php echo $article['date_published']; ?></td>
                            <td><?php echo $article['keywords']; ?></td>
                            <td><?php echo isset($article['author_name']) ? $article['author_name'] : 'Unknown'; ?></td>
                            <td><a href="<?php echo site_url('articles/edit_form/'.$article['articleid']); ?>"><img src="assets/images/edit.png" alt="Edit Article" style="margin-right: 10px;"></a></td>
                            <td><a href="<?php echo base_url(); ?>articles/delete_article/<?php echo $article['articleid']; ?>" class="btn btn-danger" title="Delete Article" onclick="return confirm('Are you sure you want to delete this article?');">Delete</a></td>
                            <td>
                                <a href="<?php echo base_url('articles/toggle_publish/' . $article['articleid']); ?>" 
                                    class="btn <?php echo $article['published'] ? 'btn-danger' : 'btn-success'; ?>" 
                                    onclick="return confirm('Are you sure you want to <?php echo $article['published'] ? 'Unpublish' : 'Publish'; ?> this article?');"
                                    title="<?php echo $article['published'] ? 'Unpublish' : 'Publish'; ?>">
                                    <?php echo $article['published'] ? 'Unpublish' : 'Publish'; ?>
                                </a>
                            </td>
                        </tr>    
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

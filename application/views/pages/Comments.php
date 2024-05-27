<h2>Comments</h2>


<div class="container">
    <div class="row">
        <?php foreach($comments as $comment) : ?>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title"><?php echo $comment['title']; ?></h5> -->
                    <p class="card-text"><strong>Comments:</strong> <?php echo $comment['comments']; ?></p>
                    <p class="card-text"><strong>Assigned:</strong> <?php echo $comment['assigned_id']; ?></p>
                    <p class="card-text"><a href="home" class="card-link">Go Back</a></p>                                                                                            
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>




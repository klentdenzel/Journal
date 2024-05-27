<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .volume-container {
            display: flex;
            align-items: flex-start;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .volume-image {
            margin-right: 15px;
        }
        .collapse.show {
            display: block;
        }
    </style>
</head>
<body>
    <form class="form-inline my-2 my-lg-0" id="searchForm">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
        <button class="btn btn-info" type="button" onclick="filterContent()">Search</button>
    </form>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1>Current Volume</h1>
                        <?php if(!empty($volumes)) : ?>
                            <?php foreach($volumes as $volume) : ?>
                                <div class="volume-container mb-3">
                                    <img class="volume-image" src="<?php echo base_url('uploads/volumes/' . $volume['image']); ?>" width="100" height="150" alt="Volume Image">
                                    <div class="volume-details">
                                        <h3><?php echo $volume['vol_name']; ?></h3>
                                        <p><?php echo $volume['description']; ?></p>
                                        <button class="btn btn-primary show-articles-btn" type="button" data-toggle="collapse" data-target="#articles-<?php echo $volume['volumeid']; ?>" aria-expanded="false" aria-controls="articles-<?php echo $volume['volumeid']; ?>">
                                            Show Articles
                                        </button>
                                        <div class="collapse" id="articles-<?php echo $volume['volumeid']; ?>">
                                            <div class="card card-body mt-3">
                                                <?php 
                                                $volume_articles = array_filter($articles, function($article) use ($volume) {
                                                    return $article['volumeid'] == $volume['volumeid'];
                                                });
                                                ?>
                                                <?php if(!empty($volume_articles)) : ?>
                                                    <?php foreach($volume_articles as $article) : ?>
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $article['title']; ?></h5>
                                                                <p class="card-text"><?php echo $article['abstract']; ?></p>
                                                                <p class="card-text">Published: <?php echo $article['date_published']; ?></p>
                                                                <p class="card-text">Author: <?php echo $article['author_name']; ?></p>
                                                                <p class="card-text">
                                                                    PDF File: <a href="<?php echo base_url('uploads/articles/' . $article['filename']); ?>" target="_blank">Click here to Watch</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p>No articles available for this volume.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No published volumes available.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h2>Volumes</h2>
                        <ul class="list-group">
                            <?php if(!empty($volumes)) : ?>
                                <?php foreach($volumes as $volume) : ?>
                                    <li class="list-group-item"><a href="#articles-<?php echo $volume['volumeid']; ?>" data-toggle="collapse"><?php echo $volume['vol_name']; ?></a></li>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <li class="list-group-item">No published volumes available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function filterContent() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            $('.volume-container').each(function () {
                var volumeName = $(this).find('h3').text().toLowerCase();
                var volumeDescription = $(this).find('p').text().toLowerCase();
                var showVolume = false;
                var showArticles = false;

                if (volumeName.includes(searchTerm) || volumeDescription.includes(searchTerm)) {
                    showVolume = true;
                } else {
                    $(this).find('.card-body h5').each(function () {
                        var articleTitle = $(this).text().toLowerCase();
                        if (articleTitle.includes(searchTerm)) {
                            showVolume = true;
                            showArticles = true;
                            return false;
                        }
                    });
                }

                if (showVolume) {
                    $(this).show();
                    if (showArticles) {
                        $(this).find('.collapse').collapse('show');
                    }
                } else {
                    $(this).hide();
                }
            });
        }
    </script>
</body>
</html>

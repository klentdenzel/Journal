<!DOCTYPE html>
<html>
<head>
    <title>Add Article</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> <!-- Include CKEditor -->
</head>
<body>
    <div class="form-container">
        <h3>Add Article</h3>
        <p>Please input article details.</p>
        <?php echo form_open_multipart('add_article_post'); ?> <!-- Ensure form enctype is set to multipart/form-data -->

            <input type="text" name="article_title" placeholder="Article Title" required />
            <small class="error"><?php echo form_error('article_title'); ?></small>

            <textarea name="abstract" placeholder="Abstract" required></textarea> <!-- CKEditor field -->
            <small class="error"><?php echo form_error('abstract'); ?></small>

            <input type="text" name="doi" placeholder="DOI" required />
            <small class="error"><?php echo form_error('doi'); ?></small>

            <input type="text" name="keywords" placeholder="Keywords" required />
            <small class="error"><?php echo form_error('keywords'); ?></small>

            <select name="volumeid" required>
                <option value="">Select Volume</option>
                <?php foreach($volumes as $volume): ?>
                    <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="error"><?php echo form_error('volumeid'); ?></small>

            <select name="authorid" required>
                <option value="">Select Author</option>
                <?php foreach($authors as $author): ?>
                    <option value="<?php echo $author['audid']; ?>"><?php echo $author['author_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="error"><?php echo form_error('volumeid'); ?></small>

            <p>PDF file only</p>
            <input type="file" name="file" required />
            <small class="error"><?php echo isset($fileError) ? $fileError : ''; ?></small>

            <button type="submit">Submit</button>
            <p class="message">Click here to go back to <a href="<?php echo base_url('articles'); ?>">Articles</a></p>
        <?php echo form_close(); ?>
    </div>

    <script>
        CKEDITOR.replace('abstract'); // Initialize CKEditor for the abstract field
    </script>
</body>
</html>

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
    .form-container select,
    .form-container input[type="file"],
    .form-container button,
    .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-container textarea {
        height: 200px; /* Adjust the height of the textarea */
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

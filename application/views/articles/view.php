<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> <!-- Include CKEditor -->
</head>
<body>
    <div class="form-container">
        <h3>Edit Article</h3>
        <p>Please update article details.</p>
        <?php echo form_open_multipart('update_article'); ?> <!-- Form open tag with multipart -->

            <input type="hidden" name="articleid" value="<?php echo $article['articleid']; ?>" />

            <input type="text" name="article_title" value="<?php echo set_value('article_title', $article['title']); ?>" placeholder="Article Title" required />
            <small class="error"><?php echo form_error('article_title'); ?></small>

            <p>Volume</p>
            <select name="volumeid" required>
                <option value="">Select Volume</option>
                <?php foreach($volumes as $volume): ?>
                    <option value="<?php echo $volume['volumeid']; ?>" <?php echo ($volume['volumeid'] == $article['volumeid']) ? 'selected' : ''; ?>>
                        <?php echo $volume['vol_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <small class="error"><?php echo form_error('volumeid'); ?></small>

            <input type="text" name="keywords" value="<?php echo set_value('keywords', $article['keywords']); ?>" placeholder="Keywords" required />
            <small class="error"><?php echo form_error('keywords'); ?></small>

            <textarea name="abstract" placeholder="Abstract" required><?php echo set_value('abstract', $article['abstract']); ?></textarea>
            <small class="error"><?php echo form_error('abstract'); ?></small>

            <p>Current File: <a href="<?php echo base_url('uploads/articles/' . $article['filename']); ?>" target="_blank"><?php echo $article['filename']; ?></a></p>
            <p>Upload New File (PDF only)</p>
            <input type="file" name="filename" />
            <small class="error"><?php echo isset($imageError) ? $imageError : ''; ?></small>

            <input type="text" name="doi" value="<?php echo set_value('doi', $article['doi']); ?>" placeholder="DOI" required />
            <small class="error"><?php echo form_error('doi'); ?></small>

            <button type="submit">Update Article</button>
            <p class="message">Click here to go back to <a href="<?php echo site_url('articles'); ?>">Articles</a></p>

        <?php echo form_close(); ?> <!-- Form close tag -->
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
            margin: 0;
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
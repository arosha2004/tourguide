<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="file"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { display: inline-block; padding: 10px 15px; color: white; background: #007bff; text-decoration: none; border-radius: 5px; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .btn-secondary { background: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Gallery Image</h1>
        <form action="<?php echo URLROOT; ?>/portal789/addGalleryImage" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" id="image" required>
            </div>
            <button type="submit" class="btn">Upload Image</button>
            <a href="<?php echo URLROOT; ?>/portal789/gallery" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

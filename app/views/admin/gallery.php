<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .btn { display: inline-block; padding: 10px 15px; color: white; background: #007bff; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
        .btn:hover { background: #0056b3; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
        .grid-item { border: 1px solid #ddd; padding: 10px; border-radius: 4px; background: #fff; }
        .grid-item img { width: 100%; height: 150px; object-fit: cover; border-radius: 4px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Manage Gallery</h1>
            <div>
                <a href="<?php echo URLROOT; ?>/admin/addGalleryImage" class="btn">Add New Image</a>
                <a href="<?php echo URLROOT; ?>/admin" class="btn" style="background:#6c757d;">Back to Tours</a>
            </div>
        </div>
        
        <div class="grid">
            <?php foreach($data['images'] as $image) : ?>
            <div class="grid-item">
                <img src="<?php echo asset_url($image->image_url); ?>" alt="Gallery Image">
                <p style="font-size: 12px; color: #666; margin-top: 5px; word-break: break-all;"><?php echo asset_url($image->image_url); ?></p>
            </div>
            <?php endforeach; ?>
            <?php if(empty($data['images'])): ?>
            <p>No images found in gallery.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

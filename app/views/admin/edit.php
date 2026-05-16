<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title_page']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .btn { display: inline-block; padding: 10px 15px; color: white; background: #007bff; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
        .btn:hover { background: #0056b3; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="text"], .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .form-group textarea { height: 150px; }
        .btn-submit { background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .btn-submit:hover { background: #218838; }
        .current-image { margin-bottom: 10px; }
        .current-image img { max-width: 200px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Tour: <?php echo htmlspecialchars($data['tour']->title); ?></h1>
        <a href="<?php echo URLROOT; ?>/admin" class="btn" style="background:#6c757d;">Back to Tours</a>
        
        <form action="<?php echo URLROOT; ?>/admin/edit/<?php echo $data['tour']->id; ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($data['tour']->title); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($data['tour']->location); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($data['tour']->price); ?>" required>
            </div>

            <div class="form-group">
                <label for="badge">Badge (e.g., Best Seller)</label>
                <input type="text" name="badge" id="badge" value="<?php echo htmlspecialchars($data['tour']->badge); ?>">
            </div>

            <div class="form-group">
                <label for="duration">Duration (e.g., 3 Days)</label>
                <input type="text" name="duration" id="duration" value="<?php echo htmlspecialchars($data['tour']->duration); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Current Cover Image</label>
                <div class="current-image">
                    <?php if(!empty($data['tour']->image_url)): ?>
                        <img src="<?php echo asset_url($data['tour']->image_url); ?>" alt="Current Cover Image">
                    <?php else: ?>
                        <p>No image available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Replace Cover Image (Leave blank to keep current)</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" required><?php echo htmlspecialchars($data['tour']->description); ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Update Tour</button>
        </form>
    </div>
</body>
</html>

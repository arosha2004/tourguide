<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { display: inline-block; padding: 10px 15px; color: white; background: #28a745; border: none; cursor: pointer; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #218838; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Tour</h1>
        <form action="<?php echo URLROOT; ?>/admin/add" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required placeholder="e.g. Dothalugala Nature Trail">
            </div>
            
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" required placeholder="e.g. Knuckles Mountain Range">
            </div>
            
            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" step="0.01" name="price" id="price" required placeholder="e.g. 55.00">
            </div>
            
            <div class="form-group">
                <label for="badge">Badge (Tag):</label>
                <select name="badge" id="badge" required>
                    <option value="Popular">Popular</option>
                    <option value="Featured">Featured</option>
                    <option value="Top Rated">Top Rated</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" id="duration" required placeholder="e.g. 1 Day, 2 Days">
            </div>
            
            <div class="form-group">
                <label for="image">Tour Image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            
            <button type="submit" class="btn">Add Tour</button>
            <a href="<?php echo URLROOT; ?>/admin" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

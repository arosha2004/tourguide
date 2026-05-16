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
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f8f9fa; }
        img { max-width: 100px; height: auto; border-radius: 4px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Manage Tours</h1>
            <div>
                <a href="<?php echo URLROOT; ?>/admin/add" class="btn">Add New Tour</a>
                <a href="<?php echo URLROOT; ?>/admin/gallery" class="btn" style="background:#28a745;">Manage Gallery</a>
                <a href="<?php echo URLROOT; ?>" class="btn" style="background:#6c757d;">Back to Site</a>
                <a href="<?php echo URLROOT; ?>/admin/logout" class="btn" style="background:#dc3545; margin-left: 10px;">Logout</a>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Badge</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['tours'] as $tour) : ?>
                <tr>
                    <td><img src="<?php echo asset_url($tour->image_url); ?>" alt="Tour Image"></td>
                    <td><?php echo $tour->title; ?></td>
                    <td><?php echo $tour->location; ?></td>
                    <td>$<?php echo $tour->price; ?></td>
                    <td><?php echo $tour->badge; ?></td>
                    <td><?php echo $tour->duration; ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/admin/edit/<?php echo $tour->id; ?>" class="btn" style="padding: 5px 10px; margin-bottom: 5px;">Edit</a>
                        <form action="<?php echo URLROOT; ?>/admin/delete/<?php echo $tour->id; ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tour and all its images?');">
                            <button type="submit" class="btn" style="background:#dc3545; padding: 5px 10px; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($data['tours'])): ?>
                <tr>
                    <td colspan="7" style="text-align:center;">No tours found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?> | Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2ecc71;
            --primary-dark: #27ae60;
            --bg: #0f1117;
            --surface: #1a1d27;
            --surface2: #22263a;
            --border: rgba(255,255,255,0.08);
            --text: #e2e8f0;
            --text-muted: #8892a4;
            --accent: #6c63ff;
            --danger: #ff4757;
            --radius: 14px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .admin-header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .admin-header .brand {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.3px;
        }

        .admin-header .back-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.2s;
        }

        .admin-header .back-link:hover { color: var(--text); }

        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem 4rem;
        }

        .page-heading {
            margin-bottom: 2rem;
        }

        .page-heading h1 {
            font-size: 1.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 40%, var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-heading p {
            color: var(--text-muted);
            margin-top: 0.4rem;
            font-size: 0.9rem;
        }

        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full { grid-column: 1 / -1; }

        label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            letter-spacing: 0.3px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            width: 100%;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.12);
        }

        select option { background: var(--surface2); }

        textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        /* Cover Image Upload */
        .cover-upload-zone {
            position: relative;
            border: 2px dashed var(--border);
            border-radius: var(--radius);
            padding: 2.5rem;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s, background 0.3s;
            background: var(--surface2);
            overflow: hidden;
        }

        .cover-upload-zone:hover,
        .cover-upload-zone.drag-over {
            border-color: var(--primary);
            background: rgba(46, 204, 113, 0.05);
        }

        .cover-upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .cover-upload-zone .upload-icon {
            width: 52px;
            height: 52px;
            background: rgba(46, 204, 113, 0.12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--primary);
        }

        .cover-upload-zone h3 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
        }

        .cover-upload-zone p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.3rem;
        }

        .cover-preview {
            display: none;
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Extra Images Grid */
        .extra-images-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .extra-img-slot {
            position: relative;
            aspect-ratio: 4/3;
            border: 2px dashed var(--border);
            border-radius: 10px;
            background: var(--surface2);
            overflow: hidden;
            cursor: pointer;
            transition: border-color 0.2s, transform 0.2s;
        }

        .extra-img-slot:hover {
            border-color: var(--accent);
            transform: scale(1.02);
        }

        .extra-img-slot input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .extra-img-slot .slot-placeholder {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            pointer-events: none;
        }

        .extra-img-slot .slot-placeholder svg {
            color: var(--text-muted);
            opacity: 0.6;
        }

        .extra-img-slot .slot-placeholder span {
            font-size: 0.72rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .extra-img-slot .slot-number {
            position: absolute;
            top: 8px;
            left: 8px;
            background: rgba(0,0,0,0.6);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            z-index: 2;
        }

        .extra-img-slot img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            display: none;
        }

        .extra-img-slot.has-image img { display: block; }
        .extra-img-slot.has-image .slot-placeholder { display: none; }
        .extra-img-slot.has-image { border-color: var(--primary); border-style: solid; }

        .images-hint {
            margin-top: 0.75rem;
            font-size: 0.78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            padding-top: 1rem;
        }

        .btn-submit {
            flex: 1;
            padding: 0.9rem 2rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.2s, box-shadow 0.2s;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 20px rgba(46, 204, 113, 0.3);
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 6px 25px rgba(46, 204, 113, 0.4);
        }

        .btn-cancel {
            padding: 0.9rem 1.5rem;
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-cancel:hover {
            border-color: var(--text-muted);
            color: var(--text);
        }

        /* Loading state */
        .btn-submit.loading {
            opacity: 0.7;
            pointer-events: none;
            cursor: not-allowed;
        }

        @media (max-width: 600px) {
            .grid-2 { grid-template-columns: 1fr; }
            .extra-images-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="brand">🌿 The Ceylon Trek — Admin</div>
        <a href="<?php echo URLROOT; ?>/admin" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Back to Dashboard
        </a>
    </header>

    <div class="wrapper">
        <div class="page-heading">
            <h1>Add New Tour</h1>
            <p>Fill in the details below to create a new tour listing</p>
        </div>

        <form action="<?php echo URLROOT; ?>/admin/add" method="POST" enctype="multipart/form-data" id="addTourForm">

            <!-- Basic Info -->
            <div class="form-card">
                <div class="section-label">Tour Information</div>
                <div class="grid-2">
                    <div class="form-group full">
                        <label for="title">Tour Title *</label>
                        <input type="text" name="title" id="title" required placeholder="e.g. Dothalugala Nature Trail">
                    </div>
                    <div class="form-group">
                        <label for="location">Location *</label>
                        <input type="text" name="location" id="location" required placeholder="e.g. Knuckles Mountain Range">
                    </div>
                    <div class="form-group">
                        <label for="price">Price (USD) *</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" required placeholder="e.g. 55.00">
                    </div>
                    <div class="form-group">
                        <label for="badge">Badge / Tag *</label>
                        <select name="badge" id="badge" required>
                            <option value="Popular">Popular</option>
                            <option value="Featured">Featured</option>
                            <option value="Top Rated">Top Rated</option>
                            <option value="New">New</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration *</label>
                        <input type="text" name="duration" id="duration" required placeholder="e.g. 1 Day, 2 Days">
                    </div>
                    <div class="form-group full">
                        <label for="description">Tour Description *</label>
                        <textarea name="description" id="description" required placeholder="Describe this tour — highlight what makes it special, what to expect, difficulty level, etc."></textarea>
                    </div>
                </div>
            </div>

            <!-- Cover Image -->
            <div class="form-card">
                <div class="section-label">Cover Image</div>
                <div class="cover-upload-zone" id="coverZone">
                    <input type="file" name="image" id="coverImage" accept="image/*" required onchange="previewCover(this)">
                    <img class="cover-preview" id="coverPreview" alt="Cover preview">
                    <div class="upload-icon" id="coverPlaceholder">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </div>
                    <h3 id="coverHeading">Click to upload cover image</h3>
                    <p id="coverSubtext">PNG, JPG, WEBP · Recommended 1600×900px</p>
                </div>
            </div>

            <!-- Extra Images -->
            <div class="form-card">
                <div class="section-label">Additional Images (up to 6)</div>
                <div class="extra-images-grid" id="extraGrid">
                    <?php for($i = 0; $i < 6; $i++): ?>
                    <div class="extra-img-slot" id="slot_<?php echo $i; ?>">
                        <span class="slot-number"><?php echo $i + 1; ?></span>
                        <input type="file" name="extra_images[]" accept="image/*" onchange="previewExtra(this, <?php echo $i; ?>)">
                        <div class="slot-placeholder">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span>Add Image <?php echo $i + 1; ?></span>
                        </div>
                        <img src="" alt="Preview <?php echo $i + 1; ?>">
                    </div>
                    <?php endfor; ?>
                </div>
                <p class="images-hint">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    These will be displayed as an immersive showcase on the tour detail page.
                </p>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <a href="<?php echo URLROOT; ?>/admin" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit" id="submitBtn" onclick="this.classList.add('loading'); this.textContent = 'Publishing...';">
                    🚀 Publish Tour
                </button>
            </div>

        </form>
    </div>

    <script>
        function previewCover(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('coverPreview');
                const placeholder = document.getElementById('coverPlaceholder');
                const heading = document.getElementById('coverHeading');
                const subtext = document.getElementById('coverSubtext');
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
                heading.textContent = file.name;
                subtext.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            };
            reader.readAsDataURL(file);
        }

        function previewExtra(input, index) {
            const file = input.files[0];
            if (!file) return;
            const slot = document.getElementById('slot_' + index);
            const img = slot.querySelector('img');
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                slot.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }

        // Drag-over effects on cover zone
        const coverZone = document.getElementById('coverZone');
        coverZone.addEventListener('dragover', () => coverZone.classList.add('drag-over'));
        coverZone.addEventListener('dragleave', () => coverZone.classList.remove('drag-over'));
        coverZone.addEventListener('drop', () => coverZone.classList.remove('drag-over'));
    </script>
</body>
</html>

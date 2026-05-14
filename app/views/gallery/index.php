<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="gallery-hero" style="padding: 100px 0 40px; text-align: center; background: #f9f9f9;">
    <div class="container">
        <span style="color: #4caf50; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; font-size: 14px;">Capture the adventure</span>
        <h1 style="font-family: 'Outfit', sans-serif; font-size: 48px; font-weight: 800; color: #1a1a1a; margin-top: 10px;">Sri Lanka Trekking Gallery</h1>
    </div>
</section>

<section class="gallery-content" style="padding: 40px 0 80px;">
    <div class="container">
        <div class="masonry-grid">
            <?php foreach($data['images'] as $image) : ?>
            <div class="masonry-item">
                <img src="<?php echo $image->image_url; ?>" alt="Trekking in Sri Lanka">
                <div class="item-overlay">
                    <div class="overlay-icon">+</div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if(empty($data['images'])): ?>
        <div style="text-align: center; padding: 40px;">
            <p>Our gallery is currently empty. Check back soon for stunning adventure photos!</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<div id="lightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

<style>
.masonry-grid {
    column-count: 3;
    column-gap: 20px;
}

.masonry-item {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    cursor: pointer;
}

.masonry-item img {
    display: block;
    width: 100%;
    height: auto;
}

.masonry-item:hover {
    transform: translateY(-5px);
}

.item-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.masonry-item:hover .item-overlay {
    opacity: 1;
}

.overlay-icon {
    width: 40px;
    height: 40px;
    background: #4caf50;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
}

/* Lightbox Styles */
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 50px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.75);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}

.lightbox-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 85vh;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(255,255,255,0.1);
}

.close-lightbox {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    cursor: pointer;
}

.close-lightbox:hover,
.close-lightbox:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

@media (max-width: 992px) {
    .masonry-grid {
        column-count: 2;
    }
}

@media (max-width: 576px) {
    .masonry-grid {
        column-count: 1;
    }
    .gallery-hero h1 {
        font-size: 32px;
    }
    .close-lightbox {
        right: 20px;
        top: 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.querySelector('.close-lightbox');
    const galleryItems = document.querySelectorAll('.masonry-item');

    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            lightboxImg.src = imgSrc;
            lightbox.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
    });

    closeBtn.addEventListener('click', function() {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    });

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php require '../app/views/inc/header.php'; ?>

<!-- TouristTrip Structured Data for Rich Snippets -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TouristTrip",
  "name": "<?php echo addslashes(htmlspecialchars($data['tour']->title)); ?>",
  "description": "<?php echo addslashes(htmlspecialchars(substr(strip_tags($data['tour']->description ?? ''), 0, 200))); ?>",
  "image": "<?php echo htmlspecialchars(asset_url($data['tour']->image_url)); ?>",
  "touristType": "Adventure",
  "itinerary": {
    "@type": "ItemList",
    "name": "<?php echo addslashes(htmlspecialchars($data['tour']->title)); ?> Itinerary"
  },
  "provider": {
    "@type": "TravelAgency",
    "name": "The Ceylon Trek",
    "url": "<?php echo URLROOT; ?>"
  },
  "offers": {
    "@type": "Offer",
    "price": "<?php echo $data['tour']->price; ?>",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock"
  },
  "location": {
    "@type": "Place",
    "name": "<?php echo addslashes(htmlspecialchars($data['tour']->location)); ?>",
    "address": {
      "@type": "PostalAddress",
      "addressCountry": "LK"
    }
  }
}
</script>

<main>
    <section class="tour-detail-section">
        <div class="tsd-container">

            <!-- Hero Header -->
            <div class="tsd-header reveal">
                <span class="badge badge-glow"><?php echo strtoupper($data['tour']->badge); ?></span>
                <h1 class="tsd-title"><?php echo htmlspecialchars($data['tour']->title); ?></h1>
                <div class="tsd-meta">
                    <span class="tsd-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <?php echo htmlspecialchars($data['tour']->location); ?>
                    </span>
                    <span class="tsd-meta-sep">·</span>
                    <span class="tsd-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?php echo htmlspecialchars($data['tour']->duration); ?>
                    </span>
                    <span class="tsd-meta-sep">·</span>
                    <span class="tsd-meta-price">
                        From <strong>$<?php echo number_format($data['tour']->price, 2); ?></strong>
                    </span>
                </div>
            </div>

            <!-- Full-Width Cover Image -->
            <div class="tsd-cover reveal" onclick="openLightbox(0)">
                <img src="<?php echo asset_url($data['tour']->image_url); ?>" alt="<?php echo htmlspecialchars($data['tour']->title); ?>" loading="lazy">
                <div class="tsd-cover-overlay">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </div>
            </div>

            <!-- Overview -->
            <div class="tsd-body reveal">
                <div class="tsd-overview">
                    <h2 class="tsd-section-title">Overview</h2>
                    <p class="tsd-description">
                        <?php echo nl2br(htmlspecialchars($data['tour']->description ?? 'Join us on this amazing adventure to explore ' . $data['tour']->location . '. Experience nature like never before with guided treks and beautiful landscapes.')); ?>
                    </p>
                </div>

                <!-- Gallery Grid (extra images from admin panel) -->
                <?php if (!empty($data['images'])): ?>
                <div class="tsd-gallery-section">
                    <h2 class="tsd-section-title">Gallery</h2>
                    <div class="tsd-gallery-grid">
                        <?php foreach ($data['images'] as $idx => $img): ?>
                        <div class="gallery-item" onclick="openLightbox(<?php echo $idx + 1; ?>)">
                            <img src="<?php echo asset_url($img->image_url); ?>" alt="<?php echo htmlspecialchars($data['tour']->title); ?> – photo <?php echo $idx + 1; ?>" loading="lazy">
                            <div class="gallery-item-overlay">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- CTA Buttons -->
                <div class="tsd-cta">
                    <button onclick="openBookingModal()" class="btn btn-primary btn-lg tsd-book-btn">Book This Tour</button>
                    <a href="<?php echo URLROOT; ?>" class="btn btn-outline btn-lg">Back to Home</a>
                </div>
            </div>

        </div>
    </section>
</main>

<!-- LIGHTBOX -->
<div id="lightbox" class="lightbox-overlay" onclick="closeLightbox()">
    <button class="lb-close" onclick="closeLightbox()">✕</button>
    <button class="lb-prev" onclick="event.stopPropagation(); shiftLightbox(-1)">‹</button>
    <div class="lb-image-wrap" onclick="event.stopPropagation()">
        <img id="lbImg" src="" alt="Enlarged tour image">
        <div class="lb-counter" id="lbCounter"></div>
    </div>
    <button class="lb-next" onclick="event.stopPropagation(); shiftLightbox(1)">›</button>
</div>

<!-- BOOKING MODAL -->
<div id="bookingModal" class="booking-modal-overlay" onclick="closeBookingModal()">
    <div class="booking-modal-content" onclick="event.stopPropagation()">
        <button class="bm-close" onclick="closeBookingModal()">✕</button>
        <h3 class="bm-title">Book <?php echo htmlspecialchars($data['tour']->title); ?></h3>
        <form id="bookingForm" onsubmit="submitBooking(event)">
            <div class="bm-form-group">
                <label>Full Name</label>
                <input type="text" id="bmName" class="bm-input" placeholder="John Doe" required>
            </div>
            <div class="bm-form-group">
                <label>Contact Number</label>
                <input type="tel" id="bmContact" class="bm-input" placeholder="+1 234 567 8900" required>
            </div>
            <div class="bm-row">
                <div class="bm-form-group">
                    <label>Travelers</label>
                    <input type="number" id="bmTravelers" class="bm-input" min="1" value="1" required>
                </div>
                <div class="bm-form-group">
                    <label>Preferred Date</label>
                    <input type="date" id="bmDate" class="bm-input" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg bm-submit">
                Proceed to WhatsApp
            </button>
        </form>
    </div>
</div>

<style>
/* ===== TOUR DETAIL — REFERENCE LAYOUT ===== */
.tour-detail-section {
    padding-top: 100px;
    padding-bottom: 5rem;
    background: #fff;
}

.tsd-container {
    max-width: 780px;
    margin: 0 auto;
    padding: 0 1.25rem;
}

/* Header */
.tsd-header {
    text-align: center;
    padding: 2rem 0 1.5rem;
}

.tsd-title {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    line-height: 1.2;
    margin: 0.75rem 0 1rem;
    color: #1a1a2e;
    letter-spacing: -0.5px;
}

.tsd-meta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    color: #666;
    font-size: 0.9rem;
}

.tsd-meta-item {
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.tsd-meta-sep { color: #ccc; }
.tsd-meta-price { color: var(--primary); font-weight: 600; font-size: 1rem; }
.tsd-meta-price strong { font-size: 1.15rem; }

/* Full-width cover image */
.tsd-cover {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    margin: 1.5rem 0 2.5rem;
    cursor: pointer;
    aspect-ratio: 16/7;
    background: #eee;
}

.tsd-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.tsd-cover:hover img { transform: scale(1.02); }

.tsd-cover-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: background 0.3s, opacity 0.3s;
}

.tsd-cover:hover .tsd-cover-overlay {
    background: rgba(0,0,0,0.2);
    opacity: 1;
}

/* Body / Overview */
.tsd-body {
    margin-top: 0;
}

.tsd-section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 0.85rem;
    margin-top: 0;
}

.tsd-description {
    font-size: 1rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 2.5rem;
}

/* Gallery grid */
.tsd-gallery-section {
    margin-bottom: 2.5rem;
}

.tsd-gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    aspect-ratio: 4/3;
    background: #eee;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.gallery-item:hover img { transform: scale(1.06); }

.gallery-item-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: background 0.3s, opacity 0.3s;
}

.gallery-item:hover .gallery-item-overlay {
    background: rgba(0,0,0,0.3);
    opacity: 1;
}

/* CTA */
.tsd-cta {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 0.5rem;
}

.tsd-book-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem !important;
    padding: 0.9rem 2rem !important;
    box-shadow: 0 6px 25px rgba(46, 204, 113, 0.35) !important;
    transition: box-shadow 0.3s, transform 0.2s !important;
}

.tsd-book-btn:hover {
    box-shadow: 0 8px 30px rgba(46, 204, 113, 0.5) !important;
    transform: translateY(-2px);
}

/* LIGHTBOX */
.lightbox-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.95);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.25s ease;
}

.lightbox-overlay.active { display: flex; }

.lb-image-wrap {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

#lbImg {
    max-width: 88vw;
    max-height: 88vh;
    object-fit: contain;
    border-radius: 12px;
    box-shadow: 0 30px 80px rgba(0,0,0,0.6);
    animation: zoomIn 0.3s ease;
}

.lb-counter {
    position: absolute;
    bottom: -32px;
    left: 50%;
    transform: translateX(-50%);
    color: rgba(255,255,255,0.6);
    font-size: 0.8rem;
    white-space: nowrap;
}

.lb-close {
    position: fixed;
    top: 1.25rem;
    right: 1.5rem;
    background: rgba(255,255,255,0.12);
    border: none;
    color: #fff;
    font-size: 1.4rem;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
    z-index: 10001;
}

.lb-close:hover { background: rgba(255,255,255,0.25); }

.lb-prev, .lb-next {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.1);
    border: none;
    color: #fff;
    font-size: 2.5rem;
    width: 52px;
    height: 72px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
    z-index: 10001;
}

.lb-prev { left: 1rem; }
.lb-next { right: 1rem; }
.lb-prev:hover, .lb-next:hover { background: rgba(255,255,255,0.2); }

/* BOOKING MODAL */
.booking-modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.25s ease;
}

.booking-modal-overlay.active { display: flex; }

.booking-modal-content {
    background: #fff;
    width: 90%;
    max-width: 450px;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    position: relative;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    animation: zoomIn 0.3s ease;
}

.bm-close {
    position: absolute;
    top: 1.25rem;
    right: 1.25rem;
    background: #f1f3f5;
    border: none;
    color: #495057;
    font-size: 1.2rem;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s, color 0.2s;
}

.bm-close:hover { background: #e9ecef; color: #212529; }

.bm-title {
    margin-top: 0;
    color: #1a1a2e;
    font-weight: 800;
    font-size: 1.5rem;
    margin-bottom: 1.8rem;
    line-height: 1.3;
}

.bm-form-group { margin-bottom: 1.25rem; }
.bm-form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.4rem;
    color: #495057;
    font-size: 0.9rem;
}

.bm-input {
    width: 100%;
    padding: 0.85rem 1rem;
    border: 1px solid #ced4da;
    border-radius: 10px;
    outline: none;
    font-size: 1rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}

.bm-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.2);
}

.bm-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.bm-submit {
    display: block;
    width: 100%;
    margin-top: 0.5rem;
    box-shadow: 0 6px 20px rgba(46, 204, 113, 0.35);
}

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes zoomIn { from { transform: scale(0.92); opacity: 0; } to { transform: scale(1); opacity: 1; } }

/* Responsive */
@media (max-width: 600px) {
    .tsd-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .tsd-cta { flex-direction: column; align-items: stretch; }
    .lb-prev { left: 0.25rem; }
    .lb-next { right: 0.25rem; }
    .bm-row { grid-template-columns: 1fr; }
}
</style>

<script>
// Build all images array for lightbox: cover first, then extra gallery images
const allImages = [
    '<?php echo addslashes(asset_url($data['tour']->image_url)); ?>'
    <?php foreach($data['images'] as $img): ?>
    , '<?php echo addslashes(asset_url($img->image_url)); ?>'
    <?php endforeach; ?>
];

let currentLbIndex = 0;

function openLightbox(index) {
    currentLbIndex = index;
    updateLightbox();
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}

function shiftLightbox(dir) {
    currentLbIndex = (currentLbIndex + dir + allImages.length) % allImages.length;
    updateLightbox();
}

function updateLightbox() {
    const img = document.getElementById('lbImg');
    img.style.animation = 'none';
    img.offsetHeight;
    img.style.animation = 'zoomIn 0.25s ease';
    img.src = allImages[currentLbIndex];
    document.getElementById('lbCounter').textContent = (currentLbIndex + 1) + ' / ' + allImages.length;
}

function openBookingModal() {
    document.getElementById('bookingModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeBookingModal() {
    document.getElementById('bookingModal').classList.remove('active');
    document.body.style.overflow = '';
}

function submitBooking(e) {
    e.preventDefault();
    const name     = document.getElementById('bmName').value;
    const contact  = document.getElementById('bmContact').value;
    const travelers= document.getElementById('bmTravelers').value;
    const date     = document.getElementById('bmDate').value;
    const tourTitle= "<?php echo addslashes($data['tour']->title); ?>";

    let text = `Hi! I'm interested in booking the *${tourTitle}* tour.\n\n`;
    text += `*Name:* ${name}\n`;
    text += `*Contact Number:* ${contact}\n`;
    text += `*Travelers:* ${travelers}\n`;
    text += `*Preferred Date:* ${date}\n\n`;
    text += `Please let me know the availability and next steps.`;

    const waUrl = `https://wa.me/94753949483?text=${encodeURIComponent(text)}`;
    window.open(waUrl, '_blank');
    closeBookingModal();
}

document.addEventListener('keydown', function(e) {
    const lb = document.getElementById('lightbox');
    const bm = document.getElementById('bookingModal');

    if (lb.classList.contains('active')) {
        if (e.key === 'ArrowLeft')  shiftLightbox(-1);
        if (e.key === 'ArrowRight') shiftLightbox(1);
        if (e.key === 'Escape')     closeLightbox();
    } else if (bm && bm.classList.contains('active')) {
        if (e.key === 'Escape') closeBookingModal();
    }
});
</script>

<?php require '../app/views/inc/footer.php'; ?>

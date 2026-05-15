<?php require '../app/views/inc/header.php'; ?>

<main>
    <section class="tour-detail-section" style="padding-top: 100px;">
        <div class="container">

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

            <?php
                $has_extra_images = !empty($data['images']);
                $extra_images = $data['images'];
            ?>

            <?php if ($has_extra_images): ?>
            <!-- CINEMATIC IMAGE SHOWCASE - mosaic layout -->
            <div class="tsd-mosaic reveal" id="imageMosaic">
                <!-- Large cover = slot 0 -->
                <div class="mosaic-main" onclick="openLightbox(0)">
                    <img src="<?php echo asset_url($data['tour']->image_url); ?>" alt="<?php echo htmlspecialchars($data['tour']->title); ?>" loading="lazy">
                    <div class="mosaic-overlay">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </div>
                </div>

                <!-- Side stack -->
                <div class="mosaic-side">
                    <?php
                        $side_images = array_slice($extra_images, 0, 4);
                        $remaining   = count($extra_images) - 4;
                    ?>
                    <?php foreach($side_images as $idx => $img): ?>
                    <div class="mosaic-thumb" onclick="openLightbox(<?php echo $idx + 1; ?>)">
                        <img src="<?php echo asset_url($img->image_url); ?>" alt="Tour image <?php echo $idx + 1; ?>" loading="lazy">
                        <div class="mosaic-overlay">
                            <?php if($idx === 3 && $remaining > 0): ?>
                            <span class="mosaic-more">+<?php echo $remaining; ?> more</span>
                            <?php else: ?>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Remaining images as horizontal strip -->
            <?php if(count($extra_images) > 4): ?>
            <div class="tsd-strip reveal">
                <?php foreach(array_slice($extra_images, 4) as $sidx => $simg): ?>
                <div class="strip-item" onclick="openLightbox(<?php echo $sidx + 5; ?>)">
                    <img src="<?php echo asset_url($simg->image_url); ?>" alt="Tour image" loading="lazy">
                    <div class="mosaic-overlay">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php else: ?>
            <!-- Only cover image -->
            <div class="tsd-single-image reveal">
                <img src="<?php echo asset_url($data['tour']->image_url); ?>" alt="<?php echo htmlspecialchars($data['tour']->title); ?>" onclick="openLightbox(0)">
                <div class="mosaic-overlay">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </div>
            </div>
            <?php endif; ?>

            <!-- Description -->
            <div class="tsd-body reveal">
                <div class="tsd-overview">
                    <h2 class="tsd-section-title">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        Overview
                    </h2>
                    <p class="tsd-description">
                        <?php echo nl2br(htmlspecialchars($data['tour']->description ?? 'Join us on this amazing adventure to explore ' . $data['tour']->location . '. Experience nature like never before with guided treks and beautiful landscapes.')); ?>
                    </p>
                </div>

                <!-- Highlights -->
                <div class="tsd-highlights">
                    <div class="highlight-card">
                        <div class="highlight-icon">📍</div>
                        <div>
                            <div class="highlight-label">Location</div>
                            <div class="highlight-value"><?php echo htmlspecialchars($data['tour']->location); ?></div>
                        </div>
                    </div>
                    <div class="highlight-card">
                        <div class="highlight-icon">⏱️</div>
                        <div>
                            <div class="highlight-label">Duration</div>
                            <div class="highlight-value"><?php echo htmlspecialchars($data['tour']->duration); ?></div>
                        </div>
                    </div>
                    <div class="highlight-card">
                        <div class="highlight-icon">💰</div>
                        <div>
                            <div class="highlight-label">Starting From</div>
                            <div class="highlight-value" style="color: var(--primary);">$<?php echo number_format($data['tour']->price, 2); ?></div>
                        </div>
                    </div>
                    <div class="highlight-card">
                        <div class="highlight-icon">🏷️</div>
                        <div>
                            <div class="highlight-label">Category</div>
                            <div class="highlight-value"><?php echo htmlspecialchars($data['tour']->badge); ?></div>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="tsd-cta">
                    <a href="https://wa.me/94753949483?text=Hi!%20I'm%20interested%20in%20booking%20the%20<?php echo urlencode($data['tour']->title); ?>%20tour." class="btn btn-primary btn-lg tsd-book-btn" target="_blank">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.101.546 4.073 1.497 5.787L.057 24l6.303-1.474C7.937 23.447 9.928 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.782 9.782 0 0 1-5.02-1.382l-.36-.214-3.742.875.897-3.655-.234-.376A9.77 9.77 0 0 1 2.182 12C2.182 6.563 6.563 2.182 12 2.182S21.818 6.563 21.818 12 17.437 21.818 12 21.818z"/></svg>
                        Book on WhatsApp
                    </a>
                    <a href="<?php echo URLROOT; ?>" class="btn btn-outline btn-lg">← Back to Home</a>
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
        <img id="lbImg" src="" alt="Tour image">
        <div class="lb-counter" id="lbCounter"></div>
    </div>
    <button class="lb-next" onclick="event.stopPropagation(); shiftLightbox(1)">›</button>
</div>

<style>
/* ===== TOUR DETAIL STYLES ===== */
.tour-detail-section { padding-bottom: 5rem; }

.tsd-header {
    text-align: center;
    padding: 2rem 0 1.5rem;
}

.tsd-title {
    font-size: clamp(1.8rem, 4vw, 3rem);
    font-weight: 800;
    line-height: 1.15;
    margin: 0.75rem 0 1rem;
    color: var(--dark);
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

/* MOSAIC IMAGE LAYOUT */
.tsd-mosaic {
    display: grid;
    grid-template-columns: 60% 40%;
    gap: 0.6rem;
    margin: 2rem 0 0.6rem;
    border-radius: 20px;
    overflow: hidden;
    max-height: 520px;
}

.mosaic-main {
    position: relative;
    cursor: pointer;
    overflow: hidden;
}

.mosaic-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
}

.mosaic-main:hover img { transform: scale(1.04); }

.mosaic-side {
    display: grid;
    grid-template-rows: repeat(4, 1fr);
    gap: 0.6rem;
}

.mosaic-thumb {
    position: relative;
    cursor: pointer;
    overflow: hidden;
    border-radius: 4px;
}

.mosaic-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
    display: block;
}

.mosaic-thumb:hover img { transform: scale(1.06); }

.mosaic-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s;
    opacity: 0;
}

.mosaic-main:hover .mosaic-overlay,
.mosaic-thumb:hover .mosaic-overlay { background: rgba(0,0,0,0.3); opacity: 1; }

.mosaic-more {
    background: rgba(0,0,0,0.65);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 700;
    padding: 0.35rem 0.75rem;
    border-radius: 8px;
    letter-spacing: -0.3px;
}

/* Horizontal strip for > 4 extra images */
.tsd-strip {
    display: flex;
    gap: 0.6rem;
    overflow-x: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--primary) transparent;
    padding-bottom: 0.5rem;
    margin-bottom: 0.6rem;
}

.tsd-strip::-webkit-scrollbar { height: 4px; }
.tsd-strip::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 2px; }

.strip-item {
    position: relative;
    flex: 0 0 180px;
    height: 120px;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}

.strip-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.strip-item:hover img { transform: scale(1.08); }
.strip-item:hover .mosaic-overlay { background: rgba(0,0,0,0.3); opacity: 1; }

/* Single image fallback */
.tsd-single-image {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    max-height: 520px;
    margin: 2rem 0;
    cursor: pointer;
}

.tsd-single-image img {
    width: 100%;
    max-height: 520px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s;
}

.tsd-single-image:hover img { transform: scale(1.02); }
.tsd-single-image:hover .mosaic-overlay { opacity: 1; background: rgba(0,0,0,0.2); }

/* Body section */
.tsd-body {
    margin-top: 2.5rem;
    max-width: 860px;
    margin-left: auto;
    margin-right: auto;
}

.tsd-section-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 0.6rem;
    margin-bottom: 1rem;
}

.tsd-description {
    font-size: 1.05rem;
    line-height: 1.85;
    color: #555;
    margin-bottom: 2.5rem;
}

/* Highlights */
.tsd-highlights {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
    margin-bottom: 2.5rem;
}

.highlight-card {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    padding: 1.1rem 1.25rem;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 14px;
    transition: box-shadow 0.2s, transform 0.2s;
}

.highlight-card:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,0.07);
    transform: translateY(-2px);
}

.highlight-icon { font-size: 1.5rem; line-height: 1; }

.highlight-label {
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #999;
    margin-bottom: 0.2rem;
}

.highlight-value {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--dark);
}

/* CTA */
.tsd-cta {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
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
    background: rgba(0, 0, 0, 0.95);
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

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes zoomIn { from { transform: scale(0.92); opacity: 0; } to { transform: scale(1); opacity: 1; } }

/* Responsive */
@media (max-width: 768px) {
    .tsd-mosaic {
        grid-template-columns: 1fr;
        max-height: none;
    }
    .mosaic-main { height: 260px; }
    .mosaic-side { grid-template-rows: none; grid-template-columns: repeat(4, 1fr); height: 90px; }
    .tsd-cta { flex-direction: column; align-items: stretch; }
    .lb-prev { left: 0.25rem; }
    .lb-next { right: 0.25rem; }
}
</style>

<script>
// Build all images array for lightbox
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
    img.offsetHeight; // reflow
    img.style.animation = 'zoomIn 0.25s ease';
    img.src = allImages[currentLbIndex];
    document.getElementById('lbCounter').textContent = (currentLbIndex + 1) + ' / ' + allImages.length;
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const lb = document.getElementById('lightbox');
    if (!lb.classList.contains('active')) return;
    if (e.key === 'ArrowLeft') shiftLightbox(-1);
    if (e.key === 'ArrowRight') shiftLightbox(1);
    if (e.key === 'Escape') closeLightbox();
});
</script>

<?php require '../app/views/inc/footer.php'; ?>

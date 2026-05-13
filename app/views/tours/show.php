<?php require '../app/views/inc/header.php'; ?>

<main>
    <section class="section" style="padding-top: 120px;">
        <div class="container">
            <div class="tour-detail-header text-center reveal">
                <span class="badge badge-glow mb-2"><?php echo strtoupper($data['tour']->badge); ?></span>
                <h1 class="section-title"><?php echo $data['tour']->title; ?></h1>
                <div class="tour-meta d-flex justify-content-center align-items-center gap-md text-body">
                    <span class="tour-location">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <?php echo $data['tour']->location; ?>
                    </span>
                    <span class="tour-duration">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <?php echo $data['tour']->duration; ?>
                    </span>
                    <span class="tour-price">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                        $<?php echo $data['tour']->price; ?>
                    </span>
                </div>
            </div>

            <div class="tour-main-image mt-5 reveal">
                <img src="<?php echo $data['tour']->image_url; ?>" alt="<?php echo $data['tour']->title; ?>" class="rounded-lg shadow-lg w-full" style="max-height: 500px; object-fit: cover;" />
            </div>

            <div class="tour-content mt-5 reveal">
                <?php if($data['tour']->title == 'Knuckles Five Peaks'): ?>
                    <h2 class="mb-3">Overview</h2>
                    <p class="text-body" style="font-size: 1.1rem; line-height: 1.8;">
                        The Knuckles Mountain Range, locally known as Dumbara Kanduvetiya, is a UNESCO World Heritage Site renowned for its dramatic landscapes, rich biodiversity, and mist-covered peaks. Its name comes from the five highest peaks—Kirigalpoththa, Gombaniya, Knuckles, Koboneelagala, and Dotulugala—that resemble a clenched fist. The 'Five Peaks' hike is a breathtaking adventure waiting for you.
                    </p>

                    <h2 class="mt-5 mb-3">Gallery</h2>
                    <div class="grid grid-3 gap-md">
                        <?php
                            $knuckles_images = [
                                "WhatsApp Image 2026-05-08 at 06.10.11.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.16.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.17 (1).jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.17.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.28.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.33.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.34 (1).jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.34 (2).jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.34.jpeg",
                                "WhatsApp Image 2026-05-08 at 06.10.35.jpeg"
                            ];
                            foreach($knuckles_images as $img):
                        ?>
                        <div class="gallery-item">
                            <img src="<?php echo URLROOT; ?>/public/uploads/knuckles/<?php echo rawurlencode($img); ?>" alt="Knuckles Five Peaks" class="rounded-lg shadow-md w-full" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <h2 class="mb-3">Overview</h2>
                    <p class="text-body" style="font-size: 1.1rem; line-height: 1.8;">
                        Join us on this amazing adventure to explore <?php echo $data['tour']->location; ?>. Experience nature like never before with guided treks and beautiful landscapes.
                    </p>
                <?php endif; ?>

                <div class="text-center mt-5">
                    <a href="https://wa.me/94753949483" class="btn btn-primary btn-lg">Book This Tour</a>
                    <a href="<?php echo URLROOT; ?>" class="btn btn-outline btn-lg ml-3">Back to Home</a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .d-flex { display: flex; }
    .justify-content-center { justify-content: center; }
    .align-items-center { align-items: center; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-3 { margin-bottom: 1rem; }
    .mt-5 { margin-top: 3rem; }
    .ml-3 { margin-left: 1rem; }
    .tour-meta span { display: flex; align-items: center; gap: 0.5rem; font-weight: 500; }
</style>

<?php require '../app/views/inc/footer.php'; ?>

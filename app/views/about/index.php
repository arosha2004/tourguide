<?php require '../app/views/inc/header.php'; ?>

<main>
  <!-- Hero Section for About Page -->
  <section class="hero hero-about" id="home" style="min-height: 80vh; display: flex; align-items: center; position: relative;">
    <div class="hero-slider" id="heroSlider" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -2;">
      <?php if (!empty($data['images'])): ?>
        <?php foreach ($data['images'] as $index => $image): ?>
          <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>"
            style="background-image: url('<?php echo asset_url($image->image_url); ?>'); background-size: cover; background-position: center; width: 100%; height: 100%;">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="slide active"
          style="background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/03/IMG_8620-scaled-e1749211652491.webp'); background-size: cover; background-position: center; width: 100%; height: 100%;">
        </div>
      <?php endif; ?>
    </div>

    <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: -1;"></div>

    <div class="container hero-content reveal grid grid-2" style="gap: 2rem; align-items: center;">
      <div class="hero-text-left">
        <p class="text-accent mb-2" style="color: #ffaa00; font-weight: 500; font-size: 1.1rem;">Explore Sri Lanka in the raw nature with Lanka Trek - the trusted name in guided hiking and trekking tours.</p>
        <h1 class="hero-title" style="line-height: 1.2; margin-bottom: 2rem;">Where every trek reveals<br/>nature's true beauty</h1>
        <a href="<?php echo URLROOT; ?>/tours" class="btn btn-primary btn-lg" style="background-color: #4CAF50; border: none;">Explore Tours</a>
      </div>
      
      <div class="hero-text-right" style="display: flex; flex-direction: column; gap: 2rem;">
        <div class="mission-box" style="text-align: center;">
            <span class="subtitle" style="color: #fff; border-bottom: 1px solid #4CAF50; padding-bottom: 5px; margin-bottom: 10px; display: inline-block;">Our Mission</span>
            <p style="color: #fff; font-size: 0.95rem; line-height: 1.6; opacity: 0.9;">Our mission is to provide professional, friendly, and affordable trekking experiences that showcase the hidden beauty of Sri Lanka while ensuring safety, preserving the environment, and delivering unforgettable memories to our adventurers.</p>
        </div>
        <div class="vision-box" style="text-align: center;">
            <span class="subtitle" style="color: #fff; border-bottom: 1px solid #4CAF50; padding-bottom: 5px; margin-bottom: 10px; display: inline-block;">Our Vision</span>
            <p style="color: #fff; font-size: 0.95rem; line-height: 1.6; opacity: 0.9;">Our vision is to become Sri Lanka's leading trekking company, recognized globally for offering exceptional hiking packages, sustainable practices, and unique adventures that connect people with the island's pristine natural wonders.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Who We Are Section -->
  <section class="section about-who-we-are" style="padding: 5rem 0;">
    <div class="container">
      <div class="grid grid-2 align-center gap-xl">
        <div class="about-image-wrapper reveal">
           <img src="https://www.lankatrek.com/wp-content/uploads/2025/06/WhatsApp-Image-2025-04-17-at-5.16.21-PM-1-scaled.webp" alt="Lanka Trek Experience" style="width: 100%; border-radius: 200px 200px 20px 20px; object-fit: cover; height: 600px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);" />
        </div>
        <div class="about-content reveal delay-1 text-center" style="text-align: center;">
          <span class="badge badge-light" style="background: #e8f5e9; color: #4CAF50; padding: 5px 15px; border-radius: 20px; display: inline-block; margin-bottom: 1rem;">Who We Are</span>
          <h2 class="section-title mb-4" style="font-size: 2.5rem;">Lanka Trek | Sri Lanka's Best Trekking and Hiking Tours</h2>
          <p class="text-body mb-3" style="text-align: center;">Lanka Trek is a premier trekking company in Sri Lanka, dedicated to offering exceptional hiking and trekking experiences to both local and international travelers. With over eight years of industry expertise, we specialize in revealing the untouched beauty of Sri Lanka's natural landscapes, particularly the UNESCO World Heritage-listed Knuckles Mountain Range. Our professional and friendly guides ensure that every trek is safe, enjoyable, and unforgettable.</p>
          <p class="text-body" style="text-align: center;">We pride ourselves on promoting sustainable hiking packages at fair prices. You can unearth hidden trails and scenic views that most travelers never see. Our goal is to connect people with nature and showcase Sri Lanka's undiscovered beauty.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Promise Section -->
  <section class="section our-promise bg-light" style="padding: 5rem 0; background: #f9f9f9;">
    <div class="container">
      <div class="grid grid-2 align-center gap-xl">
        <div class="promise-images reveal grid grid-2" style="grid-template-rows: auto auto; gap: 1rem;">
           <img src="https://www.lankatrek.com/wp-content/uploads/2025/06/IMG_20190713_171741-scaled-1-e1749206869615.webp" style="grid-column: 1 / 2; grid-row: 1 / 2; width: 100%; border-radius: 10px; height: 200px; object-fit: cover;" alt="Trekking" />
           <img src="https://www.lankatrek.com/wp-content/uploads/2025/03/IMG_8620-scaled-e1749211652491.webp" style="grid-column: 1 / 2; grid-row: 2 / 3; width: 100%; border-radius: 10px; height: 200px; object-fit: cover;" alt="Waterfall" />
           <img src="https://www.lankatrek.com/wp-content/uploads/2025/06/WhatsApp-Image-2025-04-17-at-5.16.21-PM-1-scaled.webp" style="grid-column: 2 / 3; grid-row: 1 / 3; width: 100%; border-radius: 10px; height: 100%; object-fit: cover;" alt="Hiking Group" />
        </div>
        
        <div class="promise-content reveal delay-1">
          <span class="badge badge-light" style="background: #e8f5e9; color: #4CAF50; padding: 5px 15px; border-radius: 20px; display: inline-block; margin-bottom: 1rem;">Our Promise</span>
          <h2 class="section-title mb-5" style="font-size: 2.5rem;">Journey Beyond the Ordinary</h2>
          
          <div class="feature-list" style="display: flex; flex-direction: column; gap: 2rem;">
            <div class="feature-item" style="display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="feature-icon" style="background: white; padding: 15px; border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.05); color: #4CAF50;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                </div>
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Passionate Explorers</h3>
                    <p class="text-body" style="font-size: 0.95rem;">Dedicated to providing the best trekking experiences across Sri Lanka's stunning landscapes.</p>
                </div>
            </div>
            
            <div class="feature-item" style="display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="feature-icon" style="background: white; padding: 15px; border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.05); color: #4CAF50;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Experienced Guides</h3>
                    <p class="text-body" style="font-size: 0.95rem;">With 8+ years of expertise, we ensure safe, enjoyable, and well-guided adventures.</p>
                </div>
            </div>
            
            <div class="feature-item" style="display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="feature-icon" style="background: white; padding: 15px; border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.05); color: #4CAF50;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </div>
                <div>
                    <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Committed to Quality</h3>
                    <p class="text-body" style="font-size: 0.95rem;">From seamless bookings to unforgettable trails, we prioritize your satisfaction and adventure.</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Final CTA Section -->
  <section class="section about-cta" style="position: relative; padding: 8rem 0; text-align: center;">
     <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/03/IMG_8620-scaled-e1749211652491.webp'); background-size: cover; background-position: center; background-attachment: fixed; z-index: -2;"></div>
     <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: -1;"></div>
     <div class="container reveal">
        <h2 style="color: white; font-size: 3rem; max-width: 800px; margin: 0 auto; line-height: 1.3;">Join us to trek through Sri Lanka's wild landscapes and experience real adventure in nature</h2>
     </div>
  </section>
</main>

<?php require '../app/views/inc/footer.php'; ?>

<?php require '../app/views/inc/header.php'; ?>

  <main>
    <!-- Hero Section -->
    <section class="hero" id="home">
      <div class="hero-slider" id="heroSlider">
        <div class="slide active" style="background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/03/IMG_8620-scaled-e1749211652491.webp');"></div>
        <div class="slide" style="background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/06/IMG_20190713_171741-scaled-1-e1749206869615.webp');"></div>
        <div class="slide" style="background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/06/WhatsApp-Image-2025-04-17-at-5.16.21-PM-1-scaled.webp');"></div>
      </div>
      
      <div class="hero-overlay"></div>
      
      <div class="container hero-content reveal">
        <span class="badge badge-glow">Sri Lanka's Best Trekking</span>
        <h1 class="hero-title">Explore Sri Lanka's<br/>breathtaking trails</h1>
        
        <div class="hero-description-wrapper">
          <div class="squiggle-arrow">
            <svg width="80" height="150" viewBox="0 0 100 150" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- Complex loop path -->
              <path d="M45 20 C 75 15, 95 40, 80 70 C 65 100, 30 80, 35 60 C 40 40, 65 55, 65 75 C 65 95, 30 110, 60 130" stroke="white" stroke-width="2.5" stroke-linecap="round" fill="none"/>
              <!-- Paper Plane -->
              <g transform="translate(60, 130) rotate(15)">
                <path d="M0 0 L 25 10 L 0 20 L 5 10 Z" stroke="white" stroke-width="2" stroke-linejoin="round" fill="none"/>
                <path d="M5 10 L 15 15" stroke="white" stroke-width="2" stroke-linecap="round"/>
              </g>
            </svg>
          </div>
          <p class="hero-subtitle">We specialize in trekking adventures and uncovering the untouched beauty of Sri Lanka's natural landscapes</p>
        </div>
        
        <div class="hero-cta">
          <a href="#tours" class="btn btn-primary btn-lg">Explore Tours</a>
          <a href="#about" class="btn btn-glass btn-lg">Watch Video <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
        </div>
      </div>

      <!-- Overlapping feature cards -->
      <div class="container hero-features-container">
        <div class="hero-features reveal delay-1">
          <div class="feature-card">
            <h3>Climb</h3>
            <div class="feature-icon-simple">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 20L9 11L13 17L17 11L21 20H3Z"></path></svg>
            </div>
          </div>
          <div class="feature-card">
            <h3>Waterfall Hunt</h3>
            <div class="feature-icon-simple">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 8C4 8 7 7 12 7C17 7 20 8 20 8M4 12C4 12 7 11 12 11C17 11 20 12 20 12M4 16C4 16 7 15 12 15C17 15 20 16 20 16"></path></svg>
            </div>
          </div>
          <div class="feature-card">
            <h3>Village Experience</h3>
            <div class="feature-icon-simple">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 10L12 3L21 10V20H3V10Z"></path><path d="M9 20V12H15V20"></path></svg>
            </div>
          </div>
          <div class="feature-card">
            <h3>Adventure</h3>
            <div class="feature-icon-simple">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 3L4 18H20L12 3Z"></path><path d="M12 18V13"></path></svg>
            </div>
          </div>
          <div class="feature-card">
            <h3>Explore</h3>
            <div class="feature-icon-simple">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2C7.58 2 4 5.58 4 10C4 15.25 12 22 12 22C12 22 20 15.25 20 10C20 5.58 16.42 2 12 2Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
      <div class="container">
        <div class="grid grid-2 align-center gap-lg">
          <div class="about-content reveal">
            <span class="subtitle">Who We Are</span>
            <h2 class="section-title">The Ceylon Trek is a Premier Trekking Company in Sri Lanka</h2>
            <p class="text-body">Sri Lanka is a land of breathtaking landscapes from lush mountains and misty forests to golden beaches and hidden waterfalls. With rich biodiversity, vibrant culture, and scenic trails, it's a true paradise for adventure seekers.</p>
            <p class="text-body">At The Ceylon Trek, we specialize in trekking tours that go beyond the ordinary. More than just guided walks, we explore with you as friends—sharing stories, local insights, and unforgettable moments.</p>
            
            <ul class="check-list">
              <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> 2+ Years of Experience</li>
              <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Affordable Prices & Premium Quality</li>
              <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Friendly & Responsive Communication</li>
              <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Expert Guides with Extensive Knowledge</li>
            </ul>
            
            <div class="mt-4">
              <a href="#about" class="btn btn-outline">Book Now</a>
            </div>
          </div>
          
          <div class="about-image-wrapper reveal delay-1">
            <div class="image-grid">
              <img src="https://www.lankatrek.com/wp-content/uploads/2025/06/IMG_20190713_171741-scaled-1-e1749206869615.webp" alt="Sri The Ceylon Trekking Experience" class="img-large rounded-lg shadow-lg" />
              <img src="https://www.lankatrek.com/wp-content/uploads/2025/06/WhatsApp-Image-2025-04-17-at-5.16.21-PM-1-scaled.webp" alt="Hiking in Sri Lanka" class="img-small rounded-lg shadow-md" />
              <div class="experience-badge">
                <span class="number">2+</span>
                <span class="text">Years<br/>Experience</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services / Offer Section -->
    <section class="section services bg-light" id="services">
      <div class="container">
        <div class="section-header text-center reveal">
          <span class="subtitle">What We Offer</span>
          <h2 class="section-title">Feel the Real Adventure</h2>
          <p class="section-description">Get up close with nature as you trek through Sri Lanka's most stunning landscapes. Join us for unforgettable journeys through mountains and forests.</p>
        </div>
        
        <div class="grid grid-4 gap-md mt-5">
          <div class="service-card reveal">
            <div class="service-icon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <h3 class="service-title">One Day Tours</h3>
            <p class="service-desc">Choose from over 16 scenic trails. Perfect for travelers short on time but big on exploration.</p>
          </div>
          
          <div class="service-card reveal delay-1">
            <div class="service-icon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
            </div>
            <h3 class="service-title">Multi Day Tours</h3>
            <p class="service-desc">Immerse yourself in breathtaking landscapes on unique trekking routes spanning multiple days.</p>
          </div>
          
          <div class="service-card reveal delay-2">
            <div class="service-icon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 22h20L12 2z"></path><path d="M12 22V12"></path></svg>
            </div>
            <h3 class="service-title">Tent Camping</h3>
            <p class="service-desc">Experience the thrill of camping in wild beauty. Sleep under the stars and wake up to nature.</p>
          </div>
          
          <div class="service-card reveal delay-3">
            <div class="service-icon">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="10" rx="2" ry="2"></rect><circle cx="6" cy="20" r="2"></circle><circle cx="18" cy="20" r="2"></circle><line x1="14" y1="7" x2="14" y2="17"></line><line x1="2" y1="11" x2="22" y2="11"></line></svg>
            </div>
            <h3 class="service-title">RV Caravan</h3>
            <p class="service-desc">Explore Sri Lanka in comfort with our RV trailers, ideal for adventurers wanting home amenities.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Tours Section -->
    <section class="section tours" id="tours">
      <div class="container">
        <div class="section-header flex-between align-end reveal">
          <div>
            <span class="subtitle">Featured Trails</span>
            <h2 class="section-title">Amazing Trekking Spots</h2>
          </div>
          <div class="tours-header-right">
            <div class="swiper-nav-buttons">
              <button class="swiper-button-prev-custom" aria-label="Previous">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
              </button>
              <button class="swiper-button-next-custom" aria-label="Next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </button>
            </div>
            <a href="#tours" class="btn btn-outline d-none-mobile">View All Tours <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
          </div>
        </div>
        
        <div class="swiper tourSwiper mt-5">
          <div class="swiper-wrapper">
            <?php if(!empty($data['tours'])) : ?>
              <?php foreach($data['tours'] as $index => $tour) : 
                // Set badge class based on badge name
                $badge_class = 'primary';
                if(strtolower($tour->badge) == 'featured') $badge_class = 'accent';
                if(strtolower($tour->badge) == 'top rated') $badge_class = 'primary';
              ?>
              <div class="swiper-slide">
                <article class="tour-card">
                  <div class="tour-img-wrapper">
                    <img src="<?php echo $tour->image_url; ?>" alt="<?php echo $tour->title; ?>" class="tour-img" />
                    <div class="tour-badges">
                      <span class="badge-tag <?php echo $badge_class; ?>"><?php echo strtoupper($tour->badge); ?></span>
                      <button class="wishlist-btn" aria-label="Add to wishlist">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                      </button>
                    </div>
                    <div class="camera-badge">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                      <span><?php echo rand(5, 20); // Placeholder for image count ?></span>
                    </div>
                  </div>
                  <div class="tour-content">
                    <div class="tour-rating">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </div>
                    <div class="tour-location">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> 
                      <?php echo $tour->location; ?>
                    </div>
                    <h3 class="tour-title"><a href="#"><?php echo $tour->title; ?></a></h3>
                    
                    <div class="tour-price-box">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                      <span>From <strong>$<?php echo $tour->price; ?></strong></span>
                    </div>

                    <div class="tour-footer">
                      <div class="tour-duration">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 
                        <?php echo $tour->duration; ?>
                      </div>
                      <a href="#" class="tour-explore">Explore <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                  </div>
                </article>
              </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="swiper-slide">
                <p>No tours available at the moment. Please check back later.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
        
        <div class="text-center mt-5 d-show-mobile">
          <a href="#tours" class="btn btn-outline">View All Tours</a>
        </div>
      </div>
    </section>

    <!-- Assistance / Value Prop -->
    <section class="section assistance bg-primary text-white" id="assistance">
      <div class="container">
        <div class="grid grid-2 align-center gap-xl">
          <div class="assistance-content reveal">
            <span class="subtitle text-accent">Our Assistance</span>
            <h2 class="section-title text-white">Enjoy the Adventure While We Take Care of Everything</h2>
            <p class="text-body text-white-70">We ensure your comfort, safety, and needs are top priorities across every trek. From transportation to high-quality camping gear, The Ceylon Trek provides an all-inclusive experience so you can focus purely on the journey.</p>
            
            <div class="assist-features mt-4">
              <div class="assist-item">
                <div class="assist-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></div>
                <div class="assist-text">
                  <h4>Transportation</h4>
                  <p>Reliable transport to & from locations</p>
                </div>
              </div>
              <div class="assist-item">
                <div class="assist-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg></div>
                <div class="assist-text">
                  <h4>Food & Beverages</h4>
                  <p>Delicious & nutritious meals provided</p>
                </div>
              </div>
              <div class="assist-item">
                <div class="assist-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></div>
                <div class="assist-text">
                  <h4>Safety First</h4>
                  <p>Experienced guides & safety measures</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="assistance-image-wrapper reveal delay-1">
            <div class="glass-card">
              <img src="https://www.lankatrek.com/wp-content/uploads/2023/02/IMG_8620-scaled-e1749211652491.webp" alt="Trekking Assistance" class="rounded-lg shadow-lg w-full" />
              <div class="floating-badge">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <span>100% Safe & Secure</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta-section">
      <div class="container">
        <div class="cta-box reveal">
          <div class="cta-content">
            <h2>Ready for your next big adventure?</h2>
            <p>Join thousands of happy trekkers who have explored Sri Lanka with us.</p>
          </div>
          <div class="cta-action">
            <a href="https://wa.me/94753949483" class="btn btn-white btn-lg">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              WhatsApp Us
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php require '../app/views/inc/footer.php'; ?>

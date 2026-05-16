<?php require '../app/views/inc/header.php'; ?>

<main>
  <!-- Page Header -->
  <section class="page-header" style="padding-top: 120px; padding-bottom: 60px; background-color: var(--light);">
    <div class="container text-center">
      <span class="subtitle">Search Results</span>
      <h1 class="section-title">
        <?php if (!empty($data['keyword'])): ?>
          Results for "<?php echo htmlspecialchars($data['keyword']); ?>"
        <?php else: ?>
          All Tours
        <?php endif; ?>
      </h1>
      <p class="section-description">
        <?php echo count($data['tours']); ?> tours found.
      </p>
    </div>
  </section>

  <!-- Results Grid -->
  <section class="section tours" id="search-results" style="padding-top: 2rem;">
    <div class="container">
      <div class="grid grid-3 gap-lg">
        <?php if (!empty($data['tours'])): ?>
          <?php foreach ($data['tours'] as $index => $tour):
            // Set badge class based on badge name
            $badge_class = 'primary';
            if (strtolower($tour->badge) == 'featured')
              $badge_class = 'accent';
            if (strtolower($tour->badge) == 'top rated')
              $badge_class = 'primary';
            ?>
            <article class="tour-card" style="margin-bottom: 2rem;">
              <div class="tour-img-wrapper">
                <img src="<?php echo asset_url($tour->image_url); ?>" alt="<?php echo htmlspecialchars($tour->title); ?> - Sri Lanka Trekking" class="tour-img" loading="lazy" />
                <div class="tour-badges">
                  <span class="badge-tag <?php echo $badge_class; ?>"><?php echo strtoupper($tour->badge); ?></span>

                </div>
                <div class="camera-badge">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                  </svg>
                  <span><?php echo rand(5, 20); ?></span>
                </div>
              </div>
              <div class="tour-content">
                <div class="tour-rating">
                  <?php for($i=0; $i<5; $i++): ?>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="#FFB800" stroke="#FFB800" stroke-width="2">
                      <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                  <?php endfor; ?>
                </div>
                <div class="tour-location">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg>
                  <?php echo $tour->location; ?>
                </div>
                <h3 class="tour-title"><a href="<?php echo URLROOT; ?>/tours/show/<?php echo $tour->id; ?>"><?php echo $tour->title; ?></a></h3>

                <div class="tour-price-box">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                  </svg>
                  <span>From <strong>$<?php echo $tour->price; ?></strong></span>
                </div>

                <div class="tour-footer">
                  <div class="tour-duration">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="10"></circle>
                      <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <?php echo $tour->duration; ?>
                  </div>
                  <a href="<?php echo URLROOT; ?>/tours/show/<?php echo $tour->id; ?>" class="tour-explore">Explore <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                    </svg></a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12" style="grid-column: 1 / -1; text-align: center; padding: 4rem 0;">
            <div style="margin-bottom: 2rem; color: var(--secondary);">
              <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </div>
            <h3>No tours found matching your search.</h3>
            <p>Try different keywords or browse all our tours.</p>
            <a href="<?php echo URLROOT; ?>/tours" class="btn btn-primary mt-4">View All Tours</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php require '../app/views/inc/footer.php'; ?>

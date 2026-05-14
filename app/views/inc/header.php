<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $data['title']; ?></title>
  <meta name="description" content="The Ceylon Trek offers the best Sri Lanka hiking and trekking Tours. Explore unique trails, stunning waterfalls & misty peaks in Sri Lanka. Book Now!" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/styles.css" />
  <link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/public/logo.png" />
</head>
<body>
  <!-- Navigation -->
  <header class="header" id="header">
    <div class="container header-inner">
      <a href="#home" class="brand">
        <img src="<?php echo URLROOT; ?>/public/logo.png" alt="The Ceylon Trek Logo" class="brand-logo" />
      </a>
      
      <nav class="nav" id="navMenu">
        <a href="<?php echo URLROOT; ?>/#home" class="nav-link active">Home</a>
        <a href="<?php echo URLROOT; ?>/#about" class="nav-link">About Us</a>
        <a href="<?php echo URLROOT; ?>/tours" class="nav-link">Tours <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
        <a href="<?php echo URLROOT; ?>/#blog" class="nav-link">Blog</a>
        <a href="<?php echo URLROOT; ?>/gallery" class="nav-link">Gallery</a>
        <a href="<?php echo URLROOT; ?>/#testimonials" class="nav-link">Testimonials</a>
        <a href="<?php echo URLROOT; ?>/#contact" class="nav-link">Contact Us</a>
      </nav>
      
      <div class="header-actions">
        <button class="search-toggle" aria-label="Search">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
      </div>
    </div>
  </header>

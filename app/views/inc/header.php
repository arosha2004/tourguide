<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($data['title']); ?></title>
  
  <?php
    $default_description = "The Ceylon Trek offers the best Sri Lanka hiking and trekking Tours. Explore unique trails, stunning waterfalls & misty peaks in Sri Lanka. Book Now!";
    $description = isset($data['description']) ? $data['description'] : $default_description;
    
    $default_keywords = "Sri Lanka trekking, hiking tours, Ceylon trek, mountain trails, waterfalls, adventure travel";
    $keywords = isset($data['keywords']) ? $data['keywords'] : $default_keywords;
    
    $og_image = isset($data['og_image']) 
        ? (strpos($data['og_image'], 'http') === 0 ? $data['og_image'] : asset_url($data['og_image'])) 
        : URLROOT . '/public/logo-transparent.png';
        
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    // Canonical URL: use only scheme + host + path (strip query strings for clean canonicals)
    $request_path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    $canonical_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $request_path;
    
    // CSS asset version (update this string on each deployment, not time() which busts cache every request)
    define('ASSET_VER', '1.0.5');
  ?>
  <meta name="description" content="<?php echo htmlspecialchars($description); ?>" />
  <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="The Ceylon Trek" />
  
  <!-- Open Graph / Social Media -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>" />
  <meta property="og:title" content="<?php echo htmlspecialchars($data['title']); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>" />
  <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:site_name" content="The Ceylon Trek" />
  <meta property="og:locale" content="en_US" />
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo htmlspecialchars($data['title']); ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>" />
  <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>" />
  
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>" />
  
  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "TravelAgency",
    "name": "The Ceylon Trek",
    "url": "<?php echo URLROOT; ?>",
    "logo": "<?php echo URLROOT; ?>/public/logo-transparent.png",
    "description": "<?php echo addslashes($description); ?>",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Colombo",
      "addressCountry": "LK"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+94-77-756-2425",
      "contactType": "customer service",
      "availableLanguage": ["English", "Sinhala"]
    },
    "sameAs": []
  }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/styles.css?v=<?php echo ASSET_VER; ?>" />
  <link rel="icon" type="image/png" href="<?php echo URLROOT; ?>/public/logo-transparent.png" />
</head>
<body>
  <?php 
    // Detect if we are on the home page
    $is_home = ($data['title'] == 'The Ceylon Trek | Sri Lanka\'s Best Trekking & Hiking Tours');
    
    // Determine the active page
    $current_page = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
    $url_parts = explode('/', $current_page);
    $base_page = strtolower($url_parts[0]);
    
    // Check if header should be hidden at the top
    $hide_header_top = ($base_page == 'home' || $base_page == 'about' || $base_page == '');
  ?>
  <!-- Navigation -->
  <?php if ($hide_header_top): ?>
    <div class="header-hover-trigger"></div>
  <?php endif; ?>
  <header class="header <?php echo !$is_home ? 'header-subpage' : ''; ?> <?php echo $hide_header_top ? 'header-hidden-top' : ''; ?>" id="header">
    <div class="container header-inner">
      <a href="<?php echo URLROOT; ?>/" class="brand" aria-label="The Ceylon Trek - Home">
        <img src="<?php echo URLROOT; ?>/public/logo-transparent.png" alt="The Ceylon Trek Logo" class="brand-logo" />
      </a>
      
      <nav class="nav" id="navMenu" role="navigation" aria-label="Main navigation">
        <a href="<?php echo URLROOT; ?>/#home" class="nav-link <?php echo ($base_page == 'home' || $base_page == '') ? 'active' : ''; ?>">Home</a>
        <a href="<?php echo URLROOT; ?>/about" class="nav-link <?php echo ($base_page == 'about') ? 'active' : ''; ?>">About Us</a>
        <a href="<?php echo URLROOT; ?>/tours" class="nav-link <?php echo ($base_page == 'tours') ? 'active' : ''; ?>">Tours <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
        <a href="<?php echo URLROOT; ?>/gallery" class="nav-link <?php echo ($base_page == 'gallery') ? 'active' : ''; ?>">Gallery</a>
        <a href="<?php echo URLROOT; ?>/contact" class="nav-link <?php echo ($base_page == 'contact') ? 'active' : ''; ?>">Contact Us</a>
      </nav>
      
      <div class="header-actions">
        <div class="search-container-small" id="searchOverlay">
          <form action="<?php echo URLROOT; ?>/tours/search" method="GET" class="search-form-small">
            <input type="text" name="q" placeholder="Search..." class="search-input-small" id="searchInput" autocomplete="off" />
            <button type="submit" class="search-submit-small" aria-label="Submit Search">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
          </form>
        </div>
        <button class="search-toggle" aria-label="Search">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
      </div>
    </div>
    
  </header>

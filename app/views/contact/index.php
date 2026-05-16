<?php require '../app/views/inc/header.php'; ?>

<style>
  :root {
    --contact-bg: #f8fafc;
    --input-bg: #f1f5f9;
  }

  .contact-hero {
    padding: 8rem 0 4rem;
    text-align: center;
    background: #fff;
  }

  .contact-hero h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-bottom: 3rem;
    color: #1a1a1a;
  }

  .info-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
  }

  .info-card {
    background: #fff;
    padding: 3rem 2rem;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    text-align: center;
    transition: var(--transition);
    border: 1px solid #f1f5f9;
  }

  .info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
  }

  .info-card .icon-wrapper {
    width: 70px;
    height: 70px;
    background: #f1f5f9;
    color: #4CAF50;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
  }

  .info-card h3 {
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
    color: #1a1a1a;
  }

  .info-card p {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
  }

  .contact-main-section {
    padding: 6rem 0;
    background: #fff;
  }

  .contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 5rem;
    align-items: start;
  }

  .contact-text-content h2 {
    font-size: 2.75rem;
    font-weight: 800;
    margin-bottom: 2rem;
    color: #1a1a1a;
  }

  .contact-text-content p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #64748b;
  }

  .contact-form {
    display: grid;
    gap: 1.5rem;
  }

  .form-group label {
    display: block;
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #1a1a1a;
  }

  .form-control {
    width: 100%;
    padding: 1rem 1.25rem;
    background: var(--input-bg);
    border: none;
    border-radius: 8px;
    font-family: var(--font-body);
    font-size: 1rem;
    color: #1a1a1a;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    outline: none;
    background: #e2e8f0;
  }

  textarea.form-control {
    min-height: 180px;
    resize: none;
  }

  .btn-submit {
    background: #4CAF50;
    color: #fff;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    width: fit-content;
    margin-left: auto;
    transition: all 0.3s ease;
  }

  .btn-submit:hover {
    background: #43a047;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(76, 175, 80, 0.2);
  }

  @media (max-width: 992px) {
    .contact-grid {
      grid-template-columns: 1fr;
      gap: 3rem;
    }
  }
</style>

<main>
  <!-- Hero Section -->
  <section class="contact-hero">
    <div class="container">
      <h1 class="reveal">Ready for Your Next Adventure?<br>Feel Free to Contact Us</h1>

      <div class="info-cards-grid reveal delay-1">
        <!-- Office Location -->
        <div class="info-card">
          <div class="icon-wrapper">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <h3>Office Location</h3>
          <p>Colombo.</p>
        </div>

        <!-- Email Address -->
        <div class="info-card">
          <div class="icon-wrapper">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </div>
          <h3>Email Address</h3>
          <p>bookings@lankatrek.com</p>
        </div>

        <!-- WhatsApp -->
        <div class="info-card">
          <div class="icon-wrapper">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
              </path>
            </svg>
          </div>
          <h3>WhatsApp</h3>
          <p>+94 75 3949 483</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="contact-main-section">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-text-content reveal">
          <h2>Get in Touch with Us</h2>
          <p>We're here to help you plan your perfect adventure! Our friendly team is ready to assist with travel
            packages, bookings, and any information you need about your next trip. We love helping travelers discover
            amazing experiences and make their dream journeys come true. Get in touch with us today and let's start
            planning something incredible together!</p>
        </div>

        <div class="contact-form-wrapper reveal delay-1">
          <?php if (isset($data['success']) && $data['success']): ?>
            <div style="background: #e8f5e9; border-left: 4px solid #4CAF50; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; color: #2e7d32;">
              ✓ Your message has been sent! We'll get back to you shortly.
            </div>
          <?php elseif (isset($data['error'])): ?>
            <div style="background: #fdecea; border-left: 4px solid #f44336; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; color: #c62828;">
              ✕ <?php echo htmlspecialchars($data['error']); ?>
            </div>
          <?php endif; ?>
          <form action="<?php echo URLROOT; ?>/contact/send" method="POST" class="contact-form">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>

            <div class="form-group">
              <label for="phone">Contact Number</label>
              <input type="text" id="phone" name="phone" class="form-control" placeholder="Your Contact Number"
                required>
            </div>

            <div class="form-group">
              <label for="message">Message (required)</label>
              <textarea id="message" name="message" class="form-control" placeholder="Your Message" required></textarea>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require '../app/views/inc/footer.php'; ?>
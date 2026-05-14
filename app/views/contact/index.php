<?php require '../app/views/inc/header.php'; ?>

<style>
  .contact-form-container {
    background: var(--surface);
    padding: 3rem;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
  }
  .form-group {
    margin-bottom: 1.5rem;
  }
  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-dark);
  }
  .form-control {
    width: 100%;
    padding: 1rem 1.5rem;
    border: 1px solid rgba(18, 55, 42, 0.1);
    border-radius: var(--radius-sm);
    font-family: var(--font-body);
    font-size: 1rem;
    color: var(--text-dark);
    background-color: var(--surface-off);
    transition: var(--transition);
  }
  .form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(18, 55, 42, 0.1);
    background-color: var(--surface);
  }
  textarea.form-control {
    resize: vertical;
    min-height: 150px;
  }
  .contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2rem;
  }
  .contact-icon {
    width: 50px;
    height: 50px;
    background: rgba(18, 55, 42, 0.05);
    color: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .contact-info-text h3 {
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
  }
  .contact-info-text p {
    color: var(--text-body);
  }
</style>

<main>
  <!-- Hero Section for Contact Page -->
  <section class="hero" id="home" style="min-height: 50vh; display: flex; align-items: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://www.lankatrek.com/wp-content/uploads/2025/03/IMG_8620-scaled-e1749211652491.webp'); background-size: cover; background-position: center; z-index: -2;"></div>
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(10,34,24,0.7), rgba(10,34,24,0.9)); z-index: -1;"></div>

    <div class="container text-center reveal" style="padding-top: 4rem;">
      <span class="badge badge-glow">Get In Touch</span>
      <h1 class="hero-title" style="font-size: 3.5rem; margin-bottom: 1rem;">Contact Us</h1>
      <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Have a question or ready to book your next adventure? We're here to help you plan the perfect trek through Sri Lanka's beautiful landscapes.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="section bg-light" style="padding: 5rem 0;">
    <div class="container">
      <div class="grid grid-2 gap-xl align-start">
        
        <!-- Contact Information -->
        <div class="contact-info reveal">
          <h2 class="section-title" style="font-size: 2.2rem; margin-bottom: 2rem;">Let's Start Your Adventure</h2>
          <p class="text-body mb-5" style="margin-bottom: 3rem;">Whether you are looking for a customized trekking package or need more information about our trails, our team is ready to assist you. Drop us a message or visit us!</p>
          
          <div class="contact-info-list">
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              </div>
              <div class="contact-info-text">
                <h3>Call Us</h3>
                <p>+94 77 123 4567<br>+94 71 987 6543</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
              <div class="contact-info-text">
                <h3>Email Us</h3>
                <p>info@lankatrek.com<br>bookings@lankatrek.com</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              </div>
              <div class="contact-info-text">
                <h3>Visit Us</h3>
                <p>123 Adventure Road,<br>Kandy, Sri Lanka</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-container reveal delay-1">
          <h3 style="font-size: 1.5rem; margin-bottom: 2rem;">Send us a message</h3>
          <form action="#" method="POST">
            <div class="form-group">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
            </div>
            
            <div class="form-group">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
            </div>
            
            <div class="form-group">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" id="subject" name="subject" class="form-control" placeholder="Trekking Package Inquiry" required>
            </div>
            
            <div class="form-group">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" name="message" class="form-control" placeholder="Tell us about your plans..." required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary w-full" style="width: 100%;">Send Message</button>
          </form>
        </div>
        
      </div>
    </div>
  </section>
  
  <!-- Map Section -->
  <section style="height: 400px; width: 100%; background: #e0e0e0;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126743.63162584107!2d80.56041773099958!3d7.294543952328456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x41120b4a45a30ea6!2sKandy%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1715664123456!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

</main>

<?php require '../app/views/inc/footer.php'; ?>

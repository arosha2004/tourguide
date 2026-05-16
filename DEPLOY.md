# Deployment Guide — The Ceylon Trek → Namecheap

## Overview
This is a PHP MVC application. On Namecheap shared hosting it lives entirely
inside `public_html/`. The root `.htaccess` routes all requests into `public/`.

---

## Step 1 — Export your local database

1. Open: **http://localhost/tourguide/db_export.php**
2. A `.sql` file will download automatically.
3. Keep it safe — you'll import it on Namecheap.
4. **Delete `db_export.php`** from the project before uploading.

---

## Step 2 — Create the database on Namecheap cPanel

1. Log in to **cPanel** → **MySQL Databases**
2. Create a new database, e.g. `cpaneluser_tourguide`
3. Create a new database user, e.g. `cpaneluser_trek` with a strong password
4. **Add user to database** → grant **ALL PRIVILEGES**
5. Go to **phpMyAdmin** → select your new database → **Import** → choose the `.sql` file downloaded in Step 1

---

## Step 3 — Update config.php

Open `app/config/config.php` and update the DB section:

```php
define('DB_HOST', 'localhost');                  // usually stays as localhost
define('DB_USER', 'cpaneluser_trek');            // your cPanel DB user
define('DB_PASS', 'YourStrongPasswordHere');     // your DB password
define('DB_NAME', 'cpaneluser_tourguide');       // your DB name
```

> **URLROOT is auto-detected** — no need to change it. It reads the domain
> from the server automatically (`https://yourdomain.com`).

---

## Step 4 — Enable HTTPS redirect (optional but recommended)

In the root `.htaccess`, uncomment these two lines:

```apacheconf
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

## Step 5 — Upload files to Namecheap

### Via cPanel File Manager
1. cPanel → **File Manager** → open `public_html/`
2. Delete the default placeholder files (`index.html`, etc.)
3. Upload a **ZIP** of the entire `tourguide/` folder contents
   (so that `.htaccess`, `app/`, `public/` etc. are directly inside `public_html/`)
4. Right-click the ZIP → **Extract**

### Via FTP (FileZilla)
1. Connect using your Namecheap FTP credentials
2. Navigate to `/public_html/`
3. Upload ALL files/folders from inside your local `tourguide/` folder

### Folder structure on server
```
public_html/
├── .htaccess          ← root htaccess (routes to public/, sitemap.xml, robots.txt)
├── app/
│   ├── config/config.php
│   ├── controllers/
│   │   ├── SitemapController.php  ← serves /sitemap.xml
│   │   └── ...
│   ├── core/
│   ├── models/
│   └── views/
└── public/
    ├── .htaccess      ← MVC router
    ├── index.php
    ├── robots.txt     ← search engine crawl rules
    ├── styles.css
    ├── script.js
    ├── logo.png
    └── uploads/       ← your images
```

---

## Step 6 — Upload your images

The `public/uploads/` folder contains your tour and gallery images.
Make sure it is uploaded with the rest of the files.

Set folder permissions (cPanel File Manager → right-click → Permissions):
- `public/uploads/` → **755**
- All files inside → **644**

---

## Step 7 — Verify PHP version

Namecheap cPanel → **Select PHP Version** → choose **PHP 8.0** or higher.

Enable extensions: `pdo`, `pdo_mysql`, `mbstring`, `fileinfo`

---

## Step 8 — Test

Visit your domain and check:
- [ ] Home page loads with hero slideshow
- [ ] Tours section shows cards with images
- [ ] Clicking a tour opens the detail page with photos
- [ ] Gallery page displays images
- [ ] Contact form submits successfully
- [ ] Admin panel: `yourdomain.com/admin` → add a test tour
- [ ] `yourdomain.com/robots.txt` → shows crawl rules
- [ ] `yourdomain.com/sitemap.xml` → shows XML sitemap with all pages
- [ ] Submit sitemap to Google Search Console
- [ ] Test structured data with: https://search.google.com/test/rich-results
- [ ] Test Open Graph with: https://developers.facebook.com/tools/debug/

---

## Cleanup

Delete these files from the server after a successful deploy:
- `db_export.php`
- `migrate_images.php`
- `migrate_tour_extras.php`
- `create_gallery.php`
- `setup_db.php`
- `DEPLOY.md` (this file)

---

## Troubleshooting

| Problem | Fix |
|---------|-----|
| Blank page / 500 error | Enable PHP error display temporarily; check `.htaccess` syntax |
| CSS not loading | Ensure `public/styles.css` is uploaded; check browser console |
| Images broken | Check `public/uploads/` permissions are 755; re-upload images |
| DB connection error | Double-check `config.php` DB credentials match cPanel |
| 404 on all pages | Ensure `mod_rewrite` is enabled; check both `.htaccess` files exist |
| Redirects to localhost | Clear browser cache; URLROOT is now auto-detected |
| sitemap.xml shows 404 | Ensure `SitemapController.php` was uploaded and `mod_rewrite` is on |
| Contact form not sending | Configure cPanel email; PHP `mail()` needs an SMTP relay on Namecheap |

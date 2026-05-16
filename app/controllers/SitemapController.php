<?php

class SitemapController extends Controller {
    public function index() {
        $tourModel = $this->model('Tour');
        $tours = $tourModel->getTours();

        header('Content-Type: application/xml; charset=utf-8');
        header('Cache-Control: public, max-age=86400');

        $urlroot = rtrim(URLROOT, '/');
        $today = date('Y-m-d');

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        echo '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
        echo '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
        echo '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        // Static pages
        $static_pages = [
            ['loc' => $urlroot . '/',         'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $urlroot . '/about',     'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $urlroot . '/tours',     'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $urlroot . '/gallery',   'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $urlroot . '/contact',   'priority' => '0.7', 'changefreq' => 'yearly'],
        ];

        foreach ($static_pages as $page) {
            echo "  <url>\n";
            echo "    <loc>" . htmlspecialchars($page['loc']) . "</loc>\n";
            echo "    <lastmod>" . $today . "</lastmod>\n";
            echo "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
            echo "    <priority>" . $page['priority'] . "</priority>\n";
            echo "  </url>\n";
        }

        // Dynamic tour pages
        if (!empty($tours)) {
            foreach ($tours as $tour) {
                echo "  <url>\n";
                echo "    <loc>" . htmlspecialchars($urlroot . '/tours/show/' . $tour->id) . "</loc>\n";
                echo "    <lastmod>" . $today . "</lastmod>\n";
                echo "    <changefreq>monthly</changefreq>\n";
                echo "    <priority>0.8</priority>\n";
                echo "  </url>\n";
            }
        }

        echo '</urlset>';
        exit;
    }
}

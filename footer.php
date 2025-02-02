<?php
/**
 * The footer template for LEAGUE MATE
 */
?>

<footer class="site-footer">
    <div class="footer-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Column -->
                <div class="col-span-1">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                        LEAGUE MATE
                    </a>
                    <p class="mt-4 text-sm">
                        Your ultimate companion for sports updates, scores, and community engagement.
                    </p>
                    <div class="social-links mt-6 flex space-x-4">
                        <a href="#" class="social-icon">
                            <span class="sr-only">Facebook</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="#" class="social-icon">
                            <span class="sr-only">Twitter</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                        </a>
                        <a href="#" class="social-icon">
                            <span class="sr-only">Instagram</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-span-1">
                    <h3 class="footer-heading">Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-1',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>

                <!-- Sports -->
                <div class="col-span-1">
                    <h3 class="footer-heading">Sports</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-2',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>

                <!-- Newsletter -->
                <div class="col-span-1">
                    <h3 class="footer-heading">Stay Updated</h3>
                    <p class="text-sm mb-4">Subscribe to our newsletter for the latest sports updates.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email" class="newsletter-input">
                        <button type="submit" class="newsletter-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm">
                    &copy; <?php echo date('Y'); ?> LEAGUE MATE. All rights reserved.
                </div>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-sm hover:text-primary">Privacy Policy</a>
                    <a href="#" class="text-sm hover:text-primary">Terms of Service</a>
                    <a href="#" class="text-sm hover:text-primary">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .site-footer {
        background: #ffffff;
        border-top: 3px solid var(--primary-blue);
    }

    .footer-main {
        border-bottom: 1px solid rgba(9, 27, 71, 0.1);
    }

    .footer-logo {
        color: var(--primary-blue);
        font-weight: 700;
        font-size: 1.5rem;
        letter-spacing: -0.5px;
        text-decoration: none;
    }

    .footer-heading {
        color: var(--text-navy);
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .footer-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-menu li {
        margin-bottom: 0.5rem;
    }

    .footer-menu a {
        color: var(--text-navy);
        text-decoration: none;
        font-size: 0.875rem;
        transition: color 0.2s ease;
    }

    .footer-menu a:hover {
        color: var(--primary-blue);
    }

    .social-icon {
        color: var(--text-navy);
        transition: color 0.2s ease;
    }

    .social-icon:hover {
        color: var(--primary-blue);
    }

    .newsletter-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid rgba(9, 27, 71, 0.2);
        border-radius: 4px;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .newsletter-button {
        width: 100%;
        background: var(--primary-blue);
        color: white;
        padding: 0.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .newsletter-button:hover {
        background: var(--text-navy);
    }

    .footer-bottom {
        background: rgba(9, 27, 71, 0.02);
    }

    .footer-bottom a {
        color: var(--text-navy);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .footer-bottom a:hover {
        color: var(--primary-blue);
    }

    @media (max-width: 768px) {
        .footer-bottom {
            text-align: center;
        }
    }
</style>

<?php wp_footer(); ?>
</body>
</html>
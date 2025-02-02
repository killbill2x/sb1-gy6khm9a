<?php
/**
 * The header template for LEAGUE MATE
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="LEAGUE MATE">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <?php if (has_post_thumbnail()): ?>
        <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_theme_file_uri('assets/favicon.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_file_uri('assets/apple-touch-icon.png')); ?>">

    <!-- Preconnect to essential domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    <style>
        :root {
            --primary-blue: #007ff;
            --text-navy: #091b47;
            --accent-pink: #b3446c;
            --accent-green: #4a5d23;
        }
        
        body {
            color: var(--text-navy);
            font-family: 'Inter', sans-serif;
        }

        .site-header {
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-bottom: 3px solid var(--primary-blue);
        }

        .site-header .site-title {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.75rem;
            letter-spacing: -0.5px;
        }

        .site-header .site-description {
            color: var(--text-navy);
            font-size: 0.875rem;
            opacity: 0.8;
        }

        .site-nav a {
            color: var(--text-navy);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        .site-nav a:hover {
            color: var(--primary-blue);
            background: rgba(0,127,255,0.05);
        }

        .site-nav .current-menu-item > a {
            color: var(--primary-blue);
            background: rgba(0,127,255,0.1);
        }

        .menu-toggle {
            color: var(--text-navy);
        }

        .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 4px;
            border: 1px solid rgba(0,0,0,0.05);
            z-index: 100;
        }

        .site-nav li:hover > .sub-menu {
            display: block;
        }

        .login-button {
            background: var(--primary-blue);
            color: white !important;
            padding: 0.5rem 1.25rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .login-button:hover {
            background: var(--text-navy) !important;
            color: white !important;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            .site-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 1rem;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            .site-nav.active {
                display: block;
            }
            .sub-menu {
                position: static;
                box-shadow: none;
                padding-left: 1rem;
                border: none;
                background: rgba(0,127,255,0.03);
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <div class="flex flex-col">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                            LEAGUE MATE
                        </a>
                        <span class="site-description"><?php bloginfo('description'); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <button class="menu-toggle md:hidden" aria-controls="primary-menu" aria-expanded="false">
                <span class="sr-only">Toggle menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <nav id="site-navigation" class="site-nav md:block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'flex flex-col md:flex-row md:space-x-4 md:items-center',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <div class="hidden md:flex items-center space-x-4">
                <?php if (!is_user_logged_in()): ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>" class="login-button">
                        Login
                    </a>
                <?php else: ?>
                    <a href="<?php echo esc_url(wp_logout_url()); ?>" class="login-button">
                        Logout
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.querySelector('.site-nav');
    
    if (menuToggle && siteNav) {
        menuToggle.addEventListener('click', function() {
            siteNav.classList.toggle('active');
            menuToggle.setAttribute(
                'aria-expanded',
                menuToggle.getAttribute('aria-expanded') === 'false' ? 'true' : 'false'
            );
        });
    }
});
</script>
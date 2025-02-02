<?php get_header(); ?>

<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-section bg-gradient-to-r from-[#007ff] to-[#091b47] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Find Your Perfect League Match</h1>
                    <p class="text-xl mb-8 opacity-90">Connect with local leagues, players, and sports enthusiasts in your area.</p>
                    <?php if (!is_user_logged_in()): ?>
                        <a href="<?php echo esc_url(wp_registration_url()); ?>" class="bg-white text-[#091b47] px-6 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all inline-block mr-4">
                            Create Profile
                        </a>
                        <a href="<?php echo esc_url(wp_login_url()); ?>" class="border-2 border-white text-white px-6 py-2 rounded-lg font-semibold hover:bg-white hover:text-[#091b47] transition-all inline-block">
                            Sign In
                        </a>
                    <?php endif; ?>
                </div>
                <div class="hidden md:block">
                    <img src="https://images.unsplash.com/photo-1526676037777-05a232554f77?auto=format&fit=crop&q=80" 
                         alt="Sports Team" 
                         class="rounded-lg shadow-xl w-full max-w-md mx-auto"
                         width="400"
                         height="300">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Players Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-[#091b47]">Featured Players</h2>
                <div class="flex items-center space-x-4">
                    <select class="rounded-lg border-gray-300 text-[#091b47] text-sm">
                        <option>All Sports</option>
                        <option>Football</option>
                        <option>Basketball</option>
                        <option>Tennis</option>
                    </select>
                    <select class="rounded-lg border-gray-300 text-[#091b47] text-sm">
                        <option>All Skill Levels</option>
                        <option>Beginner (★)</option>
                        <option>Intermediate (★★★)</option>
                        <option>Expert (★★★★★)</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <?php
                $featured_players = array(
                    array(
                        'name' => 'John Doe',
                        'sport' => 'Football',
                        'skill' => 4.5,
                        'badges' => 12,
                        'available' => true,
                        'image' => 'https://images.unsplash.com/photo-1633332755192-727a05c4013d?auto=format&fit=crop&q=80'
                    ),
                );

                foreach ($featured_players as $player): ?>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="relative">
                            <img src="<?php echo esc_url($player['image']); ?>" 
                                 alt="<?php echo esc_attr($player['name']); ?>"
                                 class="w-full h-32 object-cover"
                                 width="200"
                                 height="200">
                            <?php if ($player['available']): ?>
                                <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-0.5 rounded-full text-xs font-semibold flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 11v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-8M7 11l5-5 5 5M12 6v8"/>
                                    </svg>
                                    Pick Me!
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-3">
                            <h3 class="text-base font-bold text-[#091b47]"><?php echo esc_html($player['name']); ?></h3>
                            <div class="flex items-center mt-1">
                                <div class="text-yellow-400 text-sm">
                                    <?php
                                    $rating = $player['skill'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '★';
                                        } elseif ($i - 0.5 <= $rating) {
                                            echo '⯨';
                                        } else {
                                            echo '☆';
                                        }
                                    }
                                    ?>
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(<?php echo $player['skill']; ?>)</span>
                            </div>
                            <div class="mt-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b3446c]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <span class="text-xs text-gray-600 ml-1"><?php echo $player['badges']; ?> Sportsmanship Badges</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Active Leagues Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-[#091b47]">Active Leagues</h2>
                <a href="#" class="bg-[#007ff] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90 transition-all">
                    Create League
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                $active_leagues = array(
                    array(
                        'name' => 'Downtown Basketball League',
                        'sport' => 'Basketball',
                        'level' => 'Intermediate',
                        'location' => 'Central Community Center',
                        'spots' => 4,
                        'logo' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&q=80'
                    ),
                );

                foreach ($active_leagues as $league): ?>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center mb-3">
                                <img src="<?php echo esc_url($league['logo']); ?>" 
                                     alt="<?php echo esc_attr($league['name']); ?>"
                                     class="w-12 h-12 rounded-full object-cover mr-3">
                                <div>
                                    <h3 class="text-base font-bold text-[#091b47]"><?php echo esc_html($league['name']); ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo esc_html($league['sport']); ?></p>
                                </div>
                            </div>
                            <div class="space-y-2 mb-3">
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <span class="text-sm"><?php echo esc_html($league['location']); ?></span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                        <circle cx="9" cy="7" r="4"/>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    </svg>
                                    <span class="text-sm"><?php echo $league['spots']; ?> spots available</span>
                                </div>
                            </div>
                            <a href="#" class="block text-center bg-[#4a5d23] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90 transition-all">
                                Join League
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Equipment Donation Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-[#007ff] to-[#091b47] rounded-xl text-white p-6 md:p-8">
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-3">Donate Sports Equipment</h2>
                        <p class="text-base mb-4 opacity-90">Help make sports accessible to everyone. Donate your gently used equipment to those in need.</p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <span class="text-sm">Safe and secure pickup locations</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                </svg>
                                <span class="text-sm">Law enforcement monitored exchanges</span>
                            </div>
                        </div>
                        <a href="#" class="inline-block mt-6 bg-white text-[#091b47] px-6 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90 transition-all">
                            Donate Equipment
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <img src="https://images.unsplash.com/photo-1599058917765-a780eda07a3e?auto=format&fit=crop&q=80" 
                             alt="Sports Equipment" 
                             class="rounded-lg shadow-xl w-full max-w-sm mx-auto"
                             width="300"
                             height="200">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .pagination {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .pagination a,
    .pagination span {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        background: white;
        color: var(--text-navy);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .pagination a:hover {
        background: var(--primary-blue);
        color: white;
    }

    .pagination .current {
        background: var(--primary-blue);
        color: white;
    }
</style>

<?php get_footer(); ?>
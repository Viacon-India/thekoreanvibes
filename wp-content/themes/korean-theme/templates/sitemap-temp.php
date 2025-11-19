<?php 
/* Template Name: Sitemap Page
*/ 
get_header();

$categories = get_categories(array(
    'hide_empty' => true,
));
?>

<section class="sitemap-sec py-16 bg-gradient-to-br from-gray-50 via-white to-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <!-- Page Header -->
        <div class="page-header text-center mb-16">
            <div class="inline-block mb-4">
                <svg class="w-16 h-16 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4"><?php the_title(); ?></h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Navigate through all pages and categories on our website</p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="sitemap-content">
            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                
                <!-- Left Column - Main Pages -->
                <div class="sitemap-column">
                    <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Pages</h2>
                        </div>
                        
                        <ul class="space-y-2">
                            <!-- Static Links -->
                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/'); ?>">
                                    <span class="link-text">Home</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>
                            
                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/about-us'); ?>">
                                    <span class="link-text">About Us</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>

                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/contact-us'); ?>">
                                    <span class="link-text">Contact Us</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>

                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/write-for-us'); ?>">
                                    <span class="link-text">Write For Us</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>

                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/advertise'); ?>">
                                    <span class="link-text">Advertise</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>

                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/terms-and-conditions'); ?>">
                                    <span class="link-text">Terms And Conditions</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>

                            <li class="sitemap-item">
                                <a class="sitemap-link group" href="<?php echo home_url('/privacy-policy'); ?>">
                                    <span class="link-text">Privacy Policy</span>
                                    <span class="link-arrow">→</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column - Categories -->
                <div class="sitemap-column">
                    <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Categories</h2>
                        </div>
                        
                        <ul class="space-y-2">
                            <?php foreach ($categories as $category) : ?>
                                <li class="sitemap-item">
                                    <a class="sitemap-link group" href="<?php echo get_category_link($category->term_id); ?>">
                                        <span class="link-text"><?php echo esc_html($category->name); ?></span>
                                        <span class="link-arrow">→</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

      

    </div>
</section>

<style>
/* Main Section Styling */
.sitemap-sec {
    min-height: 70vh;
}

/* Sitemap Item */
.sitemap-item {
    position: relative;
    border-radius: 0.5rem;
    overflow: hidden;
}

/* Sitemap Link */
.sitemap-link {
    display: flex;
    align-items: center;
    padding: 1rem;
    color: #374151;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.5;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 0.5rem;
    position: relative;
    background: linear-gradient(90deg, transparent 0%, transparent 100%);
}

.sitemap-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: linear-gradient(180deg, #3B82F6, #6366F1);
    transform: scaleY(0);
    transition: transform 0.3s ease;
    border-radius: 0 2px 2px 0;
}

.sitemap-link:hover {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.05) 0%, transparent 100%);
    color: #1E40AF;
    padding-left: 1.25rem;
}

.sitemap-link:hover::before {
    transform: scaleY(1);
}

/* Link Components */
.link-icon {
    font-size: 1.25rem;
    margin-right: 0.75rem;
    transition: transform 0.3s ease;
    flex-shrink: 0;
}

.link-text {
    flex-grow: 1;
}

.link-arrow {
    opacity: 0;
    transform: translateX(-10px);
    transition: all 0.3s ease;
    color: #3B82F6;
    font-weight: 600;
    margin-left: 0.5rem;
}

.sitemap-link:hover .link-icon {
    transform: scale(1.15);
}

.sitemap-link:hover .link-arrow {
    opacity: 1;
    transform: translateX(0);
}

/* Active State */
.sitemap-link:active {
    transform: scale(0.98);
}

/* Card Hover Effect */
.sitemap-column > div {
    position: relative;
    overflow: hidden;
}

.sitemap-column > div::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #3B82F6, #6366F1, #8B5CF6);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease;
}

.sitemap-column > div:hover::before {
    transform: scaleX(1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .sitemap-sec {
        padding: 3rem 1rem;
    }
    
    .page-header h1 {
        font-size: 2rem;
    }
    
    .page-header p {
        font-size: 1rem;
    }
    
    .sitemap-column > div {
        padding: 1.5rem;
    }
    
    .sitemap-link {
        font-size: 15px;
        padding: 0.875rem;
    }
    
    .link-icon {
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    .page-header h1 {
        font-size: 1.75rem;
    }
    
    .sitemap-column > div h2 {
        font-size: 1.25rem;
    }
}

/* Print Styles */
@media print {
    .sitemap-sec {
        background: white;
    }
    
    .sitemap-column > div {
        box-shadow: none;
        border: 1px solid #ddd;
    }
    
    .sitemap-link:hover {
        background: none;
        color: #374151;
    }
}
</style>

<?php get_footer(); ?>
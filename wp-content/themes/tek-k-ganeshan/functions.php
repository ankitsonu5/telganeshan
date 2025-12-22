<?php
// Function to enqueue scripts and styles
function tek_k_ganeshan_scripts() {
    // Styles
    wp_enqueue_style( 'tek-k-ganeshan-style', get_stylesheet_uri(), array(), '1.57' );
    // Swiper CSS
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );

    // Scripts
    // Swiper JS
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );
    // Lucide Icons
    wp_enqueue_script( 'lucide-js', 'https://unpkg.com/lucide@latest', array(), '1.0', true );
    // Theme JS
    wp_enqueue_script( 'tek-k-ganeshan-script', get_template_directory_uri() . '/script.js', array('swiper-js'), '1.55', true );
}
add_action( 'wp_enqueue_scripts', 'tek_k_ganeshan_scripts' );

// Theme Setup
function tek_setup() {
    // Add basic support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register Menus
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu', 'tek-k-ganeshan' ),
        )
    );
}
add_action( 'after_setup_theme', 'tek_setup' );

// Register Custom Post Type for Hero Slides
function tek_register_hero_slides() {
    $labels = array(
        'name'               => 'Hero Slides',
        'singular_name'      => 'Hero Slide',
        'menu_name'          => 'Hero Slides',
        'add_new'            => 'Add New Slide',
        'add_new_item'       => 'Add New Hero Slide',
        'edit_item'          => 'Edit Hero Slide',
        'new_item'           => 'New Hero Slide',
        'view_item'          => 'View Hero Slide',
        'search_items'       => 'Search Hero Slides',
        'not_found'          => 'No hero slides found',
        'not_found_in_trash' => 'No hero slides found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false, // Not public on frontend as single pages
        'show_ui'             => true,  // Show in admin
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-images-alt2',
        'supports'            => array( 'title', 'thumbnail' ), // Title used for Headline, Thumbnail for BG
        'hierarchical'        => false,
        'show_in_rest'        => true,
    );

    register_post_type( 'hero_slide', $args );
}
add_action( 'init', 'tek_register_hero_slides' );

// Add Meta Boxes for Hero Slide Details
function tek_hero_add_meta_box() {
    add_meta_box(
        'hero_slide_details',
        'Slide Details',
        'tek_hero_meta_box_callback',
        'hero_slide',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tek_hero_add_meta_box' );

function tek_hero_meta_box_callback( $post ) {
    // Add nonce for verification
    wp_nonce_field( 'tek_hero_save_meta_box_data', 'tek_hero_meta_box_nonce' );

    $subtitle = get_post_meta( $post->ID, '_hero_subtitle', true );
    $btn_text = get_post_meta( $post->ID, '_hero_btn_text', true );
    $btn_url  = get_post_meta( $post->ID, '_hero_btn_url', true );
    $btn2_text = get_post_meta( $post->ID, '_hero_btn2_text', true ); // New
    $btn2_url  = get_post_meta( $post->ID, '_hero_btn2_url', true );   // New
    $video_url = get_post_meta( $post->ID, '_hero_video_url', true );
    $kicker   = get_post_meta( $post->ID, '_hero_kicker', true );

    ?>
    <p>
        <label for="hero_kicker"><strong>Kicker Text</strong> (Small text above title, e.g., "Founder • Investor"):</label><br>
        <input type="text" id="hero_kicker" name="hero_kicker" value="<?php echo esc_attr( $kicker ); ?>" class="widefat" />
    </p>
    <p>
        <label for="hero_subtitle"><strong>Subtitle</strong> (Description text):</label><br>
        <textarea id="hero_subtitle" name="hero_subtitle" class="widefat" rows="3"><?php echo esc_textarea( $subtitle ); ?></textarea>
    </p>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1;">
            <p>
                <label for="hero_btn_text"><strong>Button 1 Text</strong> (e.g., "Book Me"):</label><br>
                <input type="text" id="hero_btn_text" name="hero_btn_text" value="<?php echo esc_attr( $btn_text ); ?>" class="widefat" />
            </p>
            <p>
                <label for="hero_btn_url"><strong>Button 1 URL</strong>:</label><br>
                <input type="text" id="hero_btn_url" name="hero_btn_url" value="<?php echo esc_attr( $btn_url ); ?>" class="widefat" />
            </p>
        </div>
        <div style="flex: 1;">
            <p>
                <label for="hero_btn2_text"><strong>Button 2 Text</strong> (Optional):</label><br>
                <input type="text" id="hero_btn2_text" name="hero_btn2_text" value="<?php echo esc_attr( $btn2_text ); ?>" class="widefat" />
            </p>
            <p>
                <label for="hero_btn2_url"><strong>Button 2 URL</strong>:</label><br>
                <input type="text" id="hero_btn2_url" name="hero_btn2_url" value="<?php echo esc_attr( $btn2_url ); ?>" class="widefat" />
            </p>
        </div>
    </div>
    <hr>
    <p>
        <label for="hero_video_url"><strong>Video URL (Optional)</strong> (Use .mp4 link. If set, this slide will be a video slide):</label><br>
        <div style="display: flex; gap: 10px;">
            <input type="text" id="hero_video_url" name="hero_video_url" value="<?php echo esc_attr( $video_url ); ?>" class="widefat" style="flex: 1;" placeholder="https://..." />
            <button type="button" class="button" id="upload_video_btn">Select Video</button>
        </div>
        <small>Upload an MP4 to the media library and select it.</small>
    </p>
    <script>
    jQuery(document).ready(function($){
        $('#upload_video_btn').click(function(e) {
            e.preventDefault();
            var image = wp.media({ 
                title: 'Upload Video',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e){
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                var image_url = uploaded_image.toJSON().url;
                // Let's assign the url value to the input field
                $('#hero_video_url').val(image_url);
            });
        });
    });
    </script>
    <?php
}

// Enqueue Admin Scripts for Media Uploader
function tek_admin_scripts() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'tek_admin_scripts' );

// Save Meta Box Data
function tek_hero_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['tek_hero_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['tek_hero_meta_box_nonce'], 'tek_hero_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Initialize fields
    $fields = array(
        'hero_subtitle' => '_hero_subtitle',
        'hero_btn_text' => '_hero_btn_text',
        'hero_btn_url'  => '_hero_btn_url',
        'hero_btn2_text' => '_hero_btn2_text', // New
        'hero_btn2_url'  => '_hero_btn2_url',  // New
        'hero_video_url' => '_hero_video_url',
        'hero_kicker'   => '_hero_kicker'
    );

    foreach ( $fields as $field => $meta_key ) {
        // If field exists in POST, save it (even if empty string, to clear it)
        if ( isset( $_POST[ $field ] ) ) {
            $value = $_POST[ $field ];
            
            if ($field === 'hero_subtitle') {
                update_post_meta( $post_id, $meta_key, wp_kses_post( $value ) );
            } else {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( $value ) );
            }
        } else {
            // If checking a checkbox or optional field that might not send anything, 
            // strictly we might need this, but for text inputs usually an empty string is sent.
            // Leaving as is but ensuring update_post_meta is triggered.
        }
    }
}
add_action( 'save_post', 'tek_hero_save_meta_box_data' );


// Desktop Walker
class Tek_Desktop_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<div class="dropdown__menu">';
    }
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</div>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = $args->walker->has_children;
        $is_button = in_array('cta-button', $classes);

        if ($depth === 0 && $has_children) {
            $output .= '<div class="nav__item dropdown">';
            $output .= '<a href="' . esc_attr($item->url) . '" class="dropdown__trigger">' . esc_html($item->title) . ' <i data-lucide="chevron-down" class="icon-sm"></i></a>';
        } elseif ($depth === 0 && $is_button) {
            $output .= '<a href="' . esc_attr($item->url) . '" class="button button--sm">' . esc_html($item->title) . ' <i data-lucide="arrow-right"></i></a>';
        } else {
            $attributes = '';
            if ( ! empty( $item->target ) ) {
                $attributes .= ' target="' . esc_attr( $item->target ) . '"';
            }
            if ( ! empty( $item->xfn ) ) {
                $attributes .= ' rel="' . esc_attr( $item->xfn ) . '"';
            }
            $output .= '<a href="' . esc_attr($item->url) . '"' . $attributes . '>' . esc_html($item->title) . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ($depth === 0 && in_array( 'menu-item-has-children', (array) $item->classes )) {
            $output .= '</div>';
        }
    }
}

// Mobile Walker
class Tek_Mobile_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        // No container for levels, just flat structure in dialog
    }
    function end_lvl( &$output, $depth = 0, $args = null ) {
        // No container end
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $style = ($depth > 0) ? 'style="padding-left:1.5rem;font-size:.95rem;opacity:.85"' : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $is_button = in_array('cta-button', $classes);
        
        $class_attr = $is_button ? 'class="button w100" ' : '';
        
        $output .= '<a href="' . esc_attr($item->url) . '" data-close ' . $style . ' ' . $class_attr . '>' . esc_html($item->title);
        
        if ($is_button) {
            $output .= ' <i data-lucide="arrow-right"></i>';
        }
        
        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        // Anchor is self contained
    }
}
// Register Custom Post Types
function tek_register_cpts() {
    register_post_type( 'gallery', array(
        'labels' => array(
            'name' => 'Gallery',
            'singular_name' => 'Photo',
            'add_new_item' => 'Add New Photo',
            'edit_item' => 'Edit Photo',
            'all_items' => 'All Photos',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array( 'title', 'thumbnail' ),
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'photos' ),
    ));

    // Register Album Taxonomy
    register_taxonomy( 'gallery_album', 'gallery', array(
        'labels' => array(
            'name' => 'Albums',
            'singular_name' => 'Album',
            'search_items' => 'Search Albums',
            'all_items' => 'All Albums',
            'edit_item' => 'Edit Album',
            'update_item' => 'Update Album',
            'add_new_item' => 'Add New Album',
            'new_item_name' => 'New Album Name',
            'menu_name' => 'Albums',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'album' ),
        'show_in_rest' => true,
    ));

    // Register Award Categories
    $args = array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => 'Award Categories',
            'singular_name'     => 'Award Category',
            'search_items'      => 'Search Categories',
            'all_items'         => 'All Categories',
            'parent_item'       => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item'         => 'Edit Category',
            'update_item'       => 'Update Category',
            'add_new_item'      => 'Add New Category',
            'new_item_name'     => 'New Category Name',
            'menu_name'         => 'Categories',
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'award-category' ),
        'show_in_rest'      => true, // Added this to match the original functionality
    );
    register_taxonomy( 'award_category', array( 'award' ), $args );

    // Register Venture Custom Post Type
    $venture_labels = array(
        'name'               => 'Ventures',
        'singular_name'      => 'Venture',
        'menu_name'          => 'Ventures',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Venture',
        'edit_item'          => 'Edit Venture',
        'new_item'           => 'New Venture',
        'view_item'          => 'View Venture',
        'all_items'          => 'All Ventures',
        'search_items'       => 'Search Ventures',
        'not_found'          => 'No ventures found',
        'not_found_in_trash' => 'No ventures found in Trash'
    );
    $venture_args = array(
        'labels'              => $venture_labels,
        'public'              => true,
        'has_archive'         => false, // We display them on front-page usually, or a template
        'menu_icon'           => 'dashicons-chart-line',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ), 
        'show_in_rest'        => true, // Added this to match other CPTs
        // We will use 'Thumbnail' for the Logo
    );
    register_post_type( 'venture', $venture_args );

    // Register Awards CPT
    register_post_type( 'award', array(
        'labels' => array(
            'name' => 'Awards',
            'singular_name' => 'Award',
            'add_new_item' => 'Add New Award',
            'edit_item' => 'Edit Award',
            'all_items' => 'All Awards',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-awards',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ));

    // Register Award Categories
    register_taxonomy( 'award_category', 'award', array(
        'labels' => array(
            'name' => 'Award Categories',
            'singular_name' => 'Award Category',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'award-category' ),
        'show_in_rest' => true,
    ));

    // Register Video CPT
    register_post_type( 'video', array(
        'labels' => array(
            'name' => 'Videos',
            'singular_name' => 'Video',
            'add_new_item' => 'Add New Video',
            'edit_item' => 'Edit Video',
            'all_items' => 'All Videos',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array( 'title', 'thumbnail', 'excerpt' ), // Thumbnail used for preview if needed, excerpt for description
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'videos' ),
    ));

    // Register Video Categories
    register_taxonomy( 'video_category', 'video', array(
        'labels' => array(
            'name' => 'Video Categories',
            'singular_name' => 'Video Category',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'video-category' ),
        'show_in_rest' => true,
    ));

    // Register Thoughts CPT
    register_post_type( 'thought', array(
        'labels' => array(
            'name' => 'Thoughts',
            'singular_name' => 'Thought',
            'add_new_item' => 'Add New Thought',
            'edit_item' => 'Edit Thought',
            'all_items' => 'All Thoughts',
            'menu_name' => 'Thoughts',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'thoughts' ),
    ));

    // Register Thoughts Categories
    register_taxonomy( 'thought_category', 'thought', array(
        'labels' => array(
            'name' => 'Thought Categories',
            'singular_name' => 'Thought Category',
            'menu_name' => 'Categories',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'thought-category' ),
        'show_in_rest' => true,
    ));

    // Force flush rules
    flush_rewrite_rules();
}
add_action( 'init', 'tek_register_cpts' );


// Add Meta Box for Video URL
function tek_video_add_meta_box() {
    add_meta_box(
        'video_details',
        'Video Details',
        'tek_video_meta_box_callback',
        'video',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tek_video_add_meta_box' );

function tek_video_meta_box_callback( $post ) {
    wp_nonce_field( 'tek_video_save_meta_box_data', 'tek_video_meta_box_nonce' );
    $video_url = get_post_meta( $post->ID, '_video_url', true );
    ?>
    <p>
        <label for="video_url"><strong>Video ID or URL</strong> (YouTube or Vimeo link):</label><br>
        <input type="text" id="video_url" name="video_url" value="<?php echo esc_attr( $video_url ); ?>" class="widefat" placeholder="e.g. https://www.youtube.com/watch?v=dQw4w9WgXcQ" />
        <small>Enter the full URL or just the ID.</small>
    </p>
    <?php
}

function tek_video_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['tek_video_meta_box_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['tek_video_meta_box_nonce'], 'tek_video_save_meta_box_data' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['video_url'] ) ) {
        $clean_url = esc_url_raw( trim( $_POST['video_url'] ) );
        update_post_meta( $post_id, '_video_url', $clean_url );
    }
}
add_action( 'save_post', 'tek_video_save_meta_box_data' );
// Helper function to extract Video URL/ID (Moved from template-videos.php)
if (!function_exists('tek_get_video_embed_url')) {
    function tek_get_video_embed_url($url) {
        $url = trim($url);
        if (empty($url)) return '';

        // 1. Check for local video files (MP4, WebM)
        if (preg_match('/\.(mp4|webm|ogg)$/i', $url)) {
            return $url; // Return raw URL for <video> tag
        }

        // 2. If user pasted provided iframe code, extract src
        if (preg_match('/src=["\']([^"\']+)["\']/', $url, $match)) {
            return $match[1];
        }
        
        // 3. YouTube/Vimeo/Embed Checks
        if (strpos($url, 'youtube.com/embed') !== false || strpos($url, 'player.vimeo.com') !== false) return $url;
        if (preg_match('/[?&]list=([^#\&\?]+)/', $url, $match)) return 'https://www.youtube.com/embed/videoseries?list=' . $match[1];
        if (preg_match('/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/', $url, $match)) return 'https://www.youtube.com/embed/' . $match[1];

        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if (preg_match($pattern, $url, $match)) return 'https://www.youtube.com/embed/' . $match[1];
        
        if (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/', $url, $match)) return 'https://player.vimeo.com/video/' . $match[1];

        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) return 'https://www.youtube.com/embed/' . $url;

        return '';
    }
}

// Seed Default Ventures
function tek_seed_ventures() {
    if ( get_option( 'tek_ventures_seeded' ) ) return;

    $ventures = array(
        array(
            'title'   => 'Kyyba, Inc.',
            'content' => 'Global technology services & staffing delivering at scale.',
            'url'     => '#',
            'image'   => 'https://placehold.co/100x100?text=Kyyba',
        ),
        array(
            'title'   => 'Kyyba Films',
            'content' => 'Independent films that champion underrepresented voices.',
            'url'     => '#',
            'image'   => 'https://placehold.co/100x100?text=Films',
        ),
        array(
            'title'   => 'Kyyba Wellness',
            'content' => 'Programs for leaders and teams to perform sustainably.',
            'url'     => '#',
            'image'   => 'https://placehold.co/100x100?text=Wellness',
        ),
    );

    foreach ( $ventures as $v ) {
        // Check if exists
        $existing = get_page_by_title( $v['title'], OBJECT, 'venture' );
        if ( ! $existing ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $v['title'],
                'post_excerpt' => $v['content'], // Using excerpt for value prop
                'post_status'  => 'publish',
                'post_type'    => 'venture',
            ) );
            
            if ( $post_id ) {
                update_post_meta( $post_id, '_venture_url', $v['url'] );
                // Note: Sideloading images is complex in one-shot, so we just set the meta for now or skipped.
                // For this demo, we can't easily upload the external image to media library without more logic.
                // We will rely on user adding logos or use the placeholder if no featured image.
            }
        }
    }

    update_option( 'tek_ventures_seeded', true );
}
add_action( 'init', 'tek_seed_ventures' );

// Helper function to get video thumbnail
if (!function_exists('tek_get_video_thumbnail')) {
    function tek_get_video_thumbnail($url) {
        $url = trim($url);
        if (empty($url)) return '';

        // YouTube
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if (preg_match($pattern, $url, $match)) {
            return 'https://img.youtube.com/vi/' . $match[1] . '/maxresdefault.jpg';
        }
        
        // YouTube Shorts
        if (preg_match('/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/', $url, $match)) {
             return 'https://img.youtube.com/vi/' . $match[1] . '/maxresdefault.jpg';
        }

        return '';
    }
}
?>

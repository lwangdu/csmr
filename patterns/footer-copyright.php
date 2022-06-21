<?php

/**
 * Title: Footer with copyright text and, links.
 * Slug: ucnrs/footer-copyright 
 * Categories: ucnrs-footer
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"},"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"main","textColor":"base","layout":{"inherit":true},"fontSize":"small"} -->
<div class="wp-block-group alignfull has-base-color has-main-background-color has-text-color has-background has-link-color has-small-font-size" style="margin-top:0px;padding-top:40px;padding-bottom:40px">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:paragraph -->
        <p>© <?php echo gmdate('Y'); ?> The Regents of the University of California, All Rights Reserved · <a href="https://www.policy.ucsb.edu/terms-of-use"><?php echo esc_html__('Terms of use', 'ucnrs'); ?></a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <!-- wp:social-links -->
        <ul class="wp-block-social-links">
            <!-- wp:social-link {"url":"#","service":"facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"instagram"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
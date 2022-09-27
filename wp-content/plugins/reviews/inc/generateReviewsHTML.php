<?php


function generateReviewsHTML()
{
    $response = wp_remote_get('https://demo0167766.mockable.io/reviews');

    if ((!is_wp_error($response)) && (200 === wp_remote_retrieve_response_code($response))) {
        $responseBody = json_decode($response['body']);
        if (json_last_error() === JSON_ERROR_NONE) {
//            echo "<pre>";
//           print_r($responseBody);
//            echo "</pre>";
            $toplists = $responseBody->toplists;
            $our_toplists = array();
            foreach ($toplists as $key => $toplist) {
                if ($key == '575') {
                    $our_toplists = $toplist;
                }
            }

            if (!empty($our_toplists)) {
                //Sorting the array by position key
                usort($our_toplists, function ($toplist1, $toplist2) {
                    return $toplist1->position <=> $toplist2->position;
                });
                echo "<pre>";
                print_r($our_toplists);
                echo "</pre>";

            }


        }
    }


    if (!empty($our_toplists)):
        ob_start(); ?>
        <section class="section-content-wrapper">
            <div class="container table-container">
                <div class="table-responsive" id="no-more-tables">
                    <table class="table table-borderless align-middle">
                        <thead>
                        <tr>
                            <th scope="col" class="table-cell cell-header">Casino</th>
                            <th scope="col" class="table-cell cell-header">Bonus</th>
                            <th scope="col" class="table-cell cell-header">Features</th>
                            <th scope="col" class="table-cell cell-header">Play</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php foreach ($our_toplists as $toplist):

                            $logo_url = $toplist->logo;
                            $review_url = get_site_url() . '/' . $toplist->brand_id;
                            $rating = $toplist->info->rating;
                            $bonus = $toplist->info->bonus;
                            $features_array = $toplist->info->features;
                            $terms_and_conditions = $toplist->terms_and_conditions;
                            $play_url = $toplist->play_url;

                            ?>
                            <tr class="table-row">
                                <td data-title="Casino">
                                    <div class="cell-row-content casino-row">
                                        <img src="<?php echo esc_url($logo_url) ?>" alt="">
                                        <a href="<?php echo esc_url($review_url) ?>"><?php _e('Review', 'reviews-app') ?></a>
                                    </div>
                                </td>
                                <td data-title="Bonus">

                                    <div class=" cell-row-content star-rating">
                                        <svg style="width: 0; height: 0;display: none" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 32 32">
                                            <defs>
                                                <mask id="half">
                                                    <rect x="0" y="0" width="32" height="32" fill="white"/>
                                                    <rect x="50%" y="0" width="32" height="32" fill="grey"/>
                                                </mask>

                                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                        id="star">
                                                    <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>
                                                </symbol>
                                            </defs>
                                        </svg>
                                        <p class="c-rate">
                                            <?php for ($i = 0; $i <= 5; $i++): ?>
                                                <svg class="c-icon <?php echo $i <= $rating ? 'active' : '' ?>"
                                                     width="32" height="32">
                                                    <use href="#star"></use>
                                                </svg>
                                            <?php endfor; ?>
                                        </p>

                                        <p class="bonus-text"><?php echo $bonus ?></p>
                                    </div>
                                </td>
                                <td data-title="Features">
                                    <div class="cell-row-content features-row">
                                        <ul>
                                            <?php foreach ($features_array as $feature): ?>
                                                <li><?php echo $feature ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </td>
                                <td data-title="Play">
                                    <div class="cell-row-content play-row">
                                        <a href="<?php echo esc_url($play_url) ?>"><span
                                                    class="play-btn">  Play Now</span></a>
                                        <p class="terms-conditions"><?php echo $terms_and_conditions ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    endif;
}
<?php
function comparator($object1, $object2)
{
    return $object1->score > $object2->score;
}

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
//                echo "<pre>";
//                print_r($our_toplists);
//                echo "</pre>";

            }


        }
    }


    ob_start(); ?>
    <section class="section-content-wrapper">
        <div class="container table-container">
            <div class="table-header">
                <div class="table-cell cell-header  col-lg-3 col-sm-6">Casino</div>
                <div class="table-cell cell-header  col-lg-3 col-sm-6">Bonus</div>
                <div class="table-cell cell-header  col-lg-3 col-sm-6">Features</div>
                <div class="table-cell cell-header  col-lg-3 col-sm-6">Play</div>
            </div>
            <div class="table-row ">
                <div class="cell-row-content col-md-3 casino-row">
                    <img src="https://picsum.photos/195/75" alt="">
                    <a href="#">Review</a>
                </div>
                <div class="cell-row-content col-md-3">
                    <div class="star-rating">

                        <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <defs>
                                <mask id="half">
                                    <rect x="0" y="0" width="32" height="32" fill="white"/>
                                    <rect x="50%" y="0" width="32" height="32" fill="grey"/>
                                </mask>

                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">
                                    <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>
                                </symbol>
                            </defs>
                        </svg>
                        <p class="c-rate">
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                        </p>
                    </div>
                    <p class="bonus-text">Lorem Ipsum</p>
                </div>
                <div class="cell-row-content col-md-3 features-row">
                    <ul>
                        <li>Lorem Ipsum</li>
                        <li>Dolor</li>
                        <li>Sit</li>
                    </ul>
                </div>
                <div class="cell-row-content col-md-3 play-row">
                    <a href="#"><span class="play-btn">  Play Now</span></a>
                    <p class="terms-conditions">21+ | <a href=\"https://generator.lorem-ipsum.info/terms-and-conditions\">T&CS Apply</a> | Gamble Responsibly</p>
                </div>
            </div>
            <div class="table-row ">
                <div class="cell-row-content col-md-3 casino-row">
                    <img src="https://picsum.photos/195/75" alt="">
                    <a href="#">Review</a>
                </div>
                <div class="cell-row-content col-md-3">
                    <div class="star-rating">

                        <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <defs>
                                <mask id="half">
                                    <rect x="0" y="0" width="32" height="32" fill="white"/>
                                    <rect x="50%" y="0" width="32" height="32" fill="grey"/>
                                </mask>

                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">
                                    <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>
                                </symbol>
                            </defs>
                        </svg>
                        <p class="c-rate">
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                        </p>
                    </div>
                    <p class="bonus-text">Lorem Ipsum</p>
                </div>
                <div class="cell-row-content col-md-3 features-row">
                    <ul>
                        <li>Lorem Ipsum</li>
                        <li>Dolor</li>
                        <li>Sit</li>
                    </ul>
                </div>
                <div class="cell-row-content col-md-3 play-row">
                    <a href="#"><span class="play-btn">  Play Now</span></a>
                    <p class="terms-conditions">21+ | <a href=\"https://generator.lorem-ipsum.info/terms-and-conditions\">T&CS Apply</a> | Gamble Responsibly</p>
                </div>
            </div>
            <div class="table-row ">
                <div class="cell-row-content col-md-3 casino-row">
                    <img src="https://picsum.photos/195/75" alt="">
                    <a href="#">Review</a>
                </div>
                <div class="cell-row-content col-md-3">
                    <div class="star-rating">

                        <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <defs>
                                <mask id="half">
                                    <rect x="0" y="0" width="32" height="32" fill="white"/>
                                    <rect x="50%" y="0" width="32" height="32" fill="grey"/>
                                </mask>

                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">
                                    <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>
                                </symbol>
                            </defs>
                        </svg>
                        <p class="c-rate">
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                        </p>
                    </div>
                    <p class="bonus-text">Lorem Ipsum</p>
                </div>
                <div class="cell-row-content col-md-3 features-row">
                    <ul>
                        <li>Lorem Ipsum</li>
                        <li>Dolor</li>
                        <li>Sit</li>
                    </ul>
                </div>
                <div class="cell-row-content col-md-3 play-row">
                    <a href="#"><span class="play-btn">  Play Now</span></a>
                    <p class="terms-conditions">21+ | <a href=\"https://generator.lorem-ipsum.info/terms-and-conditions\">T&CS Apply</a> | Gamble Responsibly</p>
                </div>
            </div>
            <div class="table-row ">
                <div class="cell-row-content col-md-3 casino-row">
                    <img src="https://picsum.photos/195/75" alt="">
                    <a href="#">Review</a>
                </div>
                <div class="cell-row-content col-md-3">
                    <div class="star-rating">

                        <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <defs>
                                <mask id="half">
                                    <rect x="0" y="0" width="32" height="32" fill="white"/>
                                    <rect x="50%" y="0" width="32" height="32" fill="grey"/>
                                </mask>

                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">
                                    <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>
                                </symbol>
                            </defs>
                        </svg>
                        <p class="c-rate">
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon active" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                            <svg class="c-icon" width="32" height="32">
                                <use href="#star"></use>
                            </svg>
                        </p>
                    </div>
                    <p class="bonus-text">Lorem Ipsum</p>
                </div>
                <div class="cell-row-content col-md-3 features-row">
                    <ul>
                        <li>Lorem Ipsum</li>
                        <li>Dolor</li>
                        <li>Sit</li>
                    </ul>
                </div>
                <div class="cell-row-content col-md-3 play-row">
                    <a href="#"><span class="play-btn">  Play Now</span></a>
                    <p class="terms-conditions">21+ | <a href=\"https://generator.lorem-ipsum.info/terms-and-conditions\">T&CS Apply</a> | Gamble Responsibly</p>
                </div>
            </div>
        </div>
    </section>
    <?php return ob_get_clean();
}
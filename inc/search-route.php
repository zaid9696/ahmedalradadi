<?php 


add_action('rest_api_init', 'alradadiRegisterSearch');


function alradadiRegisterSearch(){

    register_rest_route('alradadi/v1', 'search', array(

        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'alradadiSearchResult'

    ));


}


function alradadiSearchResult($data){


    $mainquery = new WP_Query(array(

        'post_type' => 'post',
        's' => sanitize_text_field($data['term'])
    ));

    $mainResults = array();


    while($mainquery->have_posts()){

        $mainquery->the_post();

        if(get_post_type() == 'post'){

            $description = NULL;

            if(has_excerpt()){

                $description = get_the_excerpt();
            }else {

                $description = wp_trim_words(get_the_content(), 30);
            }

            $title = get_the_title(  );

            array_push($mainResults, array(

                'title' => get_the_title(),
                'image' => get_the_post_thumbnail_url(0,'search-img'),
                'link' => get_the_permalink(),
                'description' => $description

            ));


        };

    }



    return $mainResults;


}
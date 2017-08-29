<div class="button-list"><?php

    $links = $cVal('links');
    $count = 0;

    // loop through the elements of the 'links' array found in the content
    foreach ($links as $key => $value) {

        if (!string_starts_with('jcr:', $key)) {

            // and cast any element with a key not starting with 'jcr:' 
            // to an linkbutton component
            tpl_include('partials/components/_link-button',
                $value, array('key'=> "links/$key"));

            ++$count;

        }

    }

    // optional: allows to add more items of the same type on the page
    // to allow arbitrary items, use a container component (e.g. parsys)
    if (AUTHORING && ALLOW_COMPONENTS_INSERTION) {

        tpl_include('partials/components/_link-button', array(), 
            array('key'=> "links/link$count"));

    }
    
?></div>
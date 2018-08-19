<ul class="animal-list"><?php

    $cards = $cVal('cards');
    $count = 0;

    // loop through the elements of the 'cards' array found in the content
    foreach ($cards as $key => $value) {

        if (!string_starts_with('jcr:', $key)) {

            ?><li><?php

                // and cast any element with a key not starting with 'jcr:' 
                // to an animalcard component
                tpl_include('partials/components/_animal-card',
                    $value, array('key'=> "cards/$key"));

                ++$count;

            ?></li><?php

        }

    }
    
    // optional: allows to add more items of the same type on the page
    // to allow arbitrary items, use a container component (e.g. parsys)
    if (AUTHORING && ALLOW_COMPONENTS_INSERTION) {

        ?><li><?php

            tpl_include('partials/components/_animal-card', array(), 
                array('key'=> "cards/card$count"));

        ?></li><?php
    }
    
?></ul>
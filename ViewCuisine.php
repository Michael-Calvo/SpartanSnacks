<?php

/**
 * This function echo's an array of items as checkbox items
 * @param type $_cuisineArray
 */
function listCuisines($_cuisineArray) {
    foreach ($_cuisineArray as $item) {
        $count = 1;
        echo "
        <div class='form-check form-check-inline'>
            <input class='form-check-input' type='checkbox' id='inlineCheckbox$count' value='option$count'>
            <label class='form-check-label' for='inlineCheckbox$count'>$item</label>
        </div>";
    }
}

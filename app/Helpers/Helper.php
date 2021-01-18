<?php
function set_active($uri, $output ='active')
{
    if (is_array($uri)) {
        foreach ($$uri as $key => $value) {
            if (Route::is($value)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
    
}
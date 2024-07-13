<?php

/**
 * Accepts an integer and output HTML option tags for drop-down list.
 * One of the option will be selected by default based on the integer provided.
 *
 * @param type $choice : Integer.
 */
function preSelect($choice) {
    $output = "";

    for ($i = 1; $i <= 6; $i++) {
        if ($choice == $i) {
            $output .= '<option value="' . $i . '" selected>' . $i . '</option>\n';
        } else {
            $output .= '<option value="' . $i . '">' . $i . '</option>\n';
        }
    }

    echo $output;
}

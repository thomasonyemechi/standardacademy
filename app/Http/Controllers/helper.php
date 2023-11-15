<?php


function term_text($term)
{
    $val = '';
    if ($term == 1) {
        $val = 'First Term';
    } else if ($term == 2) {
        $val = 'Second Term';
    } else if ($term == 3) {
        $val = 'Third Term';
    }
    return $val;
}

function money_format($num)
{
    return '₦ '.number_format($num);
}


function check_ans($myans, $opt)
{
    $val = '';
    if ($myans == $opt) {
        $val = 'checked';
    }
    return $val;
}
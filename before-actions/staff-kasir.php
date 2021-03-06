<?php

$restricted_route = 'staff-kasir/*';

$redirect_to = 'auth/login';
$rule        = !session()->get('user') || in_array(session()->get('user')->role,['staff-kandang','staff-gudang']);


if(endsWith($restricted_route,'*'))
{
    // remove asterisk
    $r = str_replace('*','',$restricted_route);
    if(startsWith($route,$r) && $rule)
    {
        return redirect()->route($redirect_to);
    }
}
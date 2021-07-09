<?php
if(startsWith($route,'admin/kandang') && in_array(session()->get('user')->role,['admin','staff-kandang']))
{

}
else
{
$restricted_route = 'admin/*';

$redirect_to = 'auth/login';
$rule        = !session()->get('user') || in_array(session()->get('user')->role,['staff-kandang','staff-gudang','staff-kasir']);


if(endsWith($restricted_route,'*'))
{
    // remove asterisk
    $r = str_replace('*','',$restricted_route);
    if(startsWith($route,$r) && $rule)
    {
        return redirect()->route($redirect_to);
    }
}
}
<?php


if (!function_exists('check_user_role')) {
    function check_admin_login()
    {
        $ci = get_instance();
        $role = $ci->session->userdata('role');

        if ($role != 'admin') {
            redirect('landing');
        }
    }
}

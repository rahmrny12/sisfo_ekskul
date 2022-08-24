<?php


if (!function_exists('check_login')) {
    function check_already_login()
    {
        $ci = get_instance();
        $role = $ci->session->userdata('role');

        if ($ci->uri->segment(2) != 'logout') {
            if ($role == 'siswa') {
                redirect('landing');
            }
        }
    }
}

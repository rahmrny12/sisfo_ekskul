<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle mb-3">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <?= $this->session->userdata('nama') ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <button type="button" class="dropdown-item" onclick="adminLogoutConfirm('<?= base_url('auth/logout') ?>')"><i class="fa fa-sign-out pull-right"></i> Log Out</button>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
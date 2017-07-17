<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="/views/admin/favicon.ico" type="image/x-icon" />
        <title>Rasti.by</title>
        <link rel="stylesheet" href="<?= $this->config->item('admin_css_path') ?>bootstrap.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?= $this->config->item('admin_css_path') ?>bootstrap-responsive.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?= $this->config->item('plugins') ?>fancybox/jquery.fancybox.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" type="text/css" media="screen" charset="utf-8" />
        <script type="text/javascript" src="<?= $this->config->item('admin_script_path') ?>jquery-1.8.1.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('admin_script_path') ?>jquery.placeholder.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('admin_script_path') ?>script.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('admin_script_path') ?>bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('admin_script_path') ?>ajaxupload.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('plugins') ?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('plugins') ?>tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('plugins') ?>fancybox/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <? if ($this->session->userdata('logged_in')): ?>
                        <p class="navbar-text pull-right">
                            <a href="/admin/auth/deauth" class="navbar-link">Выйти</a>
                        </p>
                    <? endif; ?>
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">RASTI.BY</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <? if ($this->session->userdata('logged_in')): ?>
                                <? foreach ($lists['sections'] as $k => $v): ?>
                                    <? if ($this->database->show_section($k)): ?>
                                        <li <?= ($this->uri->segment(2) == $k ? 'class="active"' : '') ?>><a href="/admin/<?= $k ?>"><?= $v ?></a></li>
                                    <? endif; ?>
                                <? endforeach; ?>
                            <? else: ?>
                                <li class="active"><a href="/admin/auth">Авторизация</a></li>
                            <? endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container main">
            <img src="/views/main/i/logo.png"/><div style="float:right;font-size: 24px;">Добро пожаловать в панель администратора ресурса RASTI.BY</div>
            <?= $template ?>
            <hr />
            <footer>
                <p>Панель администратора работает на <a href="http://zmitroc.by">ZmitroC CMS</a> © 2010-<?= date("Y") ?></p>
            </footer>
        </div>
    </body>
</html>
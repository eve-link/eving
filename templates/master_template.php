<!DOCTYPE html>
<html class="public" lang="et">
<head>
    <base href="<?= BASE_URL ?>">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
    <link href="assets/components/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <title>Eving</title>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/components/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>

<body class="home-page">
<div class="home-container">

    <aside class="sidebar">
        <div class="sidebar-title">
            <a href="welcome"><h1>Eving</h1></a>
        </div>
        <nav class="menu-nav">
            <ul class="menu">
                <li><a  href="welcome">Avaleht</a></li>
                <li <?=$controller=='products' ? 'class="active"': ''?>><a href="<?=BASE_URL?>">Posts</a></li>
                <li><a href="contact">Kontakt</a></li>
            </ul>
        </nav>
        <nav class="menu-lang-nav">
            <ul class="menu">
                <li><a class="active">in English</a></li>
                <li><a href="#">Eesti keeles</a></li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <div class="name">Eving</div>
            <p>Aadress</p>
            <p>Tel nr</p>
            <div class="mail">e-mail</div>
        </div>
    </aside>

    <section class="home-content">
        <? if( !file_exists("views/$controller/{$controller}_$action.php")) error_out('The view <i>views/'. $controller . '/' .  $controller . '_' . $action . '.php</i> does not exist. Create that file.');?>
        <?  @require "views/$controller/{$controller}_$action.php"; ?>

    </section>
</div>
</body>
</html>
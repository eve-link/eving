<!DOCTYPE html>
<html class="public" lang="et">
<head>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
    <title>Eving</title>
</head>

<body class="home-page">
<div class="home-container">

    <aside class="sidebar">
        <div class="sidebar-title">
            <h1>Eving</h1>
        </div>
        <nav class="menu-nav">
            <ul class="menu">
                <li><a class="active" href="welcome">Avaleht</a></li>
                <li><a href="products">Pood</a></li>
                <li><a href="content.html">Kontakt</a></li>
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
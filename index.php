<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opus Ensemble Vocal Féminin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylehome.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <?php
    /*
        $langueNavigateur = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['lang'])) {
            header('Location: ' . $_SERVER['QUERY_STRING'] . '?lang=' . $langueNavigateur);
            exit();
        }
    */
    ?>
</script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
        <section>
            <img src="assets/img/head_img2.png" alt="">
        </section>
    </header>
    <main>
        <h2><?= $translations['namegroup'] ?></h2>
        <p>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."    
        </p> 
        <nav>
            <h2><?= $t[$_GET['lang']]['nextevent'] ?></h2>
            <article>
                <section>
                    <img src="assets/img/test.jpg" alt="">
                    <h3>Evenement 1</h3>
                    <h4>14 février</h4>
                </section>
            </article>
            <footer>
                <button>
                    <span>Voir plus</span>
                </button>
            </footer>
        </nav>
        <nav>
            <h2><?= $t[$_GET['lang']]['article'] ?></h2>
            <article>
                <header>
                    <img src="" alt="">
                </header>
                <section>
                    <h3></h3>
                    <p></p>
                </section>
                <footer>
                    <button>
                        <span>Voir plus</span>
                    </button>
                </footer>
            </article>
        </nav>
        <button>
            <span>Voir plus</span>
        </button>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>
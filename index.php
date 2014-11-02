<?php

    function getPage() {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == "home" || $page == "projects" || $page == "contact") {
                return $page;
            } else {
                return "404";
            }
        } else {
            return "home";
        }
    }

    function getSelected($string) {
        if (getPage() == $string) {
            return " class=\"pure-menu-selected\"";
        } else {
            return "";
        }
    }

    function getSlogan() {
        $slogan_file = file("byte.me");
        return $slogan_file[array_rand($slogan_file)];
    }
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ByteLab | <?php echo ucfirst(getPage()); ?></title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" type="text/css" href="/css.css">
    </head>

    <body>
        <div class="header">
            <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
                <a class="pure-menu-heading" href="/">ByteLab</a>
                <ul>
                    <li<?php echo getSelected("home"); ?>>
                        <a href="/">Home</a>
                    </li>
                    <li<?php echo getSelected("projects"); ?>>
                        <a href="/projects/">Projects</a>
                    </li>
                    <li<?php echo getSelected("contact"); ?>>
                        <a href="/contact/">Contact</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="splash-container">
            <div class="splash">
                <h1 class="splash-head">ByteLab</h1>
                <p class="splash-subhead"><?php echo getSlogan() ?></p>
            </div>
        </div>


        <div class="content-wrapper">
            <div class="content">
                <?php include("$_SERVER[DOCUMENT_ROOT]/views/" . getPage() . ".php") ?>
            </div>
        </div>
    </body>
</html>
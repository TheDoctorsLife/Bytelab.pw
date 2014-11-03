<?php

    function getSlogan() {
        $slogans = file("byte.me");
        return $slogans[array_rand($slogans)];
    }

?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Medula+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/css.css">
        <title>ByteLab | Welcome Home</title>
    </head>

    <body>
        <div class="header">
            <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
                <a class="pure-menu-heading" href>ByteLab</a>
                <ul>
                    <li><a href="https://github.com/Byte-Lab">
                            <i class="fa fa-fw fa-github"></i>
                            Source</a></li>
                    <li><a href="http://ci.bytelab.pw">
                            <i class="fa fa-fw fa-tasks"></i>
                            CI</a></li>
                    <li><a href="http://jd.bytelab.pw">
                            <i class="fa fa-fw fa-folder-open"></i>
                            Javadocs</a></li>
                </ul>
            </div>
        </div>

        <div class="splash-container">
            <div class="splash">
                <div class="splash-head-bg">
                    <h1 class="splash-head">ByteLab</h1>
                    <p class="splash-subhead"><?php echo getSlogan() ?></p>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <h2 class="content-head is-center">What are we up to?</h2>
                <p class="is-center"><i>We like to keep ourselves busy, baby! Why don't you take a look at the projects
                        we're working on to get a better idea of what we're all about?</i></p>
                <div class="pure-g">
                    <div class="pure-u-1-3">
                        <div class="l-box">
                            <h3 class="content-subhead">
                                <i class="fa fa-fw fa-asterisk"></i>
                                Warbands</h3>
                            <p>Warbands is an alternative to the popular plugin Factions, designed to be more modular
                                and less bloated! The plugin has all of the features that made Factions unique and
                                amazing, but none of the ones that made it difficult to setup and configure!
                        </div>
                    </div>
                    <div class="pure-u-1-3">
                        <div class="l-box">
                            <h3 class="content-subhead">
                                <i class="fa fa-fw fa-asterisk"></i>
                                Coming Soon!</h3>
                            <p><?php include("views/lorem.php"); ?></p>
                        </div>
                    </div>
                    <div class="pure-u-1-3">
                        <div class="l-box">
                            <h3 class="content-subhead">
                                <i class="fa fa-fw fa-asterisk"></i>
                                Coming Soon!</h3>
                            <p><?php include("views/lorem.php"); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ribbon l-box-lrg">
                <h2 class="content-head content-head-ribbon is-center">Need to get ahold of us?</h2>
                <p class="is-center"><i>That's alright, because we like hearing from you! Go ahead and fill out the form
                        below, or <a href="mailto:contact@bytelab.pw">email us</a>!</i></p>

                <form class="pure-form pure-form-stacked is-center" id="contact" action="mailto:support@bytelab.pw" method="post" enctype="text/plain">
                    <fieldset>
                        <label for="name">Your Name</label>
                        <input id="name" type="text" placeholder="Your Name">

                        <label for="email">Your Email</label>
                        <input id="email" type="email" placeholder="Your Email">

                        <label for="content">Your Message</label>
                        <textarea id="content" form="contact" placeholder="Your Message"></textarea>

                        <button type="submit" class="pure-button">Contact Us!</button>
                    </fieldset>
                </form>
            </div>

            <div class="footer l-box">Site and Content &copy; 2014 ByteLab and Contributors.</div>
        </div>
    </body>
</html>
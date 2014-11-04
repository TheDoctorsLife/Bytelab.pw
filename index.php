<?php

    function getSlogan() {
        $slogans = file("byte.me");
        return $slogans[array_rand($slogans)];
    }

    function mail_sent_correctly() {

        if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["content"])) {
            return false;
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["content"];

        if ($name == "") {
            return false;
        }

        if ($email == "") {
            return false;
        }

        if (strlen($message) < 32) {
            return false;
        }


        $to = "contact@bytelab.pw";
        $subject = substr($message, 0, 32) . "...";
        $body = "From: $name<br/>Reply: $email<br/><br/>$message";
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        return @mail($to, $subject, $body, $headers) ? true : false;
    }

?>
<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Just the website to display the work of a few ragtag developers,
            and provide links to their work.">
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
                    <li><a href="https://github.com/Byte-Lab" target="_blank">
                            <i class="fa fa-fw fa-github" target="_blank"></i>
                            Source</a></li>
                    <li><a href="http://ci.bytelab.pw" target="_blank">
                            <i class="fa fa-fw fa-tasks"></i>
                            CI</a></li>
                    <li><a href="http://jd.bytelab.pw" target="_blank">
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
                                <a href="https://github.com/Byte-Lab/Warbands" target="_blank">
                                <i class="fa fa-fw fa-asterisk"></i>
                                Warbands</h3></a>
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
                        below, or <a href="mailto:contact@bytelab.pw" target="_blank">email us</a>!</i></p>

                <form class="pure-form pure-form-stacked is-center"
                      action="index.php" method="post">
                    <fieldset>
                        <label for="name">Your Name</label>
                        <input name="name" type="text" placeholder="Your Name">

                        <label for="email">Your Email</label>
                        <input name="email" type="email" placeholder="Your Email">

                        <label for="content">Your Message</label>
                        <textarea name="content" placeholder="Your Message"></textarea>
                    </fieldset>
                    <button name="submit" type="submit" class="pure-button">Contact Us!</button>
                    <?php
                        if (isset($_POST['submit'])) {
                            echo "<p class=\"email-notice\">";
                            if (mail_sent_correctly()) {
                                echo "Your message was sent!";
                            } else {
                                echo "Whoops! Try again!";
                            }
                            echo "</p>";
                        }
                    ?>
                </form>
            </div>

            <div class="footer l-box">Site and Content &copy; 2014 ByteLab and Contributors.</div>
        </div>
    </body>
</html>
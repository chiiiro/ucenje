<?php

namespace templates;

use Views\AbstractView;

class Main extends AbstractView {

    private $pageTitle;
    private $body;

    public function outputHTML()
    {

        ?>

        <!DOCTYPE HTML>
        <html>

        <head>
            <title><?php echo $this->pageTitle ?></title>
            <meta charset="utf-8">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
                  crossorigin="anonymous">

            <style>
                body {
                    background-color: aliceblue;
                    /*background-image: url("includes/pictures/clouds.jpg");*/
                    /*background-size: cover;*/
                    /*background-repeat: no-repeat;*/
                }
            </style>

            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
            <script>
                function startTime() {
                    var today = new Date();
                    var h = today.getHours();
                    var m = today.getMinutes();
                    var s = today.getSeconds();
                    m = checkTime(m);
                    s = checkTime(s);
                    document.getElementById('txt').innerHTML =
                        h + ":" + m + ":" + s;
                    var t = setTimeout(startTime, 500);
                }
                function checkTime(i) {
                    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                    return i;
                }
            </script>

        <head/>

        <body onload="startTime()">

        <div>

            <div class="container">

                <?php
                    if(isLoggedIn()) {
                        ?>
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">

                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?php echo \route\Route::get("userIndex")->generate();?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                                </div>

                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo \route\Route::get("addPost")->generate();?>">Add post</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo \route\Route::get("logout")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo \route\Route::get("changePwd")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change password</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo \route\Route::get("changeUser")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change username</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a type="button" id="txt" role="button" class="btn btn-link""></a></li>
                                    </ul>


                                </div>

                            </div>
                        </nav>
                        <?php
                    } else {
                        ?>
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">

                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?php echo \route\Route::get("index")->generate();?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                                </div>


                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo \route\Route::get("register")->generate(); ?>" role="button" class="btn btn-link"">Register</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo \route\Route::get("login")->generate(); ?>" role="button" class="btn btn-link"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a type="button" id="txt" role="button" class="btn btn-link""></a></li>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                        <?php
                    }
                ?>

                </div>

            <?php echo $this->body; ?>

        </div>

        </body>

        </html>

        <?php

    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

}

?>

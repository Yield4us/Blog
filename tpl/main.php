<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="/Blog">My Blog</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="/Blog">Home</a></li>
                            <?php if (!$this->user) {?>
                            <li><a href="/Blog/?login">Log in</a></li>
                            <li><a href="/Blog/?signup">Sign up</a></li>
                            <?php }?>
                            <?php if ($this->user) {?>
                            <li><a href="/Blog/?add">Add new post</a></li>
                            <li><a href="/Blog/?logout">Log out</a></li>
                            <?php } ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">

            <?php $this->out($this->tpl, TRUE); ?>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>

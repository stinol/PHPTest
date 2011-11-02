<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body >
    <header>
        <h1>PHP Test</h1>
    </header>

    <div id="link" style="float:right; margin-right: 2em;" ><a href='/backend.php'>View All Results</a></div>


    <div class="container">
        <?php echo $sf_content ?>
    </div>

  </body>
</html>

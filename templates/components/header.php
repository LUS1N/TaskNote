<!DOCTYPE html>
<html lang="en">

<head>


  <title>
    <?=APPNAME?>
      <?php if (isset($title)): ?>
        <?=htmlspecialchars($title) ?>
          <?php endif ?>
  </title>

  <!-- Bootstrap Core CSS -->
  <link href="public/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/css/styles.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="public/css/1-col-portfolio.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <?=APPNAME?>
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

           <?php if ( inPaths(["/account.php"])):?>
            <li>
              <a href="logout.php">Logout</a>
            </li>
            <?php endif ?>

        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?=$title?>
    </h1>
      </div>
    </div>
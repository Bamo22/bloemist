<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php require_once "publicFunctions.php"; ?>
    <title><?php echo thisPageTitle(); ?></title>
    <link href="/flowerpower/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container"></div>
     <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top custom-navcolor">
        
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand bigger-brand" href="hoofdpagina">FlowerPower</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li>
                    <a href="/flowerpower/hoofdpagina">Hoofdpagina</a>
                </li>
                <li>
                    <a href="/flowerpower/producten">Producten</a>
                </li>
                <?php if(!isLogin()){ 
                  echo "
                  <li>
                    <a href='/flowerpower/login'>Login</a>
                  </li>
                  <li>
                    <a href='/flowerpower/registreer'>Registreer</a>
                  </li>";} ?>
                  <?php if(isLogin()){ 
                  echo "
                  <li>
                    <a href='/flowerpower/facturen'>Mijn facturen</a>
                  </li>
                  <li>
                    <a href='/flowerpower/winkelwagen'>Mijn winkelwagen</a>
                  </li>
                  <li>
                    <a href='/flowerpower/wijzigmijngegevens'>Gegevens wijzigen</a>
                  </li>
                  <li>
                    <a class='btn btn-default' href='/flowerpower/uitloggen'>uitloggen</a>
                  </li>";} ?>
                <li>
                    <a href="/flowerpower/contact">Contact</a>
                </li>
            
          </ul>
          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div><!/.nav-collapse-->
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
    </nav> 

     <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                
                <li>
                    <a href="/flowerpower/hoofdpagina">Hoofdpagina</a>
                </li>
                 <li>
                    <a href="/flowerpower/producten">Producten</a>
                </li>
                <?php if(!isLogin()){ 
                  echo "
                  <li>
                    <a href='/flowerpower/login'>Login</a>
                  </li>
                  <li>
                    <a href='/flowerpower/registreer'>Registreer</a>
                  </li>";
                }
                   if(isLogin()){ 
                  echo "<li>
                    <a href='/flowerpower/facturen'>Mijn facturen</a>
                  </li>
                  <li>
                    <a href='/flowerpower/winkelwagen'>Mijn winkelwagen</a>
                  </li>
                  <li>
                    <a href='/flowerpower/wijzigmijngegevens'>Gegevens wijzigen</a>
                  </li> 
                  <li>
                    <a class='btn btn-default' href='/flowerpower/uitloggen'>uitloggen</a>
                  </li>";} ?>
                <li>
                    <a href="/flowerpower/contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
             <?php require_once "page.php"; ?>
             <?php require_once "post.php"; ?>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   <!--  <footer class="navbar navbar-fixed-bottom text-center">FlowerPower BPV 2012 - 2017</footer> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/flowerpower/packages/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/flowerpower/packages/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/flowerpower/js/updateAantal.js"></script>
  </body>
</html>
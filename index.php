<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="icon" href="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6IzRFODk0RDsiIGQ9Ik0zNzguODgsMzQxLjMzM2MwLDQ1LjI4LTM2LjY0LDgxLjkyLTgxLjkyLDgxLjkyaC0yNy4zMDd2LTI3LjMwN2MwLTQ1LjI4LDM2LjY0LTgxLjkyLDgxLjkyLTgxLjkyICBoMjcuMzA3VjM0MS4zMzN6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM2REMxODA7IiBkPSJNMjE1LjA0LDM2OC42NGMtNDUuMjgsMC04MS45Mi0zNi42NC04MS45Mi04MS45MnYtMjcuMzA3aDI3LjMwN2M0NS4yOCwwLDgxLjkyLDM2LjY0LDgxLjkyLDgxLjkyICB2MjcuMzA3SDIxNS4wNHoiLz4KPHJlY3QgeD0iMjM1LjUyIiB5PSIxNTAuMTg3IiBzdHlsZT0iZmlsbDojNUNBMTVEOyIgd2lkdGg9IjQwLjk2IiBoZWlnaHQ9IjM2MS44MTMiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0U1OTJCRjsiIGQ9Ik0zNTguNCwxMDIuNGMwLTE0LjIyOC02LjIyNS0yNi45OTUtMTYuMDkyLTM1Ljc1YzAuNzg2LTEzLjE2Ny0zLjgzOS0yNi41OTctMTMuOS0zNi42NTggIGMtMTAuMDYxLTEwLjA2MS0yMy40OTEtMTQuNjg3LTM2LjY1OC0xMy45QzI4Mi45OTUsNi4yMjYsMjcwLjIyOCwwLDI1Niwwcy0yNi45OTUsNi4yMjYtMzUuNzUsMTYuMDkyICBjLTEzLjE2Ny0wLjc4Ni0yNi41OTcsMy44MzktMzYuNjU4LDEzLjlzLTE0LjY4NywyMy40OTEtMTMuOSwzNi42NThjLTkuODY3LDguNzU1LTE2LjA5MiwyMS41MjItMTYuMDkyLDM1Ljc1ICBzNi4yMjUsMjYuOTk1LDE2LjA5MiwzNS43NWMtMC43ODYsMTMuMTY3LDMuODM5LDI2LjU5NywxMy45LDM2LjY1OGMxMC4wNjEsMTAuMDYxLDIzLjQ5MSwxNC42ODcsMzYuNjU4LDEzLjkgIGM4Ljc1NSw5Ljg2NiwyMS41MjIsMTYuMDkyLDM1Ljc1LDE2LjA5MnMyNi45OTUtNi4yMjYsMzUuNzUtMTYuMDkyYzEzLjE2NywwLjc4NiwyNi41OTctMy44MzksMzYuNjU4LTEzLjkgIGMxMC4wNjEtMTAuMDYxLDE0LjY4Ny0yMy40OTEsMTMuOS0zNi42NThDMzUyLjE3NSwxMjkuMzk1LDM1OC40LDExNi42MjgsMzU4LjQsMTAyLjR6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFMTc2QUY7IiBkPSJNMzU4LjQsMTAyLjRjMC0xNC4yMjgtNi4yMjUtMjYuOTk1LTE2LjA5Mi0zNS43NWMwLjc4Ni0xMy4xNjctMy44MzktMjYuNTk3LTEzLjktMzYuNjU4ICBjLTEwLjA2MS0xMC4wNjEtMjMuNDkxLTE0LjY4Ny0zNi42NTgtMTMuOUMyODIuOTk1LDYuMjI2LDI3MC4yMjgsMCwyNTYsMHYyMDQuOGMxNC4yMjgsMCwyNi45OTUtNi4yMjYsMzUuNzUtMTYuMDkyICBjMTMuMTY3LDAuNzg2LDI2LjU5Ny0zLjgzOSwzNi42NTgtMTMuOWMxMC4wNjEtMTAuMDYxLDE0LjY4Ny0yMy40OTEsMTMuOS0zNi42NThDMzUyLjE3NSwxMjkuMzk1LDM1OC40LDExNi42MjgsMzU4LjQsMTAyLjR6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkVBOEE7IiBkPSJNMjU2LDEyOS43MDdjLTE1LjA1NywwLTI3LjMwNy0xMi4yNS0yNy4zMDctMjcuMzA3UzI0MC45NDMsNzUuMDkzLDI1Niw3NS4wOTMgIGMxNS4wNTcsMCwyNy4zMDcsMTIuMjUsMjcuMzA3LDI3LjMwN1MyNzEuMDU3LDEyOS43MDcsMjU2LDEyOS43MDd6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkRCMkQ7IiBkPSJNMjU2LDc1LjA5M3Y1NC42MTNjMTUuMDU3LDAsMjcuMzA3LTEyLjI1LDI3LjMwNy0yNy4zMDdTMjcxLjA1Nyw3NS4wOTMsMjU2LDc1LjA5M3oiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php require_once "publicFunctions.php"; ?>
    <title><?php echo thisPageTitle(); ?></title>
    <link href="css/style.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#">FlowerPower</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li>
                    <a href="hoofdpagina">Hoofdpagina</a>
                </li>
                <li>
                    <a href="producten">Producten</a>
                </li>
                <?php if(!isLogin()){ 
                  echo "
                  <li>
                    <a href='login'>Login</a>
                  </li>
                  <li>
                    <a href='registreer'>Registreer</a>
                  </li>";} ?>
                  <?php if(isLogin()){ 
                  echo "
                  <li>
                    <a href='facturen'>Mijn facturen</a>
                  </li>
                  <li>
                    <a href='wijzigmijngegevens'>Gegevens wijzigen</a>
                  </li>
                  <li>
                    <a class='btn btn-default' href='uitloggen'>uitloggen</a>
                  </li>";} ?>
                <li>
                    <a href="contact">Contact</a>
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
                    <a href="hoofdpagina">Hoofdpagina</a>
                </li>
                 <li>
                    <a href="producten">Producten</a>
                </li>
                <?php if(!isLogin()){ 
                  echo "
                  <li>
                    <a href='login'>Login</a>
                  </li>
                  <li>
                    <a href='registreer'>Registreer</a>
                  </li>";
                }
                   if(isLogin()){ 
                  echo "<li>
                    <a href='facturen'>Mijn facturen</a>
                  </li>
                  <li>
                    <a href='wijzigmijngegevens'>Gegevens wijzigen</a>
                  </li> 
                  <li>
                    <a class='btn btn-default' href='uitloggen'>uitloggen</a>
                  </li>";} ?>
                <li>
                    <a href="contact">Contact</a>
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
    <script src="packages/jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="packages/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
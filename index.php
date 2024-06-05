<!DOCTYPE html>
<html>
  <head>
    <title>Zangaloro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="hw1.css">
    <link rel="preconnessioneessioneessioneect" href="https://fonts.googleapis.com">
    <link rel="preconnessioneessioneessioneect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- ROBOTO DA GOOGLE FONTS -->
    <link rel="preconnessioneessioneessioneect" href="https://fonts.googleapis.com">
    <link rel="preconnessioneessioneessioneect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- NUNITO DA GOOGLE FONTS -->
    <link rel="preconnessioneessioneessioneect" href="https://fonts.googleapis.com">
    <link rel="preconnessioneessioneessioneect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- RALEWAY DA GOOGLE FONTS -->
    <meta name="viewport" content="width=device-width" />
    <!-- MOBILE -->
    <script src="hw1.js" defer></script>
    <!-- PERMESSI PER FAR FUNZIONARE LE API PER LA MAPPPA -->
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  </head>
  <body>
    <nav>
      <img id="logo" src="IMG\ZANGALORO.it.png" />
      <div id="FBoxIconeNav">
        <div>
          <a href="#" id="mobileUser" data-logged-in="false">
            <img class="FItemIconeNav" src="IMG/user.svg" />
          </a>
        </div>
        <div id="login" class="hidden">
          <div id="navLogin">
            <h2>ACCEDI</h2>
          </div>
          <h2>ACCEDI CON LE TUE CREDENZIALI</h2>
          <form id="LoginForm" action="login.php" method="POST">
            <input type="email" class="loginBar" name="email" id="email" placeholder="INDIRIZZO E-MAIL">
            <input type="password" class="loginBar" name="password" id="password" placeholder="PASSWORD">
            <input type="submit" id="LoginBtn" value="ACCEDI">
          </form>
          <div>
            <h2>NON SEI ANCORA REGISTRATO?</h2>
          </div>
          <a href="registrazione.php">
            <div id="registratiBtn"> REGISTRATI </div>
          </a>
          <div id="ftLogin"></div>
        </div>
        <button id="logoutBtn">LOGOUT</button>
        <a href="#">
          <img class="FItemIconeNav" id="mobileShop" src="IMG\cart.png" />
        </a>
      </div>
    </nav>
    <header>
      <h1>BENVENUTO IN ZANGALORO</h1>
      <form id="Spotify">
        <div id="search">
          <input type="text" id="ricerca" class="searchBar" placeholder="Inserisci il nome di un album">
          <button id="searchBtn">
            <img src="IMG\search.png">
          </button>
        </div>
      </form>
      <div id="FBoxRitiraInNegozio">
        <a href="#">
          <strong>RITIRA IN NEGOZIO</strong>
          <img id="FItemRitiraInNegozio" src="IMG\shop-icon-bk.png" />
        </a>
      </div>
      <div id="negozio" class="hidden">
  <div id="chiudi-negozio">CHIUDI</div>
  <h2>AGGIUNGI AL CARRELLO O AI PREFERITI</h2>
  <div id="FBoxImgNegozio">
    <div class="FitemNegozio">
      <img src="IMG\burger_negozio.png">
      <div class="FBoxScritteNegozio">HAMBURGER SPECIAL</div>
      <div class="button-container">
        <button class="btnCart">
          <img class="imgCart" src="IMG/cart.png">
        </button>
        <button class="btnHeart" data-product-id="1">
          <img class="imgHeart" src="IMG/heart.png">
        </button>
      </div>
    </div>
    <div class="FitemNegozio">
      <img src="IMG\torta_negozio.jpg">
      <div class="FBoxScritteNegozio">TORTA OREO</div>
      <div class="button-container">
        <button class="btnCart">
          <img class="imgCart" src="IMG/cart.png">
        </button>
        <button class="btnHeart" data-product-id="2">
          <img class="imgHeart" src="IMG/heart.png">
        </button>
      </div>
    </div>
    <div class="FitemNegozio">
      <img src="IMG\pokè_negozio.png">
      <div class="FBoxScritteNegozio">POKÈ</div>
      <div class="button-container">
        <button class="btnCart">
          <img class="imgCart" src="IMG/cart.png">
        </button>
        <button class="btnHeart" data-product-id="3">
          <img class="imgHeart" src="IMG/heart.png">
        </button>
      </div>
    </div>
    <div class="FitemNegozio">
      <img src="IMG\sushi_negozio.jpg">
      <div class="FBoxScritteNegozio">NIGIRI 2 PZ.</div>
      <div class="button-container">
        <button class="btnCart">
          <img class="imgCart" src="IMG/cart.png">
        </button>
        <button class="btnHeart" data-product-id="4">
          <img class="imgHeart" src="IMG/heart.png">
        </button>
      </div>
    </div>
    <div class="FitemNegozio">
      <img src="IMG\carne_negozio.jpg">
      <div class="FBoxScritteNegozio">CARNE DI SCOTTONA</div>
      <div class="button-container">
        <button class="btnCart">
          <img class="imgCart" src="IMG/cart.png">
        </button>
        <button class="btnHeart" data-product-id="5">
          <img class="imgHeart" src="IMG/heart.png">
        </button>
      </div>
    </div>
  </div>
</div>

    </header>
    <div>
      <section id="FBoxImg" class="mobileImg">
        <img class="FItemImg" src="IMG\burger.png" />
        <img class="FItemImg" src="IMG\cafe.png" />
        <img class="FItemImg" src="IMG\poke.png" />
        <img class="FItemImg" src="IMG\sushi.jpg" />
        <img class="FItemImg" src="IMG\salumi.png" />
      </section>
      <section id="modalView" class="hidden"></section>
    </div>
    <footer>
      <div>
        <a href="#/">
          <img id="logoFt" src="IMG\ZANGALORO.it.png" />
        </a>
      </div>
      <div id="fontFt">
        <p>
          <br>ZANGA S.R.L.</br>P.IVA 06245000820
        </p>
        <p>POWERED BY <a href="http://www.quattroweb.it/">QUATTROWEB S.R.L.</a>
        </p>
      </div>
      <div id="scritteFt">
        <div id="ft">
          <a href="#">
            <strong class="mobileP">
              <p>SCRIVI UNA RECENSIONE</p>
            </strong>
          </a>
          <a href="#">
            <strong class="mobileP">
              <p>PRIVACY POLICY</p>
            </strong>
          </a>
          <a href="#">
            <strong>
              <p>LISTA ALLERGENI</p>
            </strong>
          </a>
          <a href="#">
            <strong>
              <p>FAQ</p>
            </strong>
          </a>
          <a href="#">
            <strong>
              <p>CONTATTI</p>
            </strong>
          </a>
        </div>
      </div>
      <a href="https://www.instagram.com/zangaloromeatfactory/" target="_blank">
        <img class="socialFt" src="IMG\insta-black.svg" />
      </a>
      <a href="https://www.facebook.com/zangaloromeatfactory?fref=ts" target="_blank">
        <img class="socialFt" src="IMG\fb-black.svg" />
      </a>
      <div id="mappa"></div>
      <section id="album-view"></section>
    </footer>
  </body>
</html>
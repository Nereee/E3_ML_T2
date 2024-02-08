<!DOCTYPE html>
<html lang="eu">


<head>
    <title>Elorrieta zinema</title>
    <meta name="keywords" content="Elorrieta zinema, zinema, filmak, erreserbak, pelikulak">
    <meta name="author" content="HAPA">
    <meta name="description" content="Tiketaren erosketa">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
    <link rel="icon" href="favicon-16x16.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/9b73a90cb7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body onload="obtenerParametrosUrl()">

    <header>
        <div class="container">
            <div class="logo">
                <img src="logo.png" alt="logoa">
            </div>
        </div>
    </header>


    <hr>


    <nav>
        <div class="nabegaziobarra">
            <ul>
                <li><a href="index.html">Hasiera</a></li>
                <li><a href="drama.html">Drama</a></li>
                <li><a href="beldurra.html">Beldurra</a></li>
                <li><a href="zientziafikzioa.html">Zientzia Fikzioa</a></li>
                <li><a href="komedia.html">Komedia</a></li>
                <li><a href="erreserbak.html">Erreserbak</a></li>
                <li><a href="hasisaioa.php">Hasi saioa </a></li>
                <li><a href="#">Erregistratu</a></li>

            </ul>
        </div>
    </nav>


    <hr>

    <body>
    <section class="formularioaH">
        <h5>Erosketa laburpena</h5>
        <script>
        function obtenerParametrosUrl() {
            var url = window.location.href;
            var parametros = url.split('?')[1];
            if (parametros) {
                var parametrosArray = parametros.split('&');
                var parametrosObjeto = {};

                for (var i = 0; i < parametrosArray.length; i++) {
                    var parametro = parametrosArray[i].split('=');
                    parametrosObjeto[parametro[0]] = parametro[1];
                }

                alert(parametrosObjeto[Object.keys(parametrosObjeto)[0]]);
                return parametrosObjeto;
            } else {
                console.log("No hay parámetros en la URL.");
                return null;
            }
        }
    </script>
    </section>
        <footer>
            <div class="container3">
                <div class="info-footer">
                    <h4>Informazioa</h4>
                    <ul>
                        <li>Agirre Lehendakariaren Etorb., 184</li>
                        <li>48015 - Bilbo</li>
                        <li>Autobusa: 70,46.</li>
                        <li>Metroa: San Ignazio, Asturias irteera</li>
                        <li> <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                                <img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png">
                            </a></li>
                    </ul>
                </div>
                <div class="kontaktua">
                    <h4>Kontaktua</h4>
                    <i class="fa-solid fa-phone" style="color: #ffffff;"></i> 944 02 80 00
                    <i class="fa-solid fa-envelope"></i> elorrietazinema@gmail.com
                    <i class="fa-brands fa-instagram fa-sm" style="color: #ffffff;"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-facebook"></i>
                </div>


                <div class="mapa">
                    <h4>Kokapena</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5808.636528021377!2d-2.9667557!3d43.28665625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e50774e8ca143%3A0x88bb341c60a9b44d!2sElorrieta%2C%2048015%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1696938647128!5m2!1ses!2ses" width="100" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </footer>
    </body>

</html>
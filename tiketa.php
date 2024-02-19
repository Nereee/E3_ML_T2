<?php
session_start();
?>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/t1qEzW9Xp8hYK3GIvGz8Nszptr5S9ZBvTqUfM=" crossorigin="anonymous"></script>

    <script>
        function ZinemaUrl() {
            var zinema = document.getElementById("zinemak").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&zinemak=" + zinema;
        }

        function FilmaUrl() {
            var filma = document.getElementById("filma").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&filma=" + filma;
        }

        function DataUrl() {
            var data = document.getElementById("data").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&data=" + data;
        }
        function SaioaUrl() {
            var saioa = document.getElementById("saioa").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&saioa=" + saioa;
            <?php
            if (isset($_GET['saioa'])) {
                $saioa = $_GET['saioa'];
                $_SESSION['saioa'] = $saioa;
            }
            ?>
        }

        function ZinemaIzena() {
            //Zinema ezarri
            var zinema = document.getElementById("zinemak");
            <?php
            $sql = "SELECT Idzinema, izena FROM zinema where Idzinema < 6";
            $mysqli = new mysqli("localhost", "root", "", "db_zinema");
            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {
            ?>
                var aukera = document.createElement("option");
                aukera.value = "<?php echo $row['Idzinema']; ?>";
                aukera.textContent = "<?php echo $row['izena']; ?>";
                aukera.style.color = "black";
                zinema.appendChild(aukera);
            <?php
            }
            ?>
            <?php
            if (isset($_GET['zinemak'])) {
                //Filma ezarri
            ?>
                var filma = document.getElementById("filma");
                document.getElementById("zinemak").value = "<?php echo $_GET['zinemak']; ?>";
                document.getElementById("zinemak").style.color = "black";
                <?php
                $zinema = $_GET['zinemak'];
                $_SESSION['zinema'] = $zinema;
                $sql = "SELECT distinct(Izenburua), Filma.Idfilma 
                FROM Filma
                INNER JOIN Saioa USING (idfilma)
                INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    var aukera = document.createElement("option");
                    aukera.value = "<?php echo $row['Idfilma']; ?>";
                    aukera.textContent = "<?php echo $row['Izenburua']; ?>";
                    aukera.style.color = "black";
                    filma.appendChild(aukera);
                <?php
                }
                if (isset($_GET['filma'])) {
                    //Data ezarri
                ?>
                    var data = document.getElementById("data");
                    document.getElementById("filma").value = "<?php echo $_GET['filma']; ?>";
                    document.getElementById("filma").style.color = "black";
                    <?php
                    $filma = $_GET['filma'];
                    $_SESSION['filma'] = $filma;
                    $sql = "SELECT distinct(S_Data), idSaioa  
                    FROM Filma
                    INNER JOIN Saioa USING (idfilma)
                    INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                    INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema and idfilma = $filma";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        var aukera = document.createElement("option");
                        aukera.value = "<?php echo $row['S_Data']; ?>";
                        aukera.textContent = "<?php echo $row['S_Data']; ?>";
                        aukera.style.color = "black";
                        data.appendChild(aukera);
                    <?php
                    }
                    if (isset($_GET['data'])) {
                        //Saioa ezarri
                        //TOFIX: SaioaData eta SaioaOrdua funtzioak ez dute funtzionatzen datua ez lortzean
                    ?>
                        var saioa = document.getElementById("saioa");
                        document.getElementById("data").value = "<?php echo $_GET['data']; ?>";
                        document.getElementById("data").style.color = "black";
                        <?php
                        $data = $_GET['data'];
                        $_SESSION['data'] = $data;
                        $sql = "SELECT Ordu_Data, IdSaioa, S_Data
                        FROM Filma
                        INNER JOIN Saioa USING (idfilma)
                        INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                        INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema and idfilma = $filma and S_Data = '$data'";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            var aukera = document.createElement("option");
                            aukera.value = "<?php echo $row['Ordu_Data']; ?>";
                            aukera.textContent = "<?php echo $row['Ordu_Data']; ?>";
                            <?php $_SESSION['idsaioa'] = $row['IdSaioa']; ?>
                            aukera.style.color = "black";
                            saioa.appendChild(aukera);
                        <?php
                        }
                    }
                }
            }
            ?>
        }

    </script>
</head>


<body onload="ZinemaIzena()">
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
    <section class="formularioaH">
        <h5>Tiketaren erosketa</h5>
        <form id="botoia" action="erosketa.php" method="get">
            <label for="zinemak">Aukeratu zinema:</label>
            <select name="zinemak" id="zinemak" onchange="ZinemaUrl()">
                <option value="0" style="color: black">-</option>
            </select>
            <br>
            <label for="filma">Aukeratu filma:</label>
            <select name="filma" id="filma" onchange="FilmaUrl()">
                <option value="0" style="color: black">-</option>
            </select>
            <br>
            <label for="data">Aukeratu data:</label>
            <select id="data" name="data" onchange="DataUrl()">
                <option value="0" style="color: black">-</option>
            </select>
            <br>
            <label for="saioa">Aukeratu saioa:</label>
            <select name="saioa" id="saioa" onchange="SaioaURL()">
                <option value="0" style="color: black">-</option>
            </select>
            <br>
            <label for="kopurua">Sartu kopurua:</label>
            <input type="number" id="kopurua" name="kopurua" min="1" value="1" style="color: black">
            <br><br>
            <input class="botoia" type="submit" onclick="Bidali()">
        </form>
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
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
        function FilmaUrl() {
            var zinema = document.getElementById("zinemak").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&zinemak="+zinema;

        }
        function DataUrl() {
            var filma = document.getElementById("filma").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&filma="+filma;
        }
        function SaioaUrl() {
            var data = document.getElementById("data").value;
            let patharray = window.location.href;
            window.location = window.location.href + "&data="+data;
        }

        function ZinemaIzena() {
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
            ?>
                
                document.getElementById("zinemak").value = "<?php echo $_GET['zinemak']; ?>";
                <?php
    
                $zinema = $_GET['zinemak'];
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
                    filma.appendChild(aukera);
                <?php
                }
                if (isset($_GET['filma'])) {
                ?>
                    document.getElementById("filma").value = "<?php echo $_GET['filma']; ?>";
                    <?php
                    $filma = $_GET['filma'];
                    $sql = "SELECT distinct(S_Data), idSaioa  
                    FROM Filma
                    INNER JOIN Saioa USING (idfilma)
                    INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                    INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema and idfilma = $filma";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        var aukera = document.createElement("option");
                        aukera.value = "<?php echo $row['idSaioa']; ?>";
                        aukera.textContent = "<?php echo $row['S_Data']; ?>";
                        data.appendChild(aukera);
                    <?php
                    }
                    if (isset($_GET['data'])) {
                    ?>
                        document.getElementById("data").value = "<?php echo $_GET['data']; ?>";
                        <?php
                        $data = $_GET['data'];
                        $sql = "SELECT Ordu_Data, IdSaioa, S_Data
                        FROM Filma
                        INNER JOIN Saioa USING (idfilma)
                        INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                        INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema and idfilma = $filma and S_Data = $data";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            var aukera = document.createElement("option");
                            aukera.value = "<?php echo $row['IdSaioa']; ?>";
                            aukera.textContent = "<?php echo $row['Ordu_Data']; ?>";
                            saioa.appendChild(aukera);
                        <?php
                        }
                    }
                    if (isset($_GET['data'])) {
                        ?>
                        document.getElementById("data").value = "<?php echo $_GET['data']; ?>";
                        <?php
                        $data = $_GET['data'];
                        $sql = "SELECT Ordu_Data, IdSaioa, S_Data
                        FROM Filma
                        INNER JOIN Saioa USING (idfilma)
                        INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
                        INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = $zinema and idfilma = $filma and S_Data = $data";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            var aukera = document.createElement("option");
                            aukera.value = "<?php echo $row['IdSaioa']; ?>";
                            aukera.textContent = "<?php echo $row['Ordu_Data']; ?>";
                            saioa.appendChild(aukera);
                            <?php
                        }
                    }
                }
            }
            ?>
        }

        function Data() {
            var zinema = document.getElementById("zinemak").value;
            var filma = document.getElementById("filma").value;
            var data = document.getElementById("data");
            <?php
            $sql = "SELECT distinct(S_Data), idSaioa  
            FROM Filma
            INNER JOIN Saioa USING (idfilma)
            INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
            INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = 1 and idfilma = 1";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                var aukera = document.createElement("option");
                aukera.value = "<?php echo $row['idSaioa']; ?>";
                aukera.textContent = "<?php echo $row['S_Data']; ?>";
                data.appendChild(aukera);
            <?php
            }
            ?>
        }

        function Saioa() {
            var zinema = document.getElementById("zinemak").value;
            var filma = document.getElementById("filma").value;
            var data = document.getElementById("data").value;
            var saioa = document.getElementById("saioa");
            <?php
            $sql = "SELECT Ordu_Data, IdSaioa, S_Data
            FROM Filma
            INNER JOIN Saioa USING (idfilma)
            INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
            INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = 1 and idfilma = 1 and S_Data = 0000-00-00";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                var aukera = document.createElement("option");
                aukera.value = "<?php echo $row['IdSaioa']; ?>";
                aukera.textContent = "<?php echo $row['Ordu_Data']; ?>";
                saioa.appendChild(aukera);
            <?php
            }
            ?>

            //TODO: Informazioaren bidalketa komprobazioa
            function Bidali() {
                alert("Erosketa burutu da");
                var zinema = document.getElementById("zinemak").value;
                var filma = document.getElementById("filma").value;
                var data = document.getElementById("data").value;
                var saioa = document.getElementById("saioa").value;
                if (zinema == "" || filma == "" || data == "" || saioa == "") {
                    alert("Eremu guztiak bete behar dira");
                } else {
                    window.location.href = "erosketa.php?zinema=" + zinema + "&filma=" + filma + "&data=" + data + "&saioa=" + saioa;
                }
            }
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
            <select name="zinemak" id="zinemak" onchange="FilmaUrl()">
            </select>
            <br><br>
            <label for="filma">Aukeratu filma:</label>
            <select name="filma" id="filma" onchange="DataUrl()">
            </select>
            <br><br>
            <label for="data">Aukeratu data:</label>
            <select id="data" name="data" onchange="SaioaUrl()">
            </select>
            <br><br>
            <label for="saioa">Aukeratu saioa:</label>
            <select name="saioa" id="saioa">
            </select>
            <br><br>
            <input class="botoia" type="submit" name="botoia" value="Erosi" onclick="Bidali()">
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
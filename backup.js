function FilmaIzena() {
    var filma = document.getElementById("filma");
    <?php
    $sql = "SELECT distinct(Izenburua), Filma.Idfilma 
    FROM Filma
    INNER JOIN Saioa USING (idfilma)
    INNER JOIN Aretoa a ON Saioa.idaretoa = a.idaretoa
    INNER JOIN zinema z ON a.idzinema = z.idzinema where z.idzinema = 2";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        var aukera = document.createElement("option");
        aukera.value = "<?php echo $row['Idfilma']; ?>";
        aukera.textContent = "<?php echo $row['Izenburua']; ?>";
        filma.appendChild(aukera);
    <?php
    }
    ?>
}


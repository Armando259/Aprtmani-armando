<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Izvoz Kontakata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        textarea {
            width: 100%;
            height: 300px;
        }
    </style>
</head>
<body>
    <h1>Izvoz Kontakata u XML</h1>
    <form action="download_xml.php" method="GET">
        <button type="submit">Download</button>
    </form>
  
    <?php
    // Povezivanje na bazu podataka
    require_once('config/db.php');
    $query = "SELECT * FROM kontakt";
    $result = mysqli_query($con, $query);

    // Provjera ima li rezultata
    if (mysqli_num_rows($result) > 0) {
        // Kreiranje novog XML dokumenta
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->formatOutput = true;

        // Kreiranje glavnog elementa
        $baza123 = $xml->createElement("kontakti");
        $xml->appendChild($baza123);

        // Obrada svakog retka iz rezultata
        while ($row = mysqli_fetch_assoc($result)) {
            $kontakt = $xml->createElement("kontakt");
            $baza123->appendChild($kontakt);
            
            // Dodavanje djece za svako polje
            foreach ($row as $key => $value) {
                $node = $xml->createElement($key, htmlspecialchars($value));
                $kontakt->appendChild($node);
            }
        }

        // Spremanje XML-a u datoteku
       // $xml->save("report1.xml");
        
        // Prikaz XML-a u pregledniku
        echo "<xmp>" . $xml->saveXML() . "</xmp>";
    } else {
        echo "No records found";
    }

    // Zatvaranje konekcije
    mysqli_close($con);
    ?>
    
</body>
</html>

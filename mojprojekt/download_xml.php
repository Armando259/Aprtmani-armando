<?php
require_once('config/db.php');
$query = "SELECT * FROM kontakt";
$result = mysqli_query($con, $query);

header('Content-Type: application/xml');
header('Content-Disposition: attachment; filename="mozee.xml"');

if (mysqli_num_rows($result) > 0) {
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;
    $baza123 = $xml->createElement("kontakti");
    $xml->appendChild($baza123);

    while ($row = mysqli_fetch_assoc($result)) {
        $kontakt = $xml->createElement("kontakt");
        $baza123->appendChild($kontakt);

        foreach ($row as $key => $value) {
            $node = $xml->createElement($key, htmlspecialchars($value));
            $kontakt->appendChild($node);
        }
    }

    // Umjesto spremanja, direktno šalje XML kao izlaz
    echo $xml->saveXML();
} else {
    echo "No records found";
}

mysqli_close($con);
?>

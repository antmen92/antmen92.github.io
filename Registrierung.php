<?php

$benutzername = $_GET['benutzername'];
$vorname = $_GET['vname'];
$nachname = $_GET['nname'];
$geschlecht = $_GET['gesch'];
$geburtsdat = $_GET['geb'];
$ort = $_GET['ort'];
$str = $_GET['str'];
$hnr = $_GET['hnr'];
$plz = $_GET['plz'];
$pw = $_GET['pw'];
$pw2 = $_GET['pw2'];
$tel = $_GET['tel'];
$email = $_GET['email'];
$recht = $_GET['rechte'];

$db = dbVerbindungHerstellen();
$werteabfrage = $db->query( "SELECT * FROM a_angestellte");
while ($row = $werteabfrage->fetch_array()) {
    $angestellte = $row['a_benutzername'];
    if($angestellte == $benutzername)
    {
        echo "Benutzer schon vorhanden";
        echo "<br>";
        echo $angestellte;
        echo "=";
        echo $row['a_benutzername'];
    }
}
$db->close();

if( $pw == $pw2) {
    $pdo = new PDO('mysql:host=localhost;dbname=verwaltungsystem', 'root', '');

    $statement = $pdo->prepare("INSERT INTO a_angestellte (
      a_benutzername,
      a_vorname,
      a_nachname,
      a_pw,
      a_geburtsdatum,
      a_telefonnummer,
      a_plz,
      a_ort,
      a_strasse,
      a_hausnummer,
      a_recht,
      a_geschlecht,
      a_email
      
      ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $statement->execute(array($benutzername, $vorname, $nachname, $pw, $geburtsdat, $tel, $plz, $ort, $str, $hnr, $recht, $geschlecht, $email));

}else{
    echo "Passwort fasch widerholt";
}


function dbVerbindungHerstellen()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "verwaltungsystem";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }/*else
    {

        echo "Connected successfully";
    }*/

    return $db;
}

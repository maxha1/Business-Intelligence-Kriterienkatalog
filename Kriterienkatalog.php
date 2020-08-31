<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Stylesheet_Katalog.css">
    <title>BI Kriterienkatalog</title>
  </head>
  <body>
    <?php
      /* Herstellung der Verbindung zur Datenbank */
      $mysqli = new mysqli("localhost", "id14706467_kriterienkatalog_benutzer", "fR8[{TI@K|am#xlj", "id14706467_kriterienkatalog");
      if ($mysqli->connect_error) {
        echo "Fehler bei der Verbindung: " . mysqli_connect_error();
        exit();
      } else {
        echo "Verbindung wurde hergestellt.</br><br/>";
      }
      $Branche = $_GET["Branche"];
      /* Überprüfen, ob die Branche Transport gewählt wurde */
      if($Branche == "Transport") {
      /* Abfrage aller Datensätze aus Branche "Transport" */
      $ergebnis = $mysqli->query("SELECT Kriterium FROM Kriterien_Transport");
      /* Mithilfe von While-Schleife Kriterien in Tabelle darstellen */
      echo "<form method='POST'>";
      $i = 0;
      echo" <table id='Table_Transport'>
            <tr>
              <th class='BranchenRubriken'>Kriterium</th>
              <th class='BranchenRubriken'>Erfüllungsgrad</th>
              <th class='BranchenRubriken'>Gewichtung</th>
            </tr>
            <tr>
              <th colspan=3 class='Zwischengliederungspunkt'>Datenmanagement</th>
            </tr>";
      while($Ausgabe = $ergebnis->fetch_array()) {
        echo "<tr>
                <td>{$Ausgabe["Kriterium"]}</td>
                <td><input type='number' id='Erfüllungsgrad'name='Erfüllungsgrad".$i."' min='1' max='10' required/></td>
                <td>
                  <input type='radio' id='Gewichtung1' name='Gewichtung".$i."' value='1' required>
                  <label for'Erfüllungsgrad2'>1</label><br>
                  <input type='radio' id='Gewichtung2' name='Gewichtung".$i."' value='2' required>
                  <label for'Erfüllungsgrad2'>2</label><br>
                  <input type='radio' id='Gewichtung3' name='Gewichtung".$i."' value='3' required>
                  <label for'Erfüllungsgrad3'>3</label><br>
                </td>
              </tr>
        ";
        /* hier werden die Rubriken der Kriterien wie z.B. "Dashboarding" eingefügt */
        if(strpos($Ausgabe["Kriterium"], "Metadatenmanagement") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Erweiterte Analysen</th>";
        } else if (strpos($Ausgabe["Kriterium"], "Stimmenbasierte") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Dashboarding und Datenvisualisierung</th>";
        } else if (strpos($Ausgabe["Kriterium"], "Verfügbarkeit und Einbettung ") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenanalyse</th>";
        } else if (strpos($Ausgabe["Kriterium"], "Clustergruppen Analyse") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenquellenanbindung</th>";
        } else if (strpos($Ausgabe["Kriterium"], "Einbindung von externen") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Eingebettete Analysen</th>";
        } else if (strpos($Ausgabe["Kriterium"], "Integrationsmöglichkeit in bereits") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Mobile BI</th>";
        }
        ++$i;
      }
      echo "    </table></br>
                <p id='SubmitButtonCenter'>
                    <input type='submit' value = 'Bewertung abschliessen und speichern' name = 'submit' id='Submit' onclick='BenachrichtigungSpeicherung()'/>
                </p>
            </form>
            <form method = 'POST'>
                <p id='AuswertungsButtonCenter'>
                 <input type='submit' value='Kriterienkatalog beenden und zur Auswertung gelangen' name='Auswertung' id    ='AuswertungsButton'/>
                </p>
            </form>
           ";
      $ergebnis->close();
    }
      /* Überprüfen, ob die Branche Telekommunikation gewählt wurde */
      else if ($Branche == "Telekommunikation") {
      /* Abfrage aller Datensätze aus Branche "Telekommunikation" */
      $ergebnis = $mysqli->query("SELECT Kriterium FROM Kriterien_Telekommunikation");
      /* Mithilfe von While-Schleife Kriterien in Tabelle darstellen */
      echo "<form method='POST'>";
      $i = 0;
      echo" <table border='1px' width='100%'>
            <tr>
              <th class='BranchenRubriken'>Kriterium</th>
              <th class='BranchenRubriken'>Erfüllungsgrad</th>
              <th class='BranchenRubriken'>Gewichtung</th>
            </tr>
            <tr>
              <th colspan=3 class='Zwischengliederungspunkt'>Dashboarding und Datenvisualisierung</th>
            </tr>";
      while($Ausgabe = $ergebnis->fetch_array()) {
        echo "<tr>
                <td>{$Ausgabe["Kriterium"]}</td>
                <td><input type='number' id='Erfüllungsgrad'name='Erfüllungsgrad".$i."' min='1' max='10' required/></td>
                <td>
                  <input type='radio' id='Gewichtung1' name='Gewichtung".$i."' value='1' required>
                  <label for'Erfüllungsgrad2'>1</label><br>
                  <input type='radio' id='Gewichtung2' name='Gewichtung".$i."' value='2' required>
                  <label for'Erfüllungsgrad2'>2</label><br>
                  <input type='radio' id='Gewichtung3' name='Gewichtung".$i."' value='3' required>
                  <label for'Erfüllungsgrad3'>3</label><br>
                </td>
              </tr>
            ";
        /* hier werden die Rubriken der Kriterien wie z.B. "Dashboarding" eingefügt */
        if(strpos($Ausgabe["Kriterium"], "Online Verfügbarkeit") !== false){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenmanagement</th>";
        } else if($Ausgabe["Kriterium"] == "Metadatenmanagement / Metadata Management"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenquellenanbindung</th>";
        } else if($Ausgabe["Kriterium"] == "Einbindung von externen und öffentlichen Daten / Using External and Open Data"){
        echo "<th colspan=3 class='Zwischengliederungspunkt'>Erweiterte Analysen</th>";
        } else if($Ausgabe["Kriterium"] == "Text- und Stimmenbasierte Bedienung / Text and Voice Service"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenanalyse</th>";
        } else if($Ausgabe["Kriterium"] == "Clustergruppen Analyse / Cluster Analysis"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Mobile BI</th>";
        } else if($Ausgabe["Kriterium"] == "Offline-Betrieb / Offline Mode"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Eingebettete Analysen</th>";
        }
        ++$i;
      }
      echo "    </table></br>
                <p id='SubmitButtonCenter'>
                    <input type='submit' value = 'Bewertung abschliessen und speichern' name = 'submit' id='Submit' onclick='BenachrichtigungSpeicherung()'/>
                </p>
            </form>
            <form method = 'POST'>
                <p id='AuswertungsButtonCenter'>
                 <input type='submit' value='Kriterienkatalog beenden und zur Auswertung gelangen' name='Auswertung' id    ='AuswertungsButton'/>
                </p>
            </form>
           ";
        $ergebnis->close();
      }
      /* Überprüfen, ob die Branche IT gewählt wurde */
      else if ($Branche == "IT") {
      /* Abfrage aller Datensätze aus Branche "Telekommunikation" */
      $ergebnis = $mysqli->query("SELECT Kriterium FROM Kriterien_IT");
      /* Mithilfe von While-Schleife Kriterien in Tabelle darstellen */
      echo "<form method='POST'>";
      $i = 0;
      echo" <table border='1px' width='100%'>
            <tr>
              <th class='BranchenRubriken'>Kriterium</th>
              <th class='BranchenRubriken'>Erfüllungsgrad</th>
              <th class='BranchenRubriken'>Gewichtung</th>
            </tr>
            <tr>
              <th colspan=3 class='Zwischengliederungspunkt'>Dashboarding und Datenvisualisierung</th>
            </tr>";
      while($Ausgabe = $ergebnis->fetch_array()) {
        echo "<tr>
                <td>{$Ausgabe["Kriterium"]}</td>
                <td><input type='number' id='Erfüllungsgrad'name='Erfüllungsgrad".$i."' min='1' max='10' required/></td>
                <td class='RadioInline'>
                  <input type='radio' id='Gewichtung1' name='Gewichtung".$i."' value='1' required>
                  <label for'Erfüllungsgrad2'>1</label><br>
                  <input type='radio' id='Gewichtung2' name='Gewichtung".$i."' value='2' required>
                  <label for'Erfüllungsgrad2'>2</label><br>
                  <input type='radio' id='Gewichtung3' name='Gewichtung".$i."' value='3' required>
                  <label for'Erfüllungsgrad3'>3</label><br>
                </td>
              </tr>
            ";
       /* hier werden die Rubriken der Kriterien wie z.B. "Dashboarding" eingefügt */
        if($Ausgabe["Kriterium"]=="Online Verfügbarkeit und Einbettung / Web Accessibility and Embeddability"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenmanagement</th>";
        } else if($Ausgabe["Kriterium"] == "Metadatenmanagement / Metadata Management"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Erweiterte Analysen</th>";
        } else if($Ausgabe["Kriterium"] == "Text- und Stimmenbasierte Bedienung / Text and Voice Service"){
        echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenanalyse</th>";
        } else if($Ausgabe["Kriterium"] == "Clustergruppen Analyse / Cluster Analysis"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Eingebettete Analysen</th>";
        } else if($Ausgabe["Kriterium"] == "Integrationsmöglichkeit in bereits vorhandene Systeme / Integrated Platforms"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Datenquellenanbindung</th>";
        } else if($Ausgabe["Kriterium"] == "Einbindung von externen und öffentlichen Daten / Using External and Open Data"){
          echo "<th colspan=3 class='Zwischengliederungspunkt'>Mobile BI</th>";
        }
        ++$i;
      }
      echo "    </table></br>
                <p id='SubmitButtonCenter'>
                    <input type='submit' value = 'Bewertung abschliessen und speichern' name = 'submit' id='Submit' onclick='BenachrichtigungSpeicherung()'/>
                </p>
            </form>
            <form method = 'POST'>
                <p id='AuswertungsButtonCenter'>
                 <input type='submit' value='Kriterienkatalog beenden und zur Auswertung gelangen' name='Auswertung' id    ='AuswertungsButton'/>
                </p>
            </form>
           ";
        $ergebnis->close();
      }
      /* Kreiren eines SideMenue für die W-Fragen */
        echo'
          <div id="WFragenSeitenMenue" class="SeitenMenue">
            <a href="javascript:void(0)" class="SeitenMenueSchliessen" onclick="SeitenMenueSchliessen()">&times;</a>
            <h3 class="SideMenueContent">Folgende 7 Leitfragen können Ihnen bei der Identifikation Ihrer Bedürfnisse behilflich sein:</h3>
            <ul id="LeitfragenListe" class="SideMenueContent">
              <li>Wer sind die Nutzer?</li>
              <li>Welche Anwendungseigenschaften sind Plichtbestandteil?</li>
              <li>Wann brauchen wir die BI Anwendung?</li>
              <li>Wo kommt die BI Anwendung zum Gebrauch?</li>
              <li>Warum benötigen wir eine BI Anwendung?</li>
              <li>Wie werden wir diese implementieren?</li>
              <li>Wie viel möchten wir für diese Anwendung ausgeben?</li>
            </ul>
          </div>

          <span id="LeitfragenMenueButton" onclick="SeitenMenueOeffnen()">Hilfreiche</br> Leitfragen</span>

          <script type="Text/JavaScript">
            function SeitenMenueOeffnen() {
              document.getElementById("WFragenSeitenMenue").style.width = "550px";
            }

            function SeitenMenueSchliessen() {
              document.getElementById("WFragenSeitenMenue").style.width = "0";
            }
          </script>
        ';
      /* Lesen der jeweiligen Datensätze aus der Datenbank */
      if(isset($_POST['submit'])) {
          $Ergebnis = 0;
          for($y = 0; $y < $i; $y++) {
            /* Zusammenrechnen der eingegebenen Werte, um Anwendungen später vergleichen zu können */
            $Startzustand = $_POST['Erfüllungsgrad'.$y] * $_POST['Gewichtung'.$y];
            $Ergebnis  = $Startzustand + $Ergebnis;
          }
          /* Speichern des Ergenisses der Bewertung dieser Anwendung in der Datenbank */
              $Eintrag = "INSERT INTO Zwischenspeicher_Bewertungen(Bewertungen_Anwendungen)VALUES($Ergebnis)";
              $Dateneintragen = $mysqli->query($Eintrag);
              if($Dateneintragen) {
                echo"
                    <p id='BewertungAbschliessenBenachrichtigung'>
                        Einfügen und Speichern der Daten hat funktioniert. Die <b>Punktzahl</b> der bewerteten Anwendung beträgt: <b>" .$Ergebnis. "</b></br></br>
                        Der Kriterienkatalog wurde geleert. Nutzen Sie diesen nun für eine neue Bewertung oder gelangen Sie über den 'Bewertung abschliessen' Button zur Auswertung.
                    </p>
                ";
              } else {
                echo "<p id='BewertungAbschliessenBenachrichtigung'>Fehler beim Einfügen der Daten. Bitte kontaktieren Sie den Webhost für weitere Informationen.</p>";
              }
        }
        $AnzahlBewerteteAnwendungen = 1;
        if(isset($_POST['Auswertung'])){
          $z = 0;
          $Auswertung = $mysqli->query("SELECT Bewertungen_Anwendungen FROM Zwischenspeicher_Bewertungen");
          if(mysqli_num_rows($Auswertung)==0){
            echo "
                <p id='BewertungAbschliessenBenachrichtigung'>
                    Es liegen keine Bewertungen vor. Bitte nehmen Sie zuerst die Bewertung einer Anwendung vor.
                </p>";
                return false;
          }
          echo"
                <p id='BewertungAbschliessenBenachrichtigung'>
              ";
          while($Einzelergebnis = $Auswertung->fetch_array()) {
            echo "
                Anwendung ".$AnzahlBewerteteAnwendungen." = {$Einzelergebnis["Bewertungen_Anwendungen"]} Punkte</br></br>
                ";
            /* Überprüfen, welche Anwendung die meisten Punkte hat */
            if($z < $Einzelergebnis["Bewertungen_Anwendungen"]) {
              $z = $Einzelergebnis["Bewertungen_Anwendungen"];
            }
            ++$AnzahlBewerteteAnwendungen;
          }
          $BesteAnwendung = $mysqli->query("SELECT ID FROM Zwischenspeicher_Bewertungen WHERE Bewertungen_Anwendungen ={$z}");
          $BesteAnwendungErgebnis = $BesteAnwendung->fetch_array();
          echo "
                    Die <b>höchste Bewertung</b> hat <b>Anwendung ".$BesteAnwendungErgebnis['ID']."</b> mit <b>".$z." Punkten</b>. Daher ist diese am besten für Ihr Unternehmen geeignet.</br>
                </p>";
          /* Löschen aller Bewertungen nach Abschluss und Auswertung */
          $BewertungenLöschen = $mysqli->query("TRUNCATE `id14706467_kriterienkatalog`.`Zwischenspeicher_Bewertungen`");
        }
        echo "
            <script type='text/JavaScript'>
                function BenachrichtigungSpeicherung() {
                    alert('Bewertung erfolgreich gespeichert. Für weitere Informationen scrollen Sie zum unteren Seitenende.');
                }
            </script>
        ";
      ?>
  </body>
</html>

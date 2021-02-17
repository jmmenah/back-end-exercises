<?php


$marcaBuscar = htmlspecialchars($_GET["marca"]);
$marcaNombre = htmlspecialchars($_GET["marcaNombre"]);

$client = new SoapClient(null, array(
                'uri' => 'http://jmmenah.infinityfreeapp.com/soap-automoviles/',
                'location' => 'http://jmmenah.infinityfreeapp.com/soap-automoviles/service-automoviles.php'
            )
        
            
        );
         $auth_params = new stdClass();
                $auth_params->username = 'ies';
                $auth_params->password = 'daw';
        
                $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
                $header = new SoapHeader('http://jmmenah.infinityfreeapp.com/soap-automoviles/GestionAutomoviles.php', 'authenticate', $header_params, false);
                $client->__setSoapHeaders(array($header));
            
      ?>

      <p style="font-size: 16px">Modelos disponibles marca: <?= $marcaNombre . "\n" ?></p>
            <ul style="border:1pt solid white">
                <?php
                $modelos = $client->ObtenerModelos($marcaBuscar);
                foreach ($modelos as $m) {
                    ?>
                    <img src="resources/<?=strtolower($marcaNombre)?>.png" alt="logo <?=$marcaNombre?> " width='100px' height='57px' />
                    <p style="background-color:blue"><?= $m ?></p>
                    <?php
                }
                ?>
            </ul>
        

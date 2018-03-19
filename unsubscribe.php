<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quitar subscripcion</title>
        <link rel="stylesheet" href="styles.css" type="text/css" media="all" />
    </head>


    <script type="text/javascript">
        function home()
        {
            window.location = "http://lugtucuman.usla.org.ar/";
        }
    </script>

    <body>


        <div class="wrap"> 
            <div class="pagehead nothome" onclick="home()"> 

                <h1>Linux User Group Tucumán</h1>

            </div>


            <div class="sidebar">
                <div class="linkhead"><h2>Información</h2></div>

                <ul>

                    <li>
                        <a 
                            href="https://listas.usla.org.ar/cgi-bin/mailman/listinfo/tucuman-lst">
                            Lista de correo</a>
                    </li>



                </ul>

                <div class="meeting"><div class="meetinghead">
                        <h2>Próxima Reunión</h2>
                    </div><div class="meetingtext">
                        <b></b> Sábado 24 de Marzo a la mañana en el CIIDEPT<br>(José Ingenieros 200 - SM)<br>
                        <b>El lunes 19 de Marzo se cierra la votación</b><br><br>
                        <a href="https://doodle.com/poll/6efnb28fe8zi3hhp">
                            Elegir horario
                        </a> <br><br>
                        <iframe width="175" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-65.19581079483034%2C-26.840288608749276%2C-65.19194841384889%2C-26.83829740660815&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=17/-26.83929/-65.19388">View Larger Map</a></small> 
                    </div></div>
            </div>
            <div>&nbsp;</div>
            <div class="content">
                <div class="apologies">
                </div>
                <?php
                $email = $_GET['email'];
                $confirm = $_GET['confirm'];
                if ($confirm == NULL) {
                    if ($email == NULL) {
                        echo '<div class="ermsg">error</div>';
                    } else {
                        echo '<a href="http://lugtucuman.usla.org.ar/unsubscribe.php?email=' . $email . '&confirm=si">Confirmar la Desuscripción</a><br>';
                    }
                } else {
                    if ($email == NULL) {
                        echo 'error';
                    } else {
                        $lineas = file("mails");
                        foreach ($lineas as $nLinea => $dato) {
                            $rep = TRUE;
                            $str = $dato;
                            for ($index = 0; $index < strlen($email) - 1; $index++) {

                                if ($str[$index] != $email[$index]) {
                                    $rep = FALSE;

                                    break;
                                }
                            }

                            if (!$rep) {
                                $info[] = $dato;
                            } else {
                                
                            }
                        }


                        trim($info[$nLinea - 1], "\n");

                        $documento = implode($info, '');
                        file_put_contents('mails', $documento);
                        echo '<div class="okmsg">Desuscripto correctamente</div>';
                        mail("soloanakin51@gmail.com", "Desubscripcion", "el mail " . $email . " se ha desubscripto a las noticias del LUG", "FROM: admin@lugtucuman.usla.org.ar");
                    }
                }
                ?>
            </div>

        </div>

    </body>
</html>

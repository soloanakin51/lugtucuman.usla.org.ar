<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subscribirse a las Noticias</title>
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
                $email = $_POST['email'];
                if ($email != NULL) {
                    $myfile = fopen("mails", "r") or die("Unable to open file!");

                    while (!feof($myfile)) {
                        $rep = TRUE;
                        $str = fgets($myfile);
                        for ($index = 0; $index < strlen($email) - 1; $index++) {                            
                            if ($str[$index] != $email[$index]) {
                                $rep = FALSE;
                                break;
                            }
                        }
                        if ($rep) {
                            break;
                        }
                    }
                    fclose($myfile);

                    if ($rep) {
                        echo '<div class="ermsg">El email ingresado ya se encuentra subscripto.<br></div>';
                    } else {
                        $myfile = fopen("mails", "a+") or die("Unable to open file!");
                        $ban = fwrite($myfile, "\n" . $email);
                        fclose($myfile);
                        if ($ban) {
                            echo '<div class="okmsg">se ha subscripto<br></div>';
                            mail("soloanakin51@gmail.com", "Subscripcion", "el mail " . $email . " se ha subscripto a las noticias del LUG", "FROM: admin@lugtucuman.usla.org.ar");
                            $additional_headers = 'MIME-Version: 1.0' . "\r\n";
                            $additional_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $additional_headers .= "From: noreply@lugtucuman.usla.org.ar" . "\r\n";
                            $message = '<!DOCTYPE html>
                            <!--
                            To change this license header, choose License Headers in Project Properties.
                            To change this template file, choose Tools | Templates
                            and open the template in the editor.
                            -->
                            <html>
                                <head>
                                    <title></title>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                </head>
                                <body>
                                    <div class="pagehead" style="width: 720px; height: 100px; background: url("http://lugtucuman.usla.org.ar/logo-LUG-tuc.png") 0 0 no-repeat; background-position:60px bottom; margin: 1.5em 0 1em 10px;"> 

                                        <h1>Linux User Group Tucuman</h1>

                                    </div>
                                    <div>Hola, usted ha decidido suscribirse a las noticias del LUG Tucumán.<br>
                                    Si no ha realizado esta acción y/o no desea recibir las noticias, por favor diríjase al siguiente enlace:
                                    <br><a href="http://lugtucuman.usla.org.ar/unsubscribe.php?email=' . $email . '">No me subscribí o cambié de opinión.</a><br><br>
                                    Si quiere ir a la página principal del LUG Tucumán haga click en el enlace de abajo:<br>'
                                    . '<a href="http://lugtucuman.usla.org.ar">Ir a la página del LUG Tucumán</a>'
                                . '</body>
                                </html>';
                            mail($email, "Usted se ha suscripto a las noticias del LUG Tucuman", $message, $additional_headers);
                        }
                    }
                } else {
                    if ($_GET['pr'] == NULL) {
                        echo '<div class="ermsg">Se necesita una dirección de mail válida<br></div>';
                    }
                }
                ?>
                <h2>
                    Subcribirse a las Noticias
                </h2>
                <p>
                    Se requiere ingresar su correo electrónico.
                </p>
                <form name="subs" method="post" action="subscribirse.php">
                    <input name="email" type="email" id="email">
                    <input name="ok" type="submit" value="Subscribirse" id="ok" >
                </form>




            </div>

        </div>

    </body>
</html>

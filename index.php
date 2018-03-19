
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>LUG Tucuman</title>
        <link rel="stylesheet" href="styles.css" type="text/css" media="all" />
    </head>

    <body>
        <div class="wrap"> 
            <div class="pagehead"> 

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

                <p>
                    Bienvenido a la página oficial de Linux User Group Tucumán. Si bien nuestro tema principal es GNU/Linux, le damos una gran importancia  
                    la filosofía del software libre.
                </p>

                <p>
                    Por lo general coordinamos reuniones todas las semanas, las cuales son abiertas a todo aquel que tenga interés en aprender, enseñar y/o 
                    participar. 
                </p>
                <p>
                    <b>
                        La página se encuentra actualmente en mantenimiento. Pronto estará completa.
                    </b>
                </p>
                <p>

                </p>
                <div class="news">
                    <div class="linkhead"><h2>Noticias</h2></div>
                    <p>
                        <?php
                        $myfile = fopen("news", "r") or die("Unable to open file!");
                        while (!feof($myfile)) {
                            echo "<b>" . fgets($myfile) . "</b>" . "<br>";
                            echo fgets($myfile) . "<br>";
                        }
                        fclose($myfile);
                        ?> 

                    </p>
                    <p>
                        <a href="subscribirse.php?pr=yes">Subscribirse a las Noticias del grupo</a>
                    </p>
                </div>

            </div>

        </div>
    </body>

</html>

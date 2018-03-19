<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enviar Noticias</title>
    </head>
    <body>

        <?php
        $myfile = fopen("news", "r") or die("Unable to open file!");
        if (!feof($myfile)) {
            $subject = fgets($myfile);
            $message = fgets($myfile);
        }
        fclose($myfile);
        $ban = FALSE;
        $myfile = fopen("lastnews", "r") or die("Unable to open file!");
        if (!feof($myfile)) {
            $str = fgets($myfile);
            if (count($str) < count($subject) | count($str) > count($subject)) {
                $ban = TRUE;              
            } else {
                
                for ($index = 0; $index < strlen($subject) - 1; $index++) {                    
                    if ($str[$index] != $subject[$index]) {
                        $ban = TRUE;                        
                        break;
                    }
                }
            }
        }
        fclose($myfile);
        $additional_headers = 'MIME-Version: 1.0' . "\r\n";
        $additional_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $additional_headers .= "From: noreply@lugtucuman.usla.org.ar" . "\r\n";
        if ($ban === TRUE) {
            $myfile = fopen("mails", "r") or die("Unable to open file!");
            while (!feof($myfile)) {
                $to = trim(fgets($myfile), "\n");
                $sent = mail($to, $subject, '<!DOCTYPE html>
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
                        <div>' . $message . '<br>'
                        . '<a href="http://lugtucuman.usla.org.ar/unsubscribe.php?email=' . $to . '">No quiero recibir más noticias</a><br><br>'
                        . '<a href="http://lugtucuman.usla.org.ar">Ir a la página del LUG Tucumán</a>'
                    . '</body>
                </html>', $additional_headers);
                if ($sent) {
                    echo "<b> Email has been successfully sent </b><br><br>";
                    echo "<b> Message : </b><br>$message";
                    $ban = TRUE;
                } else {
                    echo "Email could not be sent, there may be errors in the e-mail address";
                }
            }
            fclose($myfile);
            $myfile = fopen("lastnews", "w") or die("Unable to open file!");
            fwrite($myfile, $subject);
            fclose($myfile);
        } else {
            echo 'Noticia ya enviada<br>';
        }
        ?>
    </body>
</html>

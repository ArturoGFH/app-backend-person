<?php

include_once __DIR__ . '/mail/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

define("mail_server", "smtp.gmail.com");
define("mail_port", 465);

define("mail_user", "noreply.dapis@gmail.com");
define("mail_passord", "@Nila1224");
define("mail_from", "Clarios App");

function sendEmail($toName, $toEmail, $title = "Clarios App", $content = null, $CC = array(), $contentExtra = "") {
    $mail = new PHPMailer(true);

    if ($content == null) {
        //$content = file_get_contents(__DIR__ . '/mail_template/clariosDiesel.php');
        //$c = curl_init(__DIR__ . "/mail_template/clariosDiesel.php?data=$contentExtra");
//        $c = curl_init("https:// /clarios/sdk-test/core/mail_template/clariosDiesel.php?data=$contentExtra");
//        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//
//        $content = curl_exec($c);
//
//        if (curl_error($c))
//            die(curl_error($c));
//
//        curl_close($c);
//
//        print_r($content);

        $content = getDiesel($contentExtra);
    }

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();

        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
        $mail->Host = mail_server;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->SMTPKeepAlive = true;

        $mail->Username = mail_user;
        $mail->Password = mail_passord;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = mail_port;

        $mail->setFrom(mail_user, mail_from);


        $mail->addAddress($toEmail, $toName);
        foreach ($CC as $value) {
            $mail->addCC($value);
        }

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Subject = $title;
        $mail->Body = $content;

        $mail->send();
        //echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

function getDiesel($extra) {
    return '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0;">
                <meta name="format-detection" content="telephone=no"/>


                <style>
                    /* Reset styles */ 
                    body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                    body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                    img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                    #outlook a { padding: 0; }
                    .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

                    /* Rounded corners for advanced mail clients only */ 
                    @media all and (min-width: 560px) {
                        .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                    }

                    /* Set color for auto links (addresses, dates, etc.) */ 
                    a, a:hover {
                        color: #FFFFFF;
                    }
                    .footer a, .footer a:hover {
                        color: #828999;
                    }

                </style>

                <!-- MESSAGE SUBJECT -->
                <title></title>

                </head>

                <!-- BODY -->
                <!-- Set message background color (twice) and text color (twice) -->
                <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; background-color: #FFFFFF; color: #000000;">

                    <!-- SECTION / BACKGROUND -->
                    <!-- Set message background color one again -->
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                                                                                                                                                                                                        >

                                <!-- WRAPPER -->
                                <!-- Set wrapper width (twice) -->
                                <table border="0" cellpadding="0" cellspacing="0" align="center"
                                       width="800" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                                       max-width: 500px;" class="wrapper">

                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 20px;
                                            padding-bottom: 20px;">

                                            <img border="0" vspace="0" hspace="0" crossorigin="anonymous"
                                                 src="https://yoenvio.synology.me/clarios/sdk-test/core/img/logo clarios 2.png"
                                                 width="350" height="80"
                                                 alt="Logo" title="Logo"/>

                                        </td>
                                    </tr>

                                    <!-- SUPHEADER -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                            padding-top: 27px;
                                            padding-bottom: 0;

                                            font-family: sans-serif;" class="supheader">
                                            <h1>CLARIOS APP</h1>
                                        </td>
                                    </tr>

                                    <!-- HEADER -->
                                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                            padding-top: 5px;
                                            font-family: sans-serif;" class="header">
                                            Ocurrio un problema con un ticket de DIÉSEL
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; line-height: 130%;
                                            padding-top: 5px;
                                            font-family: sans-serif;" class="header">
                                            ' . $extra . '
                                        </td>
                                    </tr>

                                    <!-- LINE -->
                                    <!-- Set line color --> 
                                    <tr>
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                            padding-top: 30px;" class="line"><hr
                                                color="#565F73" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
                                        </td>
                                    </tr>

                                  

                                    <!-- End of WRAPPER -->
                                </table>

                                <!-- End of SECTION / BACKGROUND -->
                            </td></tr>
                    </table>

                </body>
                </html>';
}

function getToolsMail($id) { 
    return '<html lang="es"> 
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" /> 
        <meta name="author" content="DAPIS" />
        <title>Clarios registro de herramient</title>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="../src/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
        <link href="https://clarios.dapis.mx/core/src/css/styles2.css" rel="stylesheet" />
    </head>

    <body class="bg-white white">
        <div id="layoutSidenav"> 
            <div class="white">
                <main>
                    <div class="container-fluid mt-5 white">
                        <div class="row">

                            <img src="https://clarios.dapis.mx/core/icons/sp%20copia%20-%20copia@2x.png" class="img-fluid ml-auto mr-auto">

                            <h2 class="col-12 pl-5 pr-5 text-center text-black mt-5 " style="font-size: 45px;">Registro de herramienta</h2>
                            <h2 class="col-12 pl-5 pr-5 text-center text-black mt-5" style="font-size: 45px;">Presenta el código QR generado al oficial </h2>
                            

                            <div class="col-12 text-center mt-5">
                                <img src="https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=500x500&chl=' . $id . '">
                            </div>

                            <div class="col-12 mt-5 text-right fixed-bottom gone-important">
                                <img class=" float-right" style="width: 300px;" src="../src/visit_ct.png">
                            </div>

                        </div>
                    </div>
                </main>

            </div>
        </div>

    </body>

</html>';
}

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 * 
 */

$r = array_merge($_GET, $_POST);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                                       width="500" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
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
                                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                            padding-top: 5px;
                                            font-family: sans-serif;" class="header">
                                            <?php echo $r["data"]; ?>
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
                </html>
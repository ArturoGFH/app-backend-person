<?php

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
    ));

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'mail.yoenvio.com.mx';
    $mail->SMTPAuth = true;
    $mail->Username = 'develop@yoenvio.com.mx';
    $mail->Password = '@Develop001';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('develop@yoenvio.com', 'Yoenvío');
    $mail->addAddress('nila.cadenas@isisolutions.com.mx');     // Add a recipient
    $mail->addAddress('anthony.nila@hotmail.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Yoenvío';
    $mail->Body = '<td style="padding:0;margin:0;background-color:#f2f2f4;padding-left:15px;padding-right:15px" align="center" class="m_251081034198853198wrapperside">
                <table class="m_251081034198853198container" width="100%" cellpadding="0" cellspacing="0" style="max-width:700px">
                  <tbody><tr>
                    <td style="text-align:center;vertical-align:top;font-size:0;padding-top:25px;padding-bottom:25px" class="m_251081034198853198logo">
                      <img src="http://192.168.100.40/api/yoenvio.png" style="height:125px;height:52px;font-family:Helvetica,Arial,sans-serif;color:#000000;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Regular",Arial,sans-serif;font-size:30px;font-weight:bold" alt="Yoenvío" width="205" height="50" class="CToWUd">
                    </td>
                  </tr>
                </tbody></table>
                <table class="m_251081034198853198container" width="100%" cellpadding="0" cellspacing="0" style="max-width:700px">
                  <tbody>
                    <tr>
                      <td style="padding:0px 0px;margin:0px">
                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                          <tbody>
                            <tr>
                              <td style="padding-top:10px;margin:0px;background-color:#1fbad6">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                  <tbody>
                                    <tr>
                                      <td style="padding:0;margin:0px;background-color:#000000" align="center">
                                              <table class="m_251081034198853198container" width="100%" cellpadding="0" cellspacing="0" style="max-width:700px">
                                                <tbody><tr>
                                                  <td style="text-align:center;vertical-align:top;font-size:0;padding-right:25px" align="center" class="m_251081034198853198no-right">
                                                    
                                                          <div style="width:350px;display:inline-block;vertical-align:top" class="m_251081034198853198hundred">
                                                            <table width="30px" border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" class="m_251081034198853198hide" align="left">
                                                              <tbody><tr>
                                                                <td style="padding:110px 0px">&nbsp;
                                                                </td>
                                                              </tr>
                                                            </tbody></table>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:80%;margin:0 auto" align="center">
                                                              <tbody><tr>
                                                                <td style="padding-top:60px;margin:0;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Regular",Arial,sans-serif;font-size:34px;line-height:44px;color:#ffffff" align="left" class="m_251081034198853198headline">Gracias por registrarte en <span class="il">Yoenvío</span></td>
                                                              </tr>
                                                              <tr>
                                                                <td style="padding-top:20px;padding-bottom:23px;margin:0;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Regular",Arial,sans-serif;font-size:16px;line-height:22px;color:#ffffff" align="left"><span class="il">Yoenvío</span> es una app que te conecta con envíos rapidos, seguros, confiables y economicos cuando y donde lo necesites.<br><br>
                                                                  Un evío es tan fácil como 1-2-3.
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td style="padding:0;margin:0">
                                                                  <table border="0" cellspacing="0" cellpadding="0" class="m_251081034198853198responsive-table">
                                                                    <tbody>
                                                                      <tr>
                                                                        <td align="center" bgcolor="#000000" class="m_251081034198853198no-pad">&nbsp;</td>
                                                                      </tr>
                                                                    </tbody>
                                                                  </table>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td style="padding-top:20px;margin:0" align="left">
                                                                  
                                                                    <a href="http://www.yoenvio.com.mx" target="_blank">
                                                                    </a>
                                                                  <u></u>
                                                                </td>
                                                              </tr>
                                                            </tbody></table>
                                                          </div>
                                                          
                                                          <div style="width:320px;display:inline-block;vertical-align:top" class="m_251081034198853198hide">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:85%;margin:0 auto">
                                                              <tbody><tr>
                                                                <td style="padding-top:50px;margin:0" align="center">&nbsp;</td>
                                                              </tr>
                                                            </tbody></table>
                                                          </div>
                                                          
                                                  </td>
                                                </tr>
                                              </tbody></table>
                                              
                                        
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="m_251081034198853198container" width="100%" cellpadding="0" cellspacing="0" style="max-width:700px">
                  <tbody>
                    <tr>
                      <td style="padding:0px 0px 15px;margin:0px">
                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                          <tbody>
                            <tr>
                              <td style="padding:1px;margin:0px;background-color:#e6e6e9">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                  <tbody>
                                    <tr> </tr>
                                  </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                  <tbody><tr>
                                    <td style="padding-top:1px;background-color:#e6e6e9;margin:0" align="center">
                                      <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                        <tbody><tr>
                                          <td style="padding:32px 20px;margin:0;background-color:#fafafa;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Regular",Arial,sans-serif;font-size:18px;line-height:25px;color:#000000" align="center">
                                           ¿Tienes preguntas? Visita nuestra <a href="http://www.yoenvio.com.mx" style="color:#1fbad6;text-decoration:none" target="_blank" >página de ayuda</a> para obtener más información.

                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </td>
                                  </tr>
                                </tbody></table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                
                
                <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                  <tbody>
                    <tr> </tr>
                  </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" style="width:90%;max-width:700px" class="m_251081034198853198container">
                  <tbody>
                    <tr> </tr>
                </tbody></table>
                
                
        </td>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

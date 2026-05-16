<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PostulationController extends Controller {
    
    // Método para cargar la vista de postulación
    public function index() {
        $this->view('site/contact/postulation', ['title' => 'Postulación'], 'public');
    }

    // Método para procesar el formulario enviado vía Fetch (AJAX)
    // Nota: Asegúrate de que en tu JS la ruta coincida con este controlador (ej. ?url=postulation/processForm)
    public function processForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Limpieza de datos (Adaptado a los campos del formulario de postulación)
            $nombre  = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No especificado';
            $dni     = isset($_POST['dni']) ? htmlspecialchars($_POST['dni']) : 'No especificado';
            $correo   = isset($_POST['correo']) ? filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL) : 'No especificado';
            $teléfono = isset($_POST['teléfono']) ? htmlspecialchars($_POST['teléfono']) : 'No especificado';

            $mail = new PHPMailer(true);

            try {
                // ==========================================
                // 1. CONFIGURACIÓN DEL SERVIDOR SMTP
                // ==========================================
                $mail->isSMTP();                                            
                $mail->Host       = $_ENV['SMTP_HOST'];                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = $_ENV['SMTP_USER'];                     
                $mail->Password   = $_ENV['SMTP_PASS'];                     
                
                $mail->SMTPSecure = ($_ENV['SMTP_PORT'] == 465) ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;            
                $mail->Port       = $_ENV['SMTP_PORT'];                     
                
                // Desactivar verificación estricta de SSL en entorno local
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->CharSet = 'UTF-8';

                // ==========================================
                // 2. DESTINATARIOS
                // ==========================================
                $mail->setFrom($_ENV['SMTP_USER'], 'FireHub - Nuevo Milenio B-155');       
                
                // Correo de destino para postulaciones (Puede ser el mismo o uno de RRHH)
                $mail->addAddress($_ENV['MAIL_CONTACTO'], 'Reclutamiento B-155');
                
                $mail->addReplyTo($correo, $nombre);                         

                // ==========================================
                // 3. CONTENIDO DEL CORREO
                // ==========================================
                $mail->isHTML(true);                                        
                $mail->Subject = "NUEVA POSTULACIÓN: " . $nombre;
                
                // Aseguramos que la URL base esté disponible para el Logo
                $baseUrl = defined('BASE_URL') ? BASE_URL : 'https://tu-dominio.com/';

                $mail->Body = "
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset='UTF-8'>
                    <title>Nueva Postulación Web</title>
                </head>
                <body style='margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;'>
                    <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' style='background-color: #f8fafc; padding: 40px 20px;'>
                        <tr>
                            <td align='center'>
                                <table role='presentation' width='600' cellspacing='0' cellpadding='0' border='0' style='background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05);'>
                                    
                                    <tr>
                                        <td style='background-color: #0f172a; padding: 35px 30px; text-align: center; border-bottom: 4px solid #b91c1c;'>
                                            <h1 style='color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 2px;'>COMPAÑÍA DE BOMBEROS 155</h1>
                                            <p style='color: #94a3b8; margin: 15px 0 0 0; font-size: 14px; font-weight: 500;'>Nueva solicitud de postulación desde el portal web</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='padding: 40px;'>
                                            
                                            <h2 style='color: #0f172a; font-size: 18px; font-weight: 800; margin-top: 0; margin-bottom: 20px;'>Datos del Postulante</h2>
                                            
                                            <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' style='color: #475569; font-size: 15px; line-height: 1.6;'>
                                                <tr>
                                                    <td width='30%' style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'><strong>Nombre:</strong></td>
                                                    <td width='70%' style='padding: 12px 0; border-bottom: 1px solid #e2e8f0; color: #0f172a;'>{$nombre}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'><strong>DNI:</strong></td>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0; color: #0f172a;'>{$dni}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'><strong>Teléfono:</strong></td>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'>
                                                        <a href='tel:{$teléfono}' style='color: #0f172a; text-decoration: none; font-weight: 600;'>{$teléfono}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'><strong>Email:</strong></td>
                                                    <td style='padding: 12px 0; border-bottom: 1px solid #e2e8f0;'>
                                                        <a href='mailto:{$correo}' style='color: #0f172a; text-decoration: none; font-weight: 600;'>{$correo}</a>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            <div style='margin-top: 30px; background-color: #fef2f2; border-left: 4px solid #ef4444; padding: 15px 20px; border-radius: 0 8px 8px 0; color: #7f1d1d; font-size: 14px;'>
                                                <strong>Atención:</strong> El postulante ha aceptado las políticas de privacidad y términos de uso al enviar este formulario.
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='background-color: #f1f5f9; padding: 25px; text-align: center; color: #64748b; font-size: 13px; line-height: 1.5; border-top: 1px solid #e2e8f0;'>
                                            Este es un mensaje automático generado de forma segura desde la plataforma <strong>FireHub</strong>.<br>
                                            Puedes responder directamente a este correo para comunicarte con el postulante.
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                $mail->AltBody = "Nueva Postulación Web\nNombre: {$nombre}\nDNI: {$dni}\nEmail: {$correo}\nTeléfono: {$teléfono}";

                header('Content-Type: application/json');

                $mail->send();
                
                http_response_code(200);
                echo json_encode([
                    "status" => "success", 
                    "message" => "Tu postulación ha sido enviada correctamente."
                ]);

            } catch (Exception $e) {
                header('Content-Type: application/json');
                http_response_code(500); 
                echo json_encode([
                    "status" => "error", 
                    "message" => "Error al enviar la postulación: {$mail->ErrorInfo}"
                ]);
            }
        } else {
            http_response_code(405); 
            echo json_encode([
                "status" => "error", 
                "message" => "Método HTTP no permitido"
            ]);
        }
    }
}
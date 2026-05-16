<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller {
    
    // Método para cargar la vista del formulario
    public function index() {
        $this->view('site/contact/contact', ['title' => 'Contacto'], 'public');
    }

    // Método para procesar el formulario enviado vía Fetch (AJAX)
    public function processForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Limpieza de datos
            $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No especificado';
            $correo = isset($_POST['correo']) ? filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL) : 'No especificado';
            $teléfono = isset($_POST['teléfono']) ? htmlspecialchars($_POST['teléfono']) : 'No especificado';
            $mensaje_usuario = isset($_POST['mensaje']) ? htmlspecialchars($_POST['mensaje']) : 'Sin mensaje';

            $mail = new PHPMailer(true);

            try {
                // ==========================================
                // 1. CONFIGURACIÓN DEL SERVIDOR SMTP (Variables de Entorno)
                // ==========================================
                $mail->isSMTP();                                            
                $mail->Host       = $_ENV['SMTP_HOST'];                     // Host desde .env
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = $_ENV['SMTP_USER'];                     // Usuario desde .env
                $mail->Password   = $_ENV['SMTP_PASS'];                     // Contraseña desde .env
                
                // Determinamos el tipo de encriptación según el puerto
                $mail->SMTPSecure = ($_ENV['SMTP_PORT'] == 465) ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;            
                $mail->Port       = $_ENV['SMTP_PORT'];                     // Puerto desde .env
                
                $mail->CharSet = 'UTF-8';

                // ==========================================
                // 2. DESTINATARIOS
                // ==========================================
                $mail->setFrom($_ENV['SMTP_USER'], 'FireHub - Bomberos 155');       
                
                // Correo de destino principal desde el .env
                $mail->addAddress($_ENV['MAIL_CONTACTO'], 'Mesa de Partes');
                
                $mail->addReplyTo($correo, $nombre);                         

                // ==========================================
                // 3. CONTENIDO DEL CORREO
                // ==========================================
                $mail->isHTML(true);                                        
                $mail->Subject = "NUEVO MENSAJE WEB: " . $nombre;
                
                $mail->Body = "
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset='UTF-8'>
                    <title>Nuevo Contacto Web</title>
                </head>
                <body style='margin: 0; padding: 0; background-color: #f4f7f6; font-family: Helvetica, Arial, sans-serif;'>
                    <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' style='background-color: #f4f7f6; padding: 40px 20px;'>
                        <tr>
                            <td align='center'>
                                <table role='presentation' width='600' cellspacing='0' cellpadding='0' border='0' style='background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);'>
                                    
                                    <tr>
                                        <td style='background-color: #1a1a1a; padding: 30px; text-align: center; border-bottom: 4px solid #b91c1c;'>
                                            <h1 style='color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 2px;'>COMPAÑÍA DE BOMBEROS 155</h1>
                                            <p style='color: #94a3b8; margin: 8px 0 0 0; font-size: 14px;'>Nuevo requerimiento desde el portal web</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='padding: 30px 40px;'>
                                            
                                            <h2 style='color: #b91c1c; font-size: 18px; margin-top: 0; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px;'>Datos del Solicitante</h2>
                                            
                                            <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' style='color: #334155; font-size: 15px; line-height: 1.6;'>
                                                <tr>
                                                    <td width='30%' style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Nombre:</strong></td>
                                                    <td width='70%' style='padding: 8px 0; border-bottom: 1px solid #f0f4f8; color: #0f172a;'>{$nombre}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Email:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'>
                                                        <a href='mailto:{$correo}' style='color: #0f172a; text-decoration: none; font-weight: 600;'>{$correo}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Teléfono:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'>
                                                        <a href='tel:{$teléfono}' style='color: #0f172a; text-decoration: none; font-weight: 600;'>{$teléfono}</a>
                                                    </td>
                                                </tr>
                                            </table>

                                            <h2 style='color: #b91c1c; font-size: 18px; margin-top: 30px; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px;'>Mensaje / Requerimiento</h2>
                                            
                                            <div style='background-color: #f8fafc; border-left: 4px solid #b91c1c; padding: 15px 20px; border-radius: 0 4px 4px 0; color: #475569; font-style: italic; line-height: 1.6;'>
                                                " . nl2br($mensaje_usuario) . "
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='background-color: #f1f5f9; padding: 20px; text-align: center; color: #64748b; font-size: 12px; line-height: 1.5;'>
                                            Este es un mensaje automático generado desde el portal <strong>FireHub</strong>.<br>
                                            Puedes responder directamente a este correo para comunicarte con el ciudadano/institución.
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                $mail->AltBody = "Nuevo Contacto Web\nNombre: {$nombre}\nEmail: {$correo}\nTeléfono: {$teléfono}\nMensaje: {$mensaje_usuario}";

                header('Content-Type: application/json');

                $mail->send();
                
                http_response_code(200);
                echo json_encode([
                    "status" => "success", 
                    "message" => "El mensaje ha sido enviado correctamente a nuestra base."
                ]);

            } catch (Exception $e) {
                header('Content-Type: application/json');
                http_response_code(500); 
                echo json_encode([
                    "status" => "error", 
                    "message" => "Error al enviar correo: {$mail->ErrorInfo}"
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
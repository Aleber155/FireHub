<?php
// 1. Requerir los archivos físicos de PHPMailer manualmente
require_once 'app/libs/PHPMailer/Exception.php';
require_once 'app/libs/PHPMailer/PHPMailer.php';
require_once 'app/libs/PHPMailer/SMTP.php';

// 2. Importar las clases al espacio de trabajo actual
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController {
    
    // Método para cargar la vista del formulario
    public function index() {
        $title = "Contacto";
        require_once "app/views/layouts/header.php";
        require_once "app/views/contact/contact.php";
        require_once "app/views/layouts/footer.php";
    }

    // Método para procesar el formulario enviado vía Fetch (AJAX)
    public function processForm() {
        // Verificar si es una petición POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Recibir y limpiar los datos del formulario (Seguridad básica)
            $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No especificado';
            $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : 'No especificado';
            $celular = isset($_POST['celular']) ? htmlspecialchars($_POST['celular']) : 'No especificado';
            $empresa = isset($_POST['empresa']) ? htmlspecialchars($_POST['empresa']) : 'No especificada';
            $ruc = isset($_POST['ruc']) ? htmlspecialchars($_POST['ruc']) : 'No especificado';
            $mensaje_usuario = isset($_POST['mensaje']) ? htmlspecialchars($_POST['mensaje']) : 'Sin mensaje';

            // Instanciamos PHPMailer (pasando 'true' habilitamos las excepciones para detectar errores)
            $mail = new PHPMailer(true);

            try {
                // ==========================================
                // 1. CONFIGURACIÓN DEL SERVIDOR SMTP
                // ==========================================
                $mail->isSMTP();                                            
                $mail->Host       = 'mail.sanemog.com';                     // Reemplaza con el Host SMTP de tu servidor
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'noreply@sanemog.com';                  // Tu correo de envío real
                $mail->Password   = '@qD-{XapZ1-p';                         // Reemplaza con la contraseña real del correo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Encriptación segura (usa ENCRYPTION_STARTTLS si el puerto es 587)
                $mail->Port       = 465;                                    
                
                $mail->CharSet = 'UTF-8';

                // ==========================================
                // 2. DESTINATARIOS
                // ==========================================
                $mail->setFrom('noreply@sanemog.com', 'SANEMOG Web');       
                
                // Los 3 directivos de la empresa
                $mail->addAddress('jsantamaria@sanemog.com', 'J. Santamaría');
                $mail->addAddress('emontoya@sanemog.com', 'E. Montoya');
                $mail->addAddress('cmogollon@sanemog.com', 'C. Mogollón');
                
                // Si le dan "Responder", responderán al cliente
                $mail->addReplyTo($email, $nombre);                         

                // ==========================================
                // 3. CONTENIDO DEL CORREO (Diseño Profesional)
                // ==========================================
                $mail->isHTML(true);                                        
                $mail->Subject = "Nuevo Requerimiento Web: " . $empresa;
                
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
                                        <td style='background-color: #111D2D; padding: 30px; text-align: center;'>
                                            <h1 style='color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 1px;'>SANEMOG</h1>
                                            <p style='color: #8ba1b5; margin: 8px 0 0 0; font-size: 14px;'>Nuevo requerimiento de contacto web</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='padding: 30px 40px;'>
                                            
                                            <h2 style='color: #0f66bd; font-size: 18px; margin-top: 0; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px;'>Datos del Solicitante</h2>
                                            
                                            <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' style='color: #334155; font-size: 15px; line-height: 1.6;'>
                                                <tr>
                                                    <td width='30%' style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Empresa:</strong></td>
                                                    <td width='70%' style='padding: 8px 0; border-bottom: 1px solid #f0f4f8; color: #0f172a;'>{$empresa}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>RUC / DNI:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8; color: #0f172a;'>{$ruc}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Nombre:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8; color: #0f172a;'>{$nombre}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Celular:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8; color: #0f172a;'>{$celular}</td>
                                                </tr>
                                                <tr>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'><strong>Email:</strong></td>
                                                    <td style='padding: 8px 0; border-bottom: 1px solid #f0f4f8;'>
                                                        <a href='mailto:{$email}' style='color: #0f66bd; text-decoration: none; font-weight: bold;'>{$email}</a>
                                                    </td>
                                                </tr>
                                            </table>

                                            <h2 style='color: #0f66bd; font-size: 18px; margin-top: 30px; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px;'>Mensaje / Requerimiento</h2>
                                            
                                            <div style='background-color: #f8fafc; border-left: 4px solid #0f66bd; padding: 15px 20px; border-radius: 0 4px 4px 0; color: #475569; font-style: italic; line-height: 1.6;'>
                                                " . nl2br($mensaje_usuario) . "
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td style='background-color: #f1f5f9; padding: 20px; text-align: center; color: #64748b; font-size: 12px; line-height: 1.5;'>
                                            Este es un mensaje automático generado desde el portal web de <strong>SANEMOG</strong>.<br>
                                            Puedes responder directamente a este correo para comunicarte con el cliente.
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                $mail->AltBody = "Nuevo Contacto Web\nNombre: {$nombre}\nEmail: {$email}\nCelular: {$celular}\nEmpresa: {$empresa}\nRUC/DNI: {$ruc}\nMensaje: {$mensaje_usuario}";

                header('Content-Type: application/json');

                // Enviar el correo
                $mail->send();
                
                http_response_code(200);
                echo json_encode([
                    "status" => "success", 
                    "message" => "Correo enviado correctamente a los 3 destinatarios"
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
                "message" => "Método no permitido"
            ]);
        }
    }
}
?>
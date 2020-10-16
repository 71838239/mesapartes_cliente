<?php namespace Controladores;
use Controladores\PHPMailer as PHPMailer;
use Controladores\Exception;

use Modelo\solicitudModelo as Solicitud;
use Modelo\solicitanteModelo as Solicitante;
use Modelo\notarioModelo as Notario;
use Modelo\usuarioModelo as Usuario;
	
class registroControlador{

	private $solicitud;
	private $solicitante;
	private $notario;
	private $usuario;
	private $mail;
	
	
	public function __construct(){
		$this->solicitud = new Solicitud();
		$this->solicitante = new Solicitante();
		$this->notario = new Notario();
		$this->usuario = new Usuario();
		$this->mail = new PHPMailer(true);
		
	}

	public function index()	{
		
		if ($_POST) {
			$_SESSION['reg_solicitante'] = $_POST['dni'];

			$this->solicitante->set("DNI",$_POST['dni']);
			$this->solicitante->set("apellidoPaterno",$_POST['apaterno']);
			$this->solicitante->set("apellidoMaterno",$_POST['amaterno']);
			$this->solicitante->set("nombres",$_POST['nombres']);
			$this->solicitante->set("telefono",$_POST['telefono']);
			$this->solicitante->set("email",$_POST['email']);
			$this->solicitante->add();

			$this->solicitud->set("otorgadoX",$_POST['otorgadox']);
			$this->solicitud->set("aFavor",$_POST['afavor']);
			//$this->solicitud->set("fechaDoc",$_POST['fecha']);
			$this->solicitud->set("Notarios_RUC",$_POST['Notarios_RUC']);
			$this->solicitud->set("Solicitantes_DNI",$_POST['dni']);
			$userDNI = $this->usuario->ver_user_ac();
			$this->solicitud->set("Usuarios_DNI",$userDNI['DNI']);
			$this->solicitud->add();

			//ENVIAR EMAIL
			try {
		    //Server settings
				$this->solicitud->set("Solicitantes_DNI",$_POST['dni']);
				$row = $this->solicitud->view_by_dni_sol();

			    $this->mail->SMTPDebug = 0;                      			// Enable verbose debug output
			    $this->mail->isSMTP();                                      // Send using SMTP
			    $this->mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
			    $this->mail->SMTPAuth   = true;                             // Enable SMTP authentication
			    $this->mail->Username   = 'cloudtecsystem@gmail.com';       // SMTP username
			    $this->mail->Password   = '7MTV7maick8';                    // SMTP password
			    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $this->mail->Port       = 587;                             	// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $this->mail->setFrom('cloudtecsystem@gmail.com', 'Mesa de Partes GRJ');
			    $this->mail->addAddress($_POST['email']);     				// Add a recipient
			    
			    // Content
			    $this->mail->isHTML(true);                                  // Set email format to HTML
			    $this->mail->Subject = 'Codigo de ingreso';
			    $this->mail->Body    = 'Bienvenido Mesa de Partes Virtual este es tu número de solicitud <b>'.$row['idSolicitud'].'</b> y código de acceso <b>'.$row['codAcceso'].'</b>';
			    
			    $this->mail->send();
			    //echo 'Mensaje enviado correctamente';
			} catch (Exception $e) {
			    echo "No se pudo enviar el mensaje. Mailer Error: {$this->mail->ErrorInfo}";
			}

			header ("Location: ".URL."Registro/resumen");		

		} else {
			$datos = $this->notario->listar();
			return $datos;
		}
	}

	public function resumen() {
		$dni_solicitante = $_SESSION['reg_solicitante'];
		$this->solicitud->set("Solicitantes_DNI",$dni_solicitante);
		$datos = $this->solicitud->view_by_dni_sol();
		return $datos;
	}
}
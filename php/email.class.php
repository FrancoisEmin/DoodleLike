<?php
include_once('class.phpmailer.php');
include_once('class.smtp.php');
/**
 * Envoi des email pour LE Solution
 * USE PHP mail and googale mail account to send
 * 
 * Live.Event.Solution@gmail.com / LE#Solut10N
 */
class email {

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     *
     * @var PHP 
     * @access public
     */
    private $mail = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    public function __construct() {
        //Create a new PHPMailer instance
        $this->mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $this->mail->IsSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $this->mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 25;
        //Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = 'silhris@gmail.com';
        //Password to use for SMTP authentication
        $this->mail->Password = 'naruto1992';
        //Set who the message is to be sent from
        $this->mail->SetFrom('no-reply@jsevents.com', 'A.F.T.A');
        //Set an alternative reply-to address
        $this->mail->AddReplyTo('no-reply@jsevents.com', 'A.F.T.A');
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new email();
        }

        return self::$_instance;
    }

    /**
     * Envoie un email de test
     * @param string $name destinataire
     */
    public function test($to) {
        //Set who the message is to be sent to
        $this->mail->AddAddress($to);
        //Set the subject line
        $this->mail->Subject = 'PHPMailer GMail SMTP test';
        //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
        $this->mail->MsgHTML('<h2>Hello World</h2>');

        //Replace the plain text body with one created manually
        //$this->mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        //$this->mail->AddAttachment('images/phpmailer_mini.gif');
        //Send the message, check for errors
        if (!$this->mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
    
    /**
     * Overloading to set value to PHP MAILER
     * @param type $name
     * @param type $value
     */
    public function __set($name,$value) {
       
        switch ($name) {
            case 'to':
                $this->mail->AddAddress($value);
                break;
            case 'subject':
                $this->mail->Subject = $value;
                break;
            case 'body':
                $this->mail->MsgHTML($value);
                break;

            default:
                break;
        }
    }
    
    public function send() {
        
        //For Developpement
        //return false;
        try {
            if (!$this->mail->Send()) {
                echo "Mailer Error: " . $this->mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        } catch (Exception $e) {
            print_r($e);
        }
        
    }
    
    //Send mail when a user is created on an account
    public static function userAdded($oUser) {
        //TODO
    }

}
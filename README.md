JVMail - JV Mail
================
Create By: Jaime Marcelo Valasek

Use this module to send emails from your website.

Futures video lessons can be developed and published on the website or Youtube channel http://www.zf2.com.br/tutoriais http://www.youtube.com/zf2tutoriais

Installation
-----
Download this module into your vendor folder.

After done the above steps, open the file config / application.config.php. And add the module with the name JVMail.


Using the JVMail
-----

 - Add and configure the code below into the file that is module.config.php
 - Authentication Options 'transportSsl' and type of connection between ssl and tls

```php
'JVMail' => array(
    'transport' => array(
        'smtpOptions' => array(
            'host' => 'smtp.domain.com',
            'port' => 587,
            'connection_class' => 'plain',
            'connection_config' => array(
                'username' => 'user@domain.com',
                'password' => 'password',
                'from' => 'anyemail@domain.com'
            ),
        ),
        'transportSsl' => array(
            'use_ssl' => false,
            'connection_type' => 'tls' // ssl, tls
        ),
    ),
    'options' => array(
        'type' => 'text/html',
        'html_encoding' => \Zend\Mime\Mime::ENCODING_8BIT,
        'message_encoding' => 'UTF8'
    )
),
```
    
how to use
-----

 - You need to create the html template within the module that sends the email, exemplo:
 
application/view/mailtemplates/teste.phhtml

 - You can insert variables into the view template using the setData code sending email below, for example:
 
 $mail = new Mail($this->getServiceLocator()->get('servicemanager'));
 $mail->setData(array('nome' => 'Jaime Marcelo Valasek', 'email' => 'jaime.valasek@gmail.com'))
 
 - html the template
 
 ```html
 Teste de envio de email pelo Modulo JVMail.

 Nome: <?php echo $this->nome?> <br>
 Email: <?php echo $this->email?>
 ```
 - Full PHP code to instantiate the class mail and send the mail.
 
```php
use JVMail\Service\Mail;

$mail = new Mail($this->getServiceLocator()->get('servicemanager'));
$mail->setSubject('Teste de envio de email pelo modulo JVMail')
    ->setTo('recipientemail@domain.com')
    ->setData(array('nome' => 'Jaime Marcelo Valasek', 'email' => 'jaime.valasek@gmail.com'))
    ->setViewTemplate('teste')
    ->send();
```
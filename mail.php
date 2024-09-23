<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "mail_send/vendor/autoload.php";

if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $class=$_POST['select_class'];
    $batch=$_POST['option'];

             //Your authentication key
$authKey = "e58ccc165ad1931bb5c953f4c56e5f23";
//Multiple mobiles numbers separated by comma
$mobileNumber = '91'.$mobile;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "TXTIND";
//Your message to send, Add URL encoding here.
$message ='Thank you for contacting Timegenix. Your demo class schedule will be shared with you soon. We will reach out to you over call or mail within 24hrs.';
//Define route 
$route = "B";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);
//API URL
$url = "http://sms.bulksmsserviceproviders.com/api/send_http.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
 $output = curl_exec($ch);

//Print error if any
if (curl_errno($ch)) {
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
//////////////////////////////////////////////////// send mail to student


$mail = new PHPMailer;
//Enable SMTP debugging.
// $mail->SMTPDebug = 3;                           
//Set PHPMailer to use SMTP.
$mail->isSMTP();        
//Set SMTP host name                      
$mail->Host = "mail.timegenix.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                      
//Provide username and password
$mail->Username = "support@timegenix.com";             
$mail->Password = "Support@11#22";                       
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                       
//Set TCP port to connect to
$mail->Port = 587;                    
$mail->From = "support@timegenix.com";
$mail->FromName = "Timegenix";
$mail->addAddress($email, "Timegenix");
$mail->isHTML(true);
$mail->Subject = "Timegenix";

$mail->Body ='<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
   
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                               
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 12px; padding-top: 10px;">
                                        <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Thank you for contacting Timegenix. Your demo class schedule will be shared with you soon. We will reach out to you over call or mail within 24hrs.</p>
                                    </td>
                                </tr>
                               
                            </table>
                        </td>
                    </tr>
                   
                  
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';
if(!$mail->send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "success";
}


// $send_message='<!DOCTYPE html>
// <html>

// <head>
//     <title></title>
//     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//     <meta name="viewport" content="width=device-width, initial-scale=1">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
//     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
//     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
//     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
//     <style type="text/css">
//         body,
//         table,
//         td,
//         a {
//             -webkit-text-size-adjust: 100%;
//             -ms-text-size-adjust: 100%;
//         }

//         table,
//         td {
//             mso-table-lspace: 0pt;
//             mso-table-rspace: 0pt;
//         }

//         img {
//             -ms-interpolation-mode: bicubic;
//         }

//         img {
//             border: 0;
//             height: auto;
//             line-height: 100%;
//             outline: none;
//             text-decoration: none;
//         }

//         table {
//             border-collapse: collapse !important;
//         }

//         body {
//             height: 100% !important;
//             margin: 0 !important;
//             padding: 0 !important;
//             width: 100% !important;
//         }

//         a[x-apple-data-detectors] {
//             color: inherit !important;
//             text-decoration: none !important;
//             font-size: inherit !important;
//             font-family: inherit !important;
//             font-weight: inherit !important;
//             line-height: inherit !important;
//         }

//         @media screen and (max-width: 480px) {
//             .mobile-hide {
//                 display: none !important;
//             }

//             .mobile-center {
//                 text-align: center !important;
//             }
//         }

//         div[style*="margin: 16px 0;"] {
//             margin: 0 !important;
//         }
//     </style>

// <body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
//     <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
//         For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
//     </div>
//     <table border="0" cellpadding="0" cellspacing="0" width="100%">
//         <tr>
//             <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
//                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  
//                     <tr>
//                         <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
//                             <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                               
//                                 <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Details Report</p>
//                                     </td>
//                                 </tr>
                                
                               
                                
//                                  <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">2).Name:<br><p style="font-size: 15px; font-weight: 300; line-height: 10px; color:black;">'.$name.'</p></p>
//                                     </td>
//                                 </tr>
                                
                                
                                
//                                  <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Email.<br><p style="font-size: 15px; font-weight: 300; line-height: 10px; color:black;">'.$email.'</p></p>
//                                     </td>
//                                 </tr>
                                
                               
                                
//                                  <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Mobile<br><p style="font-size: 15px; font-weight: 300; line-height: 10px; color:black;">'.$mobile.'</p></p>
//                                     </td>
//                                 </tr>
                                
                                
                                
//                                  <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Class<br><p style="font-size: 15px; font-weight: 300; line-height: 10px; color:black;">'.$class.'</p></p>
//                                     </td>
//                                 </tr>
                                
                                
//                                  <tr>
//                                     <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
//                                         <p style="font-size: 19px; font-weight: 500; line-height: 24px; color:black;">Batch<br><p style="font-size: 15px; font-weight: 300; line-height: 10px; color:black;">'.$batch.'</p></p>
//                                     </td>
//                                 </tr>
                                
                               
                                
                                
                          
                                    
//                             </table>
//                         </td>
//                     </tr>
                   
                  
//                 </table>
//             </td>
//         </tr>
//     </table>
// </body>

// </html>';
// $mail = new PHPMailer;
// //Enable SMTP debugging.
// // $mail->SMTPDebug = 3;                           
// //Set PHPMailer to use SMTP.
// $mail->isSMTP();        
// //Set SMTP host name                      
// $mail->Host = "mail.timegenix.com";
// //Set this to true if SMTP host requires authentication to send email
// $mail->SMTPAuth = true;                      
// //Provide username and password
// $mail->Username = "support@timegenix.com";             
// $mail->Password = "Support@11#22";                       
// //If SMTP requires TLS encryption then set it
// $mail->SMTPSecure = "tls";                       
// //Set TCP port to connect to
// $mail->Port = 587;                    
// $mail->From = "support@timegenix.com";
// $mail->FromName = "Timegenix";
// $mail->addAddress("kailash210111@gmail.com", "Beverly Hills");
// $mail->isHTML(true);
// $mail->Body =$send_message;
// if(!$mail->send())
// {
// echo "Mailer Error: " . $mail->ErrorInfo;
// }
// else
// {
//     echo "success";
// }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <!-- <title>Cuba - Premium Admin Template</title> -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
      body{
      text-align: center;
      margin: 0 auto;
      width: 650px;
      font-family: work-Sans, sans-serif;
      background-color: #f6f7fb;
      display: block;
      }
      ul{
      margin:0;
      padding: 0;
      }
      li{
      display: inline-block;
      text-decoration: unset;
      }
      a{
      text-decoration: none;
      }
      p{
      margin: 15px 0;
      }
      h5{
      color:#444;
      text-align:left;
      font-weight:400;
      }
      .text-center{
      text-align: center
      }
      .main-bg-light{
      background-color: #fafafa;
      box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353); 
      }
      .title{
      color: #444444;
      font-size: 22px;
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      padding-bottom: 0;
      text-transform: uppercase;
      display: inline-block;
      line-height: 1;
      }
      table{
      margin-top:30px
      }
      table.top-0{
      margin-top:0;
      }
      table.order-detail {
      border: 1px solid #ddd;
      border-collapse: collapse;
      }
      table.order-detail tr:nth-child(even) {
      border-top:1px solid #ddd;
      border-bottom:1px solid #ddd;
      }
      table.order-detail tr:nth-child(odd) {
      border-bottom:1px solid #ddd;
      }
      .pad-left-right-space{
      border: unset !important;
      }
      .pad-left-right-space td{
      padding: 5px 15px;
      }
      .pad-left-right-space td p{
      margin: 0;
      }
      .pad-left-right-space td b{
      font-size:15px;
      font-family: 'Roboto', sans-serif;
      }
      .order-detail th{
      font-size:16px;
      padding:15px;
      text-align:center;
      background: #fafafa;
      }
      .footer-social-icon tr td img{
      margin-left:5px;
      margin-right:5px;
      }
    </style>
  </head>
  <body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
      <tbody>
        <tr>
          <td>
            <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;" width="100%">
              <tbody>
                <tr>
                  <td style="text-align: center;"><h2>WELCOME!</h2></td>
                </tr>
                <tr>
                  <td style="text-align: center;"><img src="{{asset('user/assets/images/logo/loginlogo.PNG')}}" alt="" style=";margin-bottom: 30px;"></td>
                </tr>
                <tr>
                  <td>
                    <p style="font-size: 14px;padding: 5px;"><b>Verify Email Address</b></p>
                    <p style="font-size: 14px;padding: 5px;">We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                     <center><p style="font-size: 14px;padding: 5px;"><a href="{{ $actionUrl }}" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">{{$actionText}}</a></p></center>
                    <p style="font-size: 14px;padding: 5px;">If you did not create an account, no further action is required.</p>
                    <p style="font-size:14px;padding: 5px;">If that doesn't work, copy and paste the following link in your browser:</p>
                    {{$actionUrl}}
                    <p style="font-size:14px;padding: 5px;">Best Regards,</p>
<p style="font-size: 14px;padding: 5px;">LowLowerGone Team</p>
                  </td>
                </tr>
              </tbody>
            </table>
         
          </td>
        </tr>
      </tbody>
    </table>
    <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td style="padding: 30px;">
            <div>
              <h4 class="title" style="margin:0;text-align: center;">Follow us</h4>
            </div>
            <table class="footer-social-icon" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:20px;">
              <tbody>
                <tr>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/facebook.png')}}" alt=""></a></td>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/youtube.png')}}" alt=""></a></td>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/twitter.png')}}" alt=""></a></td>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/gplus.png')}}" alt=""></a></td>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/linkedin.png')}}" alt=""></a></td>
                  <td><a href="#"><img src="{{asset('user/assets/images/email-template/pinterest.png')}}" alt=""></a></td>
                </tr>
              </tbody>
            </table>
            <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
              <tbody>
               <!--  <tr>
                  <td><a href="#" style="font-size:13px">Want to change how you receive these emails?</a></td>
                </tr> -->
                <tr>
                  <td>
                    <p style="font-size:13px; margin:0;">2018 - {{date('Y')}} &copy Copy Right by BIG PROFIT ADS</p>
                  </td>
                </tr>
               <!--  <tr>
                  <td><a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a></td>
                </tr> -->
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
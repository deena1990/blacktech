<!DOCTYPE html>
<html>
   <head>
      <title>BlackTECH Academy</title>
   </head>
   <body style="margin: 0px; padding-bottom: 50px; padding-left: 0; padding-right: 0;font-family:sans-serif;background-color:#ebebeb;">
      <table style="width: 100%;" cellspacing="0" cellpadding="0">
      <!-- @if(Session::has('success'))
         <p class="alert alert-success">{{ Session::get('success') }}</p>
      @endif
      @if(Session::has('error'))
         <p class="alert alert-success">{{ Session::get('error') }}</p>
      @endif -->
         <tbody>
            <tr>
               <td style="width: 100%;background-color:#333;padding:0 30px;" align="center">
                  <table>
                     <tr>
                        <td style="max-width:400px;padding:0;" >
                           <a href="" style="display:block;margin:10px 0;"><img src="" style="max-width: 90px;display:inline-block;width: 100%;"></a>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td valign="top" align="center" style="background-color:#333;">
                  <table style="text-align: left; background-color:#fff;border-radius:4px 4px 0 0;color: rgb(51, 51, 51); font-size:16px;width:100%;max-width:650px;"  cellspacing="0">
                     <tbody>
                        <tr>
                           <td style="padding-top: 20px;text-align: center;">
                              <h2 style="color:#0877BD;margin:0;text-decoration:uppercase;">Welcome BlackTECH Academy !</h2>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:0 20px;">
                              <p>Hi {{$user_name}},</p>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:0 20px;">
                              <p>This is a reminder email that you have been registered an Event from <span style="color:#0877bd;">BlackTECH</span></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
            </tr>
            <tr>
               <td valign="top" align="center">
                  <table style="text-align: left; background-color:#fff;color: rgb(51, 51, 51); font-size:16px;width:100%;max-width:650px;"  cellspacing="0">
                     <tbody>
                        <tr>
                           <td style="background-color:#fff;text-align:left;padding:0 20px;">
                              <p style="margin-top:10px;margin-bottom:0;">I am so glad to remind you for your choosen Event.</p>
                              <!--  -->
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:0 20px;">
                              <p>{{$reminder_message}}</p>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:0 20px;">
                              <p style="margin-top:0px;margin-bottom:0;">if you have any questions, just reply to this mail<span style="color:#0877bd;"> mobappssolutions159@gmail.com </span>. We're always happy to help you out.</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td valign="top" align="center">
                  <table style="text-align: left; background-color:#fff;color: rgb(51, 51, 51); font-size:16px;width:100%;max-width:650px;"  cellspacing="0">
                     <tbody>
                        <tr>
                           <td style="background-color:#fff;text-align:left;padding:0 20px 20px;">
                              <p style="margin-top:10px;margin-bottom:0;">The BlackTECH Academy</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td valign="top" align="center">
                  <table style="text-align: left;color: rgb(51, 51, 51); font-size:16px;width:100%;max-width:650px;"  cellspacing="0">
                     <tbody>
                        <tr>
                           <td style="background-color:#333;color:#333;text-align:center;padding:0 20px;">
                           </td>
                        </tr>
                        <tr>
                           <td style="text-align:center;border-top:1px solid #ddd;padding:10px 0;background-color:#333;">
                              <p style="color:#fff;text-decoration:uppercase;margin:0;">{{ date('Y') }} &copy; BlackTECH Academy</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>
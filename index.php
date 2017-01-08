<?php

    $error = "";

    $successMessage = "";
    
    if ($_POST) {
        
        $error = "";
        
        if (!$_POST["email"]) {
            
            $error .= "The email field is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content filed is required.<br>";
            
        }
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject field is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
           $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "blaz.dvo@gmail.ccom";
            
            $subject = $_POST['subject'];
            
            $content = $_POST['content'];
            
            $headers = "From:".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers )) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your messsage was sent we\'ll get back to you ASAP!</div>';
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later</div>';
                
            }
            
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
 
  <head>
   
    <!-- Required meta tags always come first -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Get in touch!</title>

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    
  </head>
  
  <body>
      
      <div class="container">
      
          <h1>Get in touch!</h1>
      
          <div id="error"><? echo $error.$successMessage; ?></div>
      
          <form method="post">
             
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <small class="text-muted">We'll never share your email with anyone else.</small>
              </div>
              
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" >
              </div>
              
              <div class="form-group">
                <label for="exampleTextarea">What would you like to ask us?</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
              
              <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              
          </form>
          
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
          
        $("form").submit(function(e) {
             
            var error = "";
            
            if ($("#email").val() == "") {
                
                error += "The email field is required.<br>"
                
            }
            
            if ($("#email").val() == "") {
                
                error += "The subject field is required.<br>"
                
            }
            
            if ($("#email").val() == "") {
                
                error += "The content field is required.<br>"
                
            }
            
            if (error != "") {
                
                $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                
                return false;
                
            } else {
                
                return true;
                
            }
             
         });
          
    </script>
          
  </body>
</html>





















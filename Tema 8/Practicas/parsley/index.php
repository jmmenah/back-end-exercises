<!DOCTYPE html>
<html>
  <head>
    <title>Live Email Availability using Parsley.js Custom Validator with PHP</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style> 
      input.parsley-success,
       select.parsley-success,
       textarea.parsley-success {
         color: #468847;
         background-color: #DFF0D8;
         border: 1px solid #D6E9C6;
       }

       input.parsley-error,
       select.parsley-error,
       textarea.parsley-error {
         color: #B94A48;
         background-color: #F2DEDE;
         border: 1px solid #EED3D7;
       }

       .parsley-errors-list {
         margin: 2px 0 3px;
         padding: 0;
         list-style-type: none;
         font-size: 0.9em;
         line-height: 0.9em;
         opacity: 0;

         transition: all .3s ease-in;
         -o-transition: all .3s ease-in;
         -moz-transition: all .3s ease-in;
         -webkit-transition: all .3s ease-in;
       }

       .parsley-errors-list.filled {
         opacity: 1;
       }
       
       .parsley-type,
       .parsley-required,
       .parsley-equalto,
       .parsley-pattern,
       .parsley-urlstrict,
       .parsley-length,
       .parsley-checkemail{
        color:#ff0000;
       }
    </style>
  </head>
  <body>
    <br />
    <br />
    <div class="container">
      <h3 align="center">Live Email Availability using Parsley.js Custom Validator with PHP</h3>
      <br />
      <br />
      <br />
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
          <input type="text" id="email_address" class="form-control input-lg" required placeholder="Enter Email ID" data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail data-parsley-checkemail-message="Email Address already Exists" />
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(document).ready(function(){
      
    $('#email_address').parsley();

    window.ParsleyValidator.addValidator('checkemail', {
      validateString: function(value)
      {
        return $.ajax({
          url:'fetch.php',
          method:"POST",
          data:{email:value},
          dataType:"json",
          success:function(data)
          {
            return true;
          }
        });
      }
    });

  });
</script>

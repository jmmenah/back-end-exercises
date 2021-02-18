<!DOCTYPE html>  
 <html lang="en">  
      <head>  
           <title>Webslesson Tutorial | Make Pagination using Jquery, PHP, Ajax and MySQL</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 style="text-align: center;"><a href="https://www.webslesson.info/2016/08/make-pagination-using-ajax-with-jquery-php-and-mysql.html">Make Pagination using Jquery, PHP, Ajax and MySQL</a></h3><br />  
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div>  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script> 
      </body>  
 </html>  


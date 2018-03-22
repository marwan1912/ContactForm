<?php
      

/*
By: Marwan El Sharkawy.
This website is for practicing purposes, it is getting the weather forecast for different cities from weather-forecast.com and displays it to the user. PHP is used to scrap the content related to the weather condition in a given city from the main website.

*/
    $forecast="";

    if($_GET["city"]){
        
        $city= str_replace(" ","",$_GET["city"]); //To remove the spaces within the name of a given city as New York so the website can track the url of the main website (weather-forecast.com) and scrap the desired parts from the whole page.
        
        $pageToBeScrapped= file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        $array1= explode('3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',$pageToBeScrapped); //After execution of the explode function, the page now starts with the desired content followed by the rest of the page contents.
        
        $array2= explode('</span></p></td>',$array1[1]);
        //After execution of the explode function, the page now only contains the desired content.
        
        $forecast= $array2[0];
    }
    
    
    
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
    <link rel="stylesheet" href="animate.css">  

    <title>PHP Practice</title>
      
   <style type=text/css>
       
      .jumbotron{
          position: relative;
        z-index:-1;
       }

#video-background { 
  position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    z-index: 0;
    width:100%;
    
}
       
       body{
           
           background:none;
       }

       .container{
           
           text-align: center;
           margin-top: 100px;
           width:450px;
           
       }
       
       input{
           margin:15px 0;
       }
       
       #result{
           
           
           margin-top:15px;
       }
       
       
       
      </style>      
  </head>
    
    
  <body>
      
<div class="jumbotron">
  <video id="video-background" preload muted autoplay loop>
    <source src="clouds.mp4" type="video/mp4">
    
  </video>
    
</div>
      
      <div class="container">
      
      
      <h1 class="rubberBand animated">What's The Weather?</h1>
          
          
          <form>
  <div class="form-group">
    <label for="city">Enter the name of a city.</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Eg. Seattle, London" value="<?php echo $_GET['city']; ?>">
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          
          <div id="result"><?php
         
      if($forecast){
          
    echo '<div class="alert alert-success" role="alert">'.$forecast.'</div>';
      }else if($_GET["city"]==""){
          echo "";
      }else{
          echo '<div class="alert alert-danger" role="alert">'."Sorry, this city could not be found.".'</div>';;
      }
              
      
      
      ?></div>
      
      </div>
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
  </body>
</html>
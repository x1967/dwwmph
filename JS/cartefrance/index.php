<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>carte_regions</title>
</head>
<body>
   <div class="container">

      <h1>Les Régions de France</h1>
       
         <div class="map" id="map">

            <div class="map__image">
              
               <?php include('SVG\CarteDeFrance.svg');
               ?>

            </div>
         </div>
        <div class="map__list" id="ml">

           <span id="infosRegion"></span>
           


        </div>
   </div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>   
<script src="script.js"></script>  
</body>
</html>
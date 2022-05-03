

<!DOCTYPE html>
<html>
    <head> 
        <?php include 'partials/head.php'; ?>
        <link rel="stylesheet" href="css/index.css">
	   
    <link rel="stylesheet" href="css/header.css">
    
    <link rel= "stylesheet" type= "text/css" href= "static/css/style.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    
   </head>


    <body>
        
        <?php include 'partials/header2.php'; ?>

        <div id="chatbot-page">
      <div class="container">
          <div class="row">
            <div class="col-lg-12  chatbot-page-content">
            
              <div class="d-flex flex-column bd-highlight mb-3" style="width: 50vw;">
                <div class="p-2 bd-highlight"><h1>A Healthcare Chatbot</h1></div>
                <div class="p-2 bd-highlight"><h3>हमारा उद्देश्य स्वास्थ्य सेवा को आसानी से सुलभ बनाना है हमारे एआई संचालित डायग्नोस्टिक इंजन, जो निदान के लिए प्राकृतिक भाषा समझ का उपयोग करता है</h3></div>
                
                
              </div>
              <h5> You can also choose a different language: </h5>
              <br>
              <button type="button" class="btn btn-info"><a href="hchatbot.php" style="color:black; text-decoration: none; "> Hindi </a></button>
               <button type="button" class="btn btn-primary" ><a href="echatbot.php" style="color:black;text-decoration: none; ">English</a></button>
               <button type="button" class="btn btn-primary" ><a href="tchatbot.php" style="color:black;text-decoration: none; ">Telugu</a></button>
               <button type="button" class="btn btn-primary" ><a href="ochatbot.php" style="color:black;text-decoration: none; ">Odia</a></button>    
                    
          </div>
          <div class="widget" >
          <div class="chat_header">
               <!--Add the name of the bot here -->
               <span style="color:white;margin-left: 5px;">ChatBot </span>
               <span style="color:white;margin-right: 5px;float:right;margin-top: 5px;" id="close">
               <i class="material-icons">close</i>
               </span>
            </div>
             <!--Chatbot contents goes here -->
             <div class="chats" id="chats">
               <div class="clearfix"></div>
            </div>
            <!--user typing indicator -->
            <div class="keypad" >
               <input type="text" id="keypad" class="usrInput browser-default" placeholder="Type a message..." autocomplete="off">
            </div>
         </div>
         <!--bot widget -->
         <div class="profile_div" id="profile_div" style="width: 10vw;">
            <img class="imgProfile" src="static/img/botAvatar.png"/>
         </div>
          </div>
          
      </div>
      ..
      </div>
      
      

        
      
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="static/js/materialize.min.js"></script>
      <!--Main Script -->
      <script type="text/javascript" src="static/js/hindiScript.js"></script>
        <?php include 'partials/footer.php'; ?>
   
    </body>




</html>

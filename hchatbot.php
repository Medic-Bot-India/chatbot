<!DOCTYPE html>
<html>
   <head>
      <title>ChatBot</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel= "stylesheet" type= "text/css" href= "static/css/style.css">
      <!--Main css-->
      <link rel= "stylesheet" type= "text/css" href= "static/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   </head>
   <body>
      <div class="container my-4">

      <div class="border border-light p-3 mb-4">


<div class="text-center">
<h2> MEDICBOT : A Healthcare Conversational AI</h2><br><br><br>
<h4> Please Select a Languge: </h4>
<br><br> 
<button type="button" class="btn btn-primary"><a href="hchatbot.php" style="color:black;"> Hindi </a></button>
</div>
<br>
<div class="text-center">
<button type="button" class="btn btn-primary" ><a href="echatbot.php" style="color:black;">English</a></button>
</div>
<br>
<div class="text-center">
<button type="button" class="btn btn-primary" ><a href="tchatbot.php" style="color:black;">Telugu</a></button>
</div>

</div>

         <div class="widget">
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
         <div class="profile_div" id="profile_div">
            <img class="imgProfile" src="static/img/botAvatar.png"/>
         </div>
      </div>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="static/js/materialize.min.js"></script>
      <!--Main Script -->
      <script type="text/javascript" src="static/js/hindiScript.js"></script>
      <div></div> 
   </body>
</html>

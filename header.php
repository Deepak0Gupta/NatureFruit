<?php
  session_start();
    require("db.php");
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="utf-8">
    <title>nature.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="jquery.autocomplete.js"></script>
         <script type="text/javascript">
    document.onkeydown = function(e) {
        if(event.keyCode == 123) {
           return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
           return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
           return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
           return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
           return false;
        }
        if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
          return window.open("viewcart.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'P'.charCodeAt(0)) {
          return window.open("profile.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'L'.charCodeAt(0)) {
          return window.open("login.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)) {
          return window.open("aboutus.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'W'.charCodeAt(0)) {
          return window.open("wishlist.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
          return window.open("Seasnal-fruits.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'R'.charCodeAt(0)) {
          return window.open("rare-fruits.php", "_self");
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'H'.charCodeAt(0)) {
          return window.open("index.php", "_self");
        }
        if(e.ctrlKey && e.keyCode == 'B'.charCodeAt(0)) {
          return window.open("bot.php", "_self");
        }
      }
      window.oncontextmenu = function () {
        return false;
     }
</script>
 <script type="text/javascript">
      var speechRs = speechRs || {};
speechRs.speechinit = function(lang,cb,bcolor,color,pitch,rate){
   this.speaker = new SpeechSynthesisUtterance();
   this.speaker.pitch=pitch || 1;
   this.speaker.rate=rate || 1;  
   this.lan = lang;
   var style = document.createElement('style');
  style.type = 'text/css';
  style.innerHTML = '.rsClass{background-color:'+(bcolor || "#4f91e6")+';color:'+(color || "#fff")+';}';
  document.getElementsByTagName('head')[0].appendChild(style);
   setTimeout(function(){
   speechRs.speaker.voice = speechSynthesis.getVoices().
     filter(function(voice) {  return voice.name == speechRs.lan; })[0];
   },500);
   if(lang == 'native'){
  cb(this);
   }else{
     setTimeout(function(){
   cb(speechRs)
   },1000);
   }
  }
speechRs.speak = function(text,cb,isHiligh) {
   let j=0,el,ar=[];
     speechRs.speaker.voice = speechSynthesis.getVoices().
     filter(function(voice) {  return voice.name == speechRs.lan; })[0];
   this.speaker.onend = function(e) {
    cb(e);
    };
  if (typeof text == 'string') {
      this.speaker.text = text;
      speechSynthesis.speak(this.speaker);
   } else {
     if(isHiligh){
        j = 0;
      el = text;
        ar = (text.innerHTML).split(".");
      readop(ar[j]);    
    }else{
      this.speaker.text = text.innerHTML;
        speechSynthesis.speak(this.speaker);
    }     
   }
  function readop(x){
    speechRs.speaker.text = x;
    if(j != 0){
    el.querySelector(".rsClass").className = "";
    }
    el.innerHTML = (el.innerHTML).replace(ar[j],"<span class='rsClass'>"+ar[j]+"</span>");
    speechSynthesis.speak(speechRs.speaker);
    speechRs.speaker.onend = function(e){
       if(ar.length>(j+1)){
        readop(ar[++j]);
      }
    }
  }
  }
speechRs.rec_start = function(l,callback){
   this.recognition = new webkitSpeechRecognition();
   this.recognition.continuous = true;
   this.recognition.interimResults = true;
         this.arry_com = {};
   this.final_transcript = '';
         this.recognition.lang = l;
   this.recognition.start();
   this.ignore_onend = false;
   this.recognition.onstart = function(c) { 
         }
  let prev_res='';
  this.recognition.onresult = function(event) {
       let interim_transcript = '';      
          if (typeof(event.results) == 'undefined') {
            speechRs.recognition.onend = null;
            speechRs.recognition.stop();
            return;
          }
          for (var i = event.resultIndex; i < event.results.length; ++i) {
              if (event.results[i].isFinal) {
           prev_res='';
                 speechRs.final_transcript += event.results[i][0].transcript;
                 } else {
                interim_transcript += event.results[i][0].transcript;
                                 }
           }
        console.log(prev_res+","+interim_transcript);
        if(prev_res != interim_transcript && speechRs.arry_com[interim_transcript.toLowerCase().trim()]){         
             prev_res = interim_transcript;   
                               speechRs.arry_com[interim_transcript.toLowerCase().trim()]();
        }else{
        } 
          callback(speechRs.final_transcript.replace("undefined",""),interim_transcript); 
           }  
}
speechRs.on = function(s,f){
  this.arry_com[s.toLowerCase()] = f;
} 
speechRs.rec_stop = function(callback){
  this.recognition.stop();
  this.recognition.onstop = function() {
   return callback(); 
  }    
}
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
<script>
    function speek(){
if (annyang) {
  // Let's define a command.
  var commands = {
    'hello': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("hello master what can i do for you", function() {
               }, false);   
     }); },
    'hello deepak can you hear me': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("yes master i can hear you", function() {
               }, false);   
     }); },
     'how are you *abc': function(abc) {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("i am fine master", function() {
               }, false);   
     }); },
     'how are you': function(abc) {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("i am fine master", function() {
               }, false);   
     }); },
    'say hello to me': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("hello master Deepak", function() {
               }, false);   
     }); },
     'say hello to *val': function(val) {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("Hello," + val, function() {
               }, false);   
     }); },
    'open google': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("As your wish master", function() {
                  window.open('http://google.com');
               }, false);   
     }); },
       'open Login page': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("As your wish master", function() {
                  window.open('login.php', '_self');
               }, false);   
     }); },
        'open profile page': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("As your wish master", function() {
                  window.open('profile.php', '_self');
               }, false);   
     }); },
         'Show my cart': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("As your wish master", function() {
                  window.open('viewcart.php', '_self');
               }, false);   
     }); },
      'Show my wishlist': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("As your wish master", function() {
                  window.open('wishlist.php', '_self');
               }, false);   
     }); },
    'can you hear me': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("yes master i can here you", function() {
                   //speaking completed.
               }, false);   
     }); },
    'tell me something *val': function(val) {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("how can i hap you master", function() {
                   //speaking completed.
               }, false);   
     }); },
    'do you understand English': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("yes master", function() {
               }, false);   
     }); },
    'tell me about youre self': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("my name is deepak. I am an AI bot,I was created by master deepak", function() {
               }, false);   
     }); },
    'what is your name': function() {  speechRs.speechinit('Google UK English male',function(e){
          speechRs.speak("my name is deepak. I am an AI bot,I was created by master deepak", function() {
               }, false);   
     }); },
        'stop': function() {   annyang.pause();
      },
  }
  annyang.addCommands(commands);
  annyang.debug();
  annyang.start();
}
    }
 </script>
 <style type="text/css">
  #vb{
    position: relative;
    z-index: 1;
    right: 1px;
    top: 9px;
    height: 38px;
  }
 </style>
  <script>
  function startDictation() {
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
      var recognition = new webkitSpeechRecognition();
      recognition.continuous = false;
      recognition.interimResults = false;
      recognition.lang = "en-US";
      recognition.start();
      recognition.onresult = function(e) {
        document.getElementById('search').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol').submit();
      };
      recognition.onerror = function(e) {
        recognition.stop();
      }
    }
  }
</script>
 <script> 
 jQuery(function(){ 
 $("#search").autocomplete("search.php"); 
 });
 </script>
</head>
<body>
  <form id="labnol" action="search.php">
<div class="top-nav-bar">
<div class="search-box">
  <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
  <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
<img src="img/large1.JPG" class="logo">
<input type="text" class="form-control" name="q" id="search" placeholder="Enter fruits Name" autocomplete="off" required>
<img id="vb" onclick="startDictation()" src="img/voiceicon.jpg" />
<span class="input-group-text"><i class="fa fa-search" ><button style="position:relative; left: -15px; height: 10px; background-color: #45CE30; opacity: 0.1;z-index: 1;" type="submit"></button></i></span>
</div>
</form>
<div class="menu-bar">
<ul>
<li><a href="index.php"><i class="fa fa-home" > </i> Home</a></li>
<?php 
$total = null;
$wishlist = null;
if (isset($_SESSION['username'] )) {
$username = $_SESSION['username'];
$userid = mysqli_query($con,"SELECT uid FROM accounts WHERE username='{$username}' limit 1") or die("error");
if ($userid) {
  while ($row = mysqli_fetch_array($userid)){
    $id  = $row['uid'];
  }
}else{
  echo"something went wrong";
}
$useridcount = mysqli_query($con,"SELECT * FROM cart WHERE uid='{$id}'") or die("error");
$total = mysqli_num_rows($useridcount);
$useridcount = mysqli_query($con,"SELECT * FROM wish_list WHERE uid='{$id}'") or die("error");
$wishlist = mysqli_num_rows($useridcount);
}
?>
<li><a href="viewcart.php"><i class="fa fa-shopping-basket"></i><?php echo "$total"; ?> cart</a></li>
<?php 
    if (isset($_SESSION['username'] )) {
      ?>
      <li style="color: white;"> <a href="profile.php"><?php echo "$username"; ?></a>
      </li>
      <?php
    }else{
      ?>
      <li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
      <?php
    }
   ?>
</ul>
</div>
</div>
<section class="header">
<div class="side-menu" id="side-menu">
<ul style="list-style-type:none;padding:0px;">
  <a href="index.php#onsale_section" ><li style="color: black;"><i class="fa fa-bolt"></i> on sale<i class="fa fa-angle-right"></i></li></a>
  <a href="apple.php#apple-section" ><li style="color: black;"><i class="fa fa-apple" aria-hidden="true"></i> Apples<i class="fa fa-angle-right"></i>
  </li></a>
  <a href="rare-fruits.php#rare-fruit-section" ><li style="color: black;"><i class="fa fa-registered" aria-hidden="true"></i> Rare fruits<i class="fa fa-angle-right"></i>
  </li></a>
  <a href="Most purchsed.php" ><li style="color: black;"><i class="fa fa-star" aria-hidden="true"></i> Most purchsed<i class="fa fa-angle-right"></i>
  </li></a>
  <a href="Seasnal-fruits.php#Seasnal-fruits_section" ><li style="color: black;"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Seasnal-fruits<i class="fa fa-angle-right"></i>
  </li></a>
  <a href="contact.php"><li style="color: black;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Contact Us<i class="fa fa-angle-right"></i>
  </li></a>
  <a href="aboutus.php"><li style="color: black;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> About Us<i class="fa fa-angle-right"></i></li></a>
  <?php 
    if (isset($_SESSION['username'] )) {
      ?>
  <a href="logout.php"><li style="color: black;"><i class="fa fa-power-off" aria-hidden="true"></i> Log out<i class="fa fa-angle-right"></i></li></a>
  <?php
}
?>
</ul>
</div>
<style type="text/css">
  #chat{
    top: 15%;
    right: 2%;
  height: 50px;
  width: 50px;
  position: fixed;
  z-index: 2;
}
#wish{
  top: 23%;
    right: 2%;
  height: 50px;
  width: 50px;
  position: fixed;
  z-index: 2;
}
#info{
  top: 31%;
    right: 2%;
  height: 50px;
  width: 50px;
  position: fixed;
  z-index: 2;
}
#microphone{
  top: 39%;
    right: 2%;
  height: 50px;
  width: 50px;
  position: fixed;
  z-index: 2;
}
</style>
<a href="chatbot.php">
  <img src="img/chatbot.png" id="chat">
</a>
<a href="wishlist.php"><button id="wish" class="btn btn-danger" >
  <i class="fa fa-heart"><?php echo "$wishlist"; ?></i>
</button></a>
<a href="profile.php"><button id="info" class="btn btn-danger" >
  <i class="fa fa-user-circle-o"></i>
</button></a>
<button id="microphone" class="btn btn-danger" onclick="speek()">
  <i class="fa fa-microphone"></i>
</button>
</section>
<script src="js/minicart.min.js"></script>
</body>
</html>
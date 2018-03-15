<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sinhgad Institutes | Performance Appraisal</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/css/nprogress.css" rel="stylesheet">
    <!-- NProgress -->
  

    <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

   

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
     <link href="<?php echo base_url();?>assets/css/stylesheet.css" rel="stylesheet" media="screen">
     
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" />

    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

    

   






    <style>

    .spinner {
 
  -webkit-animation: sk-rotateplane 4s infinite ease-in-out;
  animation: sk-rotateplane 4s infinite ease-in-out;
}

@-webkit-keyframes sk-rotateplane {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(300px) rotateY(180deg) }
  /*50% { -webkit-transform: perspective(300px) rotateY(360deg) }  */
  /*100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }*/
  100% { -webkit-transform: perspective(120px) rotateY(360deg)  rotateX(360deg) }
}

@keyframes sk-rotateplane {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } /*50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(300px) rotateX(-180.1deg) rotateY(0deg) 
  } */50% { 
    transform: perspective(120px) rotateX(-360.1deg) rotateY(0deg);
    -webkit-transform: perspective(300px) rotateX(-360.1deg) rotateY(0deg) 
  } /*100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }*/

  100% { 
    transform: perspective(120px) rotateX(-360deg) rotateY(-360deg);
    -webkit-transform: perspective(120px) rotateX(-360deg) rotateY(-360deg);
  }

}
    .error
    {
      color:red;
    }
    .tasks li, ul.messages li{
      padding: 20px 0;
    }
    #infoMessage
    {
        color:red;
    }

    .table-text
    {
        font-size:18px;
        color:#1abb9c;
    }

    #loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   opacity: 0.7;
   background-color: #fff;
   z-index: 99;
   text-align: center;
}

#loading-image {
  position: absolute;
  top: 190px;
  left: 580px;
  z-index: 100;
}

input:valid {
  color: green;
}
input:invalid {
  color: red;
}



    </style>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/angular.min.js"></script>


     <!-- math.js -->
    

    <!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'oWw4mj9oXvTTKCKdP';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');

      $(window).load(function() {
               $('#loading').hide();
                });



</script>
<!-- /Chatra {/literal} -->

  </head>

  <body class="nav-md footer_fixed">
   <div class="container body">
      <div class="main_container">

        <div id="loading">
       <img id="loading-image" src="<?php echo base_url();?>assets/images/Eclipse.gif" alt="Loading..." />
        </div>

   


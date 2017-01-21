<!DOCTYPE html>
<html lang="en">
<head>
  <title>Black Belt Messager App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
 #wrapper {
  padding-left: 250px;
  transition: all 0.4s ease 0s;
}

#sidebar-wrapper {
  margin-left: -250px;
  left: 250px;
  width: 250px;
  background: #000;
  position: fixed;
  height: 100%;
  overflow-y: auto;
  z-index: 1000;
  transition: all 0.4s ease 0s;
}

#wrapper.active {
  padding-left: 0;
}

#wrapper.active #sidebar-wrapper {
  left: 0;
}

#page-content-wrapper {
  width: 100%;
}



.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar-nav li {
  line-height: 40px;
  text-indent: 20px;
}

.sidebar-nav li a {
  color: #999999;
  display: block;
  text-decoration: none;
  padding-left: 60px;
}

.sidebar-nav li a span:before {
  position: absolute;
  left: 0;
  color: #41484c;
  text-align: center;
  width: 20px;
  line-height: 18px;
}

.sidebar-nav li a:hover,
.sidebar-nav li.active {
  color: #fff;
  background: rgba(255,255,255,0.2);
  text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  line-height: 60px;
  font-size: 18px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}



.content-header {
  height: 65px;
  line-height: 65px;
}

.content-header h1 {
  margin: 0;
  margin-left: 20px;
  line-height: 65px;
  display: inline-block;
}

#menu-toggle {

}

.btn-menu {
  color: #000;
} 

.inset {
  padding: 20px;
}

@media (max-width:767px) {

#wrapper {
  padding-left: 0;
}

#sidebar-wrapper {
  left: 0;
}

#wrapper.active {
  position: relative;
  left: 250px;
}

#wrapper.active #sidebar-wrapper {
  left: 250px;
  width: 250px;
  transition: all 0.4s ease 0s;
}

#menu-toggle {
  display: inline-block;
}

.inset {
  padding: 15px;
}

}

  </style>
</head>
<body>
<? //include "Message.INCLUDE.TopForm.php"; ?>
<div id="wrapper" data-spy="scroll" data-target="#spy" class="">
    <!-- Sidebar -->
    
            <? include "side-bar.php"; ?>
       
    <!-- Page content -->
    <div id="page-content-wrapper" class="">
        <div class="content-header">
             <h1 id="home" class="">
                    <a id="menu-toggle" href="#" class="btn btn-menu btn-lg toggle">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    Group Name 
                    <? include "BBM-Modal.php"; ?>
                </h1>

        </div>
        <div class="page-content inset">
            
          
           
                 <?
                         $query="SELECT * FROM Messages";
                         echo $query;
                          include "Student6.ConnectString.php";
                          $connect = mysqli_connect($host_name, $user_name, $password, $database);
                          $result=mysqli_query($connect,$query) or die(mysqli_error()); ;
                          $row_count = mysqli_num_rows($result);
                          mysqli_close($connect);
                          printf("Result set has %d rows.\n", $row_cnt);
                          echo "num=$row_cnt<br>";
                          while($ResultsArray = mysqli_fetch_array($result)) 
                          {
                            
                                echo '<div class="row">';
                                echo ' <div class="col-md-12 well">';
                                echo ' <legend id="anch1" class=""><img src="./images/UserIcon.png" lass="img-circle" alt="Cinque Terre" width="128" height="128">UserName</legend>';
                                        echo '<p class="">'.$ResultsArray['Message'].'</p>';
                                        echo '<p>Posted on: 1/1/1 12:00 </p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                          } // while($ResultsArray = mysqli_fetch_array($result)) 
               
              ?> 
            </div>
            <div class="navbar navbar-default navbar-static-bottom">
                <p class="navbar-text pull-left">We could put the POST message here </p>
            </div>

</div>

<script>
  $(document).ready(function() {
        
                
  /*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
        
        });
</script>
<? //include "Message.INCLUDE.BottomForm.php"; ?>
</body>
</html>

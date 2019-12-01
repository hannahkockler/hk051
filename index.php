<!DOCTYPE PHP>
    <html>
    <style>
    body {
 background-image: url(https://images.pexels.com/photos/640858/pexels-photo-640858.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) ;

background-color: #cccccc;
       ;
}
     h1 {
            
        margin-top: 30px;
            font-family: inherit;
            font-size: 30pt;
             }
        
         .auswahl {
             left: 100px;
         }
          .ausgabe {
            
         font-family: inherit;
            font-size: 15pt;
            font-weight: bold; 
         
        }
        
        table {
             border: dotted red  2px;
            background: RGBA(255,0,255,10%) ; 
           
            
        }

        
    </style>
    
    
    <head>
        <title>I say YES! to... </title>
    </head>
  
    
    <body>
        
        
        
        

<div class="Menue" align="center" margin-top="10px">

    <h1>I say YES! to... </h1>
        
          <div class = "auswahl">
        <form method="get">
 
             <select class="custom-select" name="phrase_01"> 
        <option selected>Open this select menu</option>
        <option value="loving">exploring</option>
        <option value="exploring">enjoying</option>
        <option value="discovering">discovering</option>
        <option value="enjoying">loving</option>
    </select>
            
              <select class="custom-select" name="phrase_02"> 
        <option selected>Open this select menu</option>
        <option value="Malaysia">life</option>
        <option value="Denmark">Christmas markets</option>
        <option value="United Kingdom">Stuttgart</option>
        <option value="Sweden">the fridge</option>
    </select>
           
            <br>
          
             <input type="email" name = "email" value="email@example.com"> 
           
             <input type="name" name = "name" value="ENTER YOUR NAME"> 
            <br>
            
               <button type="submit" class="btn btn-default" name="btn-save" value="1">Trau dich!</button>
               

            
</form> 
    <?php 
        include('config.php');
        
     if (isset($_GET['phrase_01']) && isset($_GET['phrase_02']) && 
         isset($_GET['email']) &&
        isset($_GET['name']))
  
  {
          $text = $_GET['phrase_01'] . " ". $_GET['phrase_02'] ."\n";
    $email=$_GET['email'] ."\n"; 
         $name=$_GET['name'] ."\n"; 
          
    $sql="INSERT INTO phrases (phrase, recipient, name) VALUES ('".$text."', '".$email."', '".$name."')" ;
    
       $result = $link->query($sql);
         
           if (isset($_GET['email'])){
      $to      = urldecode($_GET['email']);
      $subject = 'I say YES! to...';
      $message = $text;
      $headers = 'From: hk051@hdm-stuttgart.de' . "\r\n" .
          'Reply-To: hk051@hdm-stuttgart.de' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
      $mailSuccess = mail($to, $subject, $message, $headers);      
      /*
      // if you want to do some rudimentary error handling...   
      if (!$mailSuccess){
        echo "mail not sent";
      }
      else {
        echo "mail sent to: " . $to;
      }
      */
    }
  
  header('Location: '. $_SERVER['PHP_SELF']);
                die(); 
  
  }
      
      ?>

   <div class="tabelle">
     <table class="table-striped table" cellspacing="10">
        <th>ID</th>
        <th>Phrase</th>
         <th>recipient</th>
          <th>name</th>
        <?php
         
        $stmt = "SELECT * FROM `phrases`";
        $result = $link->query($stmt);
         
      
        if ($result->num_rows > 0){
            while ($row = mysqli_fetch_row($result)){
            echo "<tr>\n";
            echo "<td>" . $row[0] . "</td>\n";
            echo "<td>" . $row[1] . "</td>\n";
            echo "<td>" . $row[2] . "</td>\n";
            echo "</tr>";
            }
            
        
        }
        else {
            echo "<tr><td colspan='2'>No data found</td></tr>";
        }
         
        ?>
    </table>
    </div>
       

        <div class = "auswahl">
     
            </div>
    
     </div>
        
    </body>
</html>
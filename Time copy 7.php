<!DOCTYPE html> 

<meta name="viewport" content="width=device-width, initial-scale=0.5">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Calander</title>



<html lang="de">
<link rel="stylesheet"  href="style.css"> 



<?php 


                    $strDate =  explode(" ", date("year"), 8);



                    if($_COOKIE["ViewMonthData"] > date("m"))
                    {
                        if($_COOKIE["ViewYearData"] > $strDate[3])
                        {
                            echo(' <body id="body" class="Next">');
                        }else if($_COOKIE["ViewYearData"] == $strDate[3]){
                            echo(' <body id="body" class="Next">');
                        }else  if($_COOKIE["ViewYearData"] < $strDate[3])
                        {
                            echo(' <body id="body" class="Before">');
                        }


                    
                    }else if($_COOKIE["ViewMonthData"] == date("m"))
                    {

                        if($_COOKIE["ViewYearData"] == $strDate[3])
                        {
                            echo(' <body id="body" class="Norm">');
                        }else  if($_COOKIE["ViewYearData"] > $strDate[3])
                        {
                            echo(' <body id="body" class="Next">');
                        }else  if($_COOKIE["ViewYearData"] < $strDate[3])
                        {
                            echo(' <body id="body" class="Before">');
                        }

                    
                    }


                    if($_COOKIE["ViewMonthData"] < date("m"))
                    {

                        if($_COOKIE["ViewYearData"] < $strDate[3])
                        {
                            echo(' <body id="body" class="Before">');
                        }else if($_COOKIE["ViewYearData"] == $strDate[3]){
                            echo(' <body id="body" class="Before">');
                        }else if($_COOKIE["ViewYearData"] > $strDate[3])
                        {
                            echo(' <body id="body" class="Next">');
                        }


                    
                    }else if($_COOKIE["ViewMonthData"] == date("m"))
                    {
                        if($_COOKIE["ViewYearData"] == $strDate[3])
                        {
                            echo(' <body id="body" class="Norm">');
                        }
                    }


?>


<div class="form">
    
    <form name="Termin" method="post">
        <input name="clr" type="color">
        <input name="txts" type="text">
        <input name="timesd" type="time">
        <input name="submitCreation" type="submit">
    </form>
</div>

    <a href="index.php">Hello</a>




<?php
   $date = "7_" . $_COOKIE['ViewMonthData'] . "_" . $_COOKIE['ViewYearData'];

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "callander";
   $id = $_COOKIE["useData"];
  

   $conn = new mysqli($servername, $username, $password, $dbname);


   $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
   $dom->validateOnParse = true;




      if(array_key_exists('clr', $_POST)) {

        $a= array("userid"=> $_COOKIE['useData'],"Texta" => $_POST['txts'], "Color" => $_POST['clr'], "Timeclock" => $_POST['timesd'], "date" =>  $date);
         $jsondat = json_encode($a);




         if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         }

         $sql = "INSERT INTO callanderdata (user_ida, dataa)
         VALUES ('$id', ' $jsondat')";
         
      
         if ($conn->query($sql) === TRUE) {
           
            $_POST['clr'] = null;
        
         } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         }

         $conn->close();

      


    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT user_ida, dataa FROM callanderdata";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                if($row['user_ida'] == $_COOKIE['useData'])
                {
                    $jobj = json_decode($row['dataa'], true);
                 
                    if($jobj['date'] == $date)
                    {
                        $element = $dom->createElement('div', $jobj['Texta']);
                    
          
                     $attr = $element->setAttributeNode(
                               new DOMAttr('style', 'cellCurent'));
        
        
                         
                             
               
                        $element->setAttribute('style', 'border: 1px solid ' . $jobj['Color'] .";" 
                    
                            .
                
                            "background: " . $jobj['Color'] .";".
                        
                        
                             "color: white;");
                       
                        $dom->appendChild($element);
        
                        echo $dom->saveHTML();
                    }
                }
              }
        } else {
      
        }
        $conn->close();


?>




                </body>

</html>
 
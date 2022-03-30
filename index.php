




<!DOCTYPE html> 

<meta name="viewport" content="width=device-width, initial-scale=0.5">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Calander</title>



<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "callander";
$something = php_uname();


if($_COOKIE["useData"] == null)
{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO users (userDeviceName)
  VALUES ('$something')";
  
  if ($conn->query($sql) === TRUE) {
      





    $sql = "SELECT id, userDeviceName FROM users";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

    if($row["userDeviceName"] == $something)
    {
        setcookie("useData", $row["id"], time() + 2  * 24 * 60 * 60);
    }
  }
}






  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}





?>


<html lang="de">

 <link rel="stylesheet"  href="style.css"> 




<body id="body" class="Norm">







<section >   
        <div class="info" id = "Month">    <?php


  


   
          
        if($_COOKIE["ViewMonthData"] == null)
        {
            setcookie("ViewMonthData", date("m"), time() + 2  * 24 * 60 * 60);

          
        }
        else
        {
         
        }
          
        

        
                $list = ["Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez"];
                $strDate =  explode(" ", date("year"), 8);

                if($_COOKIE["ViewYearData"] == null)
                {
                    setcookie("ViewYearData", $strDate[3], time() + 2  * 24 * 60 * 60);
                }

                if($_COOKIE["CurentDate"] == null)
                {
                    setcookie("CurentDate", date("m") . "-" . date("d") . "-" .  $strDate[3], time() + 2  * 24 * 60 * 60);
        
                  
                }
           
                $monthNummber = $_COOKIE["ViewMonthData"];
                $yearNummber =  $_COOKIE["ViewYearData"];
            
                switch ($monthNummber) {
                    case '01':
                        echo($list[0] . " " . date("d") . " " .  $yearNummber);
                        break;

                    case '02':
                        echo($list[1] . " " . date("d") . " " .  $yearNummber);
                        break;  
                        
                    case '03':
                         echo($list[2] . " " . date("d") . " " .  $yearNummber);
                        break;
                    case '04':
                            echo($list[3] . " " . date("d") . " " .  $yearNummber);
                           break; 
                    case '05':
                            echo($list[4] . " " . date("d") . " " .  $yearNummber);
                           break;
                    case '06':
                            echo($list[5] . " " . date("d") . " " .  $yearNummber);
                           break;
                    case '07':
                            echo($list[6] . " " . date("d") . " " .  $yearNummber);
                           break;
                    case '08':
                            echo($list[7] . " " . date("d") . " " .  $yearNummber);
                           break;
                    case '09':
                            echo($list[8] . " " . date("d") . " " .  $yearNummber);
                           break; 
                    case '10':
                            echo($list[9] . " " . date("d") . " " .  $yearNummber);
                           break; 
                    case '11':
                            echo($list[10] . " " . date("d") . " " .  $yearNummber);
                           break; 
                    case '12':
                            echo($list[11] . " " . date("d") . " " .  $yearNummber);
                           break;                          


                }
              
                      

                function NextMonth()
                {
                    $cure = $_COOKIE["ViewMonthData"];
                    $yearNummber =  $_COOKIE["ViewYearData"];
                    if($cure == 12)
                    {
                        $cure = 0;
                        setcookie("ViewYearData", $yearNummber + 01, time() + 2  * 24 * 60 * 60);
                    }
                   setcookie("ViewMonthData", $cure + 01, time() + 2  * 24 * 60 * 60);
                }

                function PrevMonth()
                {
                    $cure = $_COOKIE["ViewMonthData"];
                    $yearNummber =  $_COOKIE["ViewYearData"];
                    if($cure == 1)
                    {
                        $cure = 13;
                        setcookie("ViewYearData", $yearNummber - 01, time() + 2  * 24 * 60 * 60);
                    }
                   setcookie("ViewMonthData", $cure - 01, time() + 2  * 24 * 60 * 60);
                }



                function AddCalData()
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "callander";
                    $id = $_COOKIE["useData"];
                    $da =   '
                    {
                        "date": "30-03-2022",
                        "time": "18:40",
                        "data": "Hello this is my apointment"
                      }
                    ';



                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "INSERT INTO callanderdata (user_ida, dataa)
                    VALUES ('$id', ' $da')";

                    if ($conn->query($sql) === TRUE) {
                  
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();

                }


                if(array_key_exists('NextMonth', $_POST)) {
                    NextMonth();
                    header('Refresh: 1; url=index.php');
                }
                else if(array_key_exists('LastMonth', $_POST)) {
                    PrevMonth();
                    header('Refresh: 1; url=index.php');
                }else if(array_key_exists('AddToAppointments', $_POST)) {
                    AddCalData();
                 
                }
                



          ?>    </div>    
            <div class="clock" id="Clock">
            <?php
          
         
          $date = $strDate[3] . "-" . date("m") . "-" . date("d");

 
          $unixTimestamp = strtotime($date);
          
       
          $dayOfWeek = date("l", $unixTimestamp);

          switch ($dayOfWeek) {
            case 'Monday':
                echo("Montag");
                break;
            case 'Tuesday':
                echo("Dienstag");
      
                break;
            case 'Wednesday':
                
                echo("Mittwoch");
                break;
            case 'Thursday':
                echo("Donnerstag");
                break;
            case 'Friday':
                echo("Freitag");
                break;
            case 'Saturday':
                echo("Samstag");
                break;
            case 'Sunday':

                echo("Sonntag");
                break;
        }


    ?> 
         
            </div>
</section>

<section> 
    <div id="container" class="GridCOntainer">

   
       
   
    

        <div class="header" id="Monday">Montag       
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
         $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':

                                if($da == date("d"))
                                {
                                    
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cellCurent'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();

                                }else{

                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cell');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                }



                                break;
                            case 'Tuesday':
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellHidden');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                                break;
                            case 'Wednesday':
                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cellHidden');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                    break;
                                case 'Thursday':
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cell'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cellHidden');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
                                        break;
                                case 'Friday':
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cellHidden');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                            break;
                                    case 'Saturday':
                                                $element = $dom->createElement('div',
                                                $da);
                                               
                                  
                                             $attr = $element->setAttributeNode(
                                                       new DOMAttr('class', 'cell'));
                                
                                
                                
                                       
                                                $element->setAttribute('class', 'cellHidden');
                                                $dom->appendChild($element);
                                
                                                echo $dom->saveHTML();
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{
                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Monday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Monday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }




                 
                    }

            
                }

          
          ?> </div>
        <div class="header" id="Theusday">Dienstag
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                                if($da == date("d"))
                                {
                                    
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cellCurent'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();

                                }else{

                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cell');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                }


                      
                                break;
                            case 'Wednesday':
                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cellHidden');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                    break;
                                case 'Thursday':
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cell'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cellHidden');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
                                        break;
                                case 'Friday':
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cellHidden');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                            break;
                                    case 'Saturday':
                                                $element = $dom->createElement('div',
                                                $da);
                                               
                                  
                                             $attr = $element->setAttributeNode(
                                                       new DOMAttr('class', 'cell'));
                                
                                
                                
                                       
                                                $element->setAttribute('class', 'cellHidden');
                                                $dom->appendChild($element);
                                
                                                echo $dom->saveHTML();
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Tuesday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Tuesday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }


            
                }

          
          ?> 
        </div> 
        <div class="header" id="Wednesday">Mittwoch
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                             
                      
                                break;
                            case 'Wednesday':
                                if($da == date("d"))
                                {
                                    
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cellCurent'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();

                                }else{

                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cell');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                }

                                    break;
                                case 'Thursday':
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cell'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cellHidden');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
                                        break;
                                case 'Friday':
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cellHidden');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                            break;
                                    case 'Saturday':
                                                $element = $dom->createElement('div',
                                                $da);
                                               
                                  
                                             $attr = $element->setAttributeNode(
                                                       new DOMAttr('class', 'cell'));
                                
                                
                                
                                       
                                                $element->setAttribute('class', 'cellHidden');
                                                $dom->appendChild($element);
                                
                                                echo $dom->saveHTML();
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Wednesday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Wednesday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }

                }

          
          ?> 
        

        </div>
        <div class="header" id="Thursday">Donnerstag
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                             
                      
                                break;
                            case 'Wednesday':
                                

                                    break;
                                case 'Thursday':
                                    if($da == date("d"))
                                {
                                    
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cellCurent'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();

                                }else{

                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cell'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cell');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
                                }
                                        break;
                                case 'Friday':
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cellHidden');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                            break;
                                    case 'Saturday':
                                                $element = $dom->createElement('div',
                                                $da);
                                               
                                  
                                             $attr = $element->setAttributeNode(
                                                       new DOMAttr('class', 'cell'));
                                
                                
                                
                                       
                                                $element->setAttribute('class', 'cellHidden');
                                                $dom->appendChild($element);
                                
                                                echo $dom->saveHTML();
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Thursday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Thursday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }

            
                }

          
          ?> 
        

        </div>
        <div class="header" id="Friday">Freitag
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                             
                      
                                break;
                            case 'Wednesday':
                                

                                    break;
                                case 'Thursday':
                                    
                                        break;
                                case 'Friday':
                                    if($da == date("d"))
                                    {
                                        
                                    $element = $dom->createElement('div',
                                    $da);
                                   
                      
                                 $attr = $element->setAttributeNode(
                                           new DOMAttr('class', 'cellCurent'));
                    
                    
                    
                           
                                    $element->setAttribute('class', 'cell');
                                    $dom->appendChild($element);
                    
                                    echo $dom->saveHTML();
    
                                    }else{
    
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cell'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cell');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
                                    }
                                            break;
                                    case 'Saturday':
                                                $element = $dom->createElement('div',
                                                $da);
                                               
                                  
                                             $attr = $element->setAttributeNode(
                                                       new DOMAttr('class', 'cell'));
                                
                                
                                
                                       
                                                $element->setAttribute('class', 'cellHidden');
                                                $dom->appendChild($element);
                                
                                                echo $dom->saveHTML();
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Friday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Friday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }

                }



          
          ?> 

        
        </div>
        <div class="header" id="Saturday">Samstag
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                             
                      
                                break;
                            case 'Wednesday':
                                

                                    break;
                                case 'Thursday':
                                    
                                        break;
                                case 'Friday':
                           
                                            break;
                                    case 'Saturday':
                                        if($da == date("d"))
                                        {
                                            
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cellCurent'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cell');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
        
                                        }else{
        
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cell');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                        }
                                                break;
                                    case 'Sunday':
                                                    $element = $dom->createElement('div',
                                                    $da);
                                                   
                                      
                                                 $attr = $element->setAttributeNode(
                                                           new DOMAttr('class', 'cell'));
                                    
                                    
                                    
                                           
                                                    $element->setAttribute('class', 'cellHidden');
                                                    $dom->appendChild($element);
                                    
                                                    echo $dom->saveHTML();
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Saturday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Saturday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }
  
                }


          
          ?> 


        </div>
        <div class="header" id="Sunday">Sonntag
        <?php

              
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = $_COOKIE["ViewMonthData"];
          $d=cal_days_in_month(CAL_GREGORIAN,$monthNummber,$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . $monthNummber . "-" .  $da;

       
                    $unixTimestamp = strtotime($date);
                    
                 
                    $dayOfWeek = date("l", $unixTimestamp);
            
                    
            
            
                    $dom = new DOMDocument('1.0', 'iso-8859-1');
              
                        
                    $dom->validateOnParse = true;
               
                    if($da == 1)
                    {
                        switch ($dayOfWeek) {
                            case 'Monday':
                                

                               

                                break;
                            case 'Tuesday':
                             
                      
                                break;
                            case 'Wednesday':
                                

                                    break;
                                case 'Thursday':
                                    
                                        break;
                                case 'Friday':
                           
                                            break;
                                    case 'Saturday':
                                       
                                                break;
                                    case 'Sunday':
                                        if($da == date("d"))
                                        {
                                            
                                        $element = $dom->createElement('div',
                                        $da);
                                       
                          
                                     $attr = $element->setAttributeNode(
                                               new DOMAttr('class', 'cellCurent'));
                        
                        
                        
                               
                                        $element->setAttribute('class', 'cell');
                                        $dom->appendChild($element);
                        
                                        echo $dom->saveHTML();
        
                                        }else{
        
                                            $element = $dom->createElement('div',
                                            $da);
                                           
                              
                                         $attr = $element->setAttributeNode(
                                                   new DOMAttr('class', 'cell'));
                            
                            
                            
                                   
                                            $element->setAttribute('class', 'cell');
                                            $dom->appendChild($element);
                            
                                            echo $dom->saveHTML();
                                        }
                                                    break;
                            
                        
                        }
      
                    }else{


                        if($da == date("d"))
                        {
                            if($dayOfWeek == "Sunday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cellCurent');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }else{
                            if($dayOfWeek == "Sunday")
                            {
                                $element = $dom->createElement('div',
                                $da);
                               
                  
                             $attr = $element->setAttributeNode(
                                       new DOMAttr('class', 'cell'));
                
                
                
                       
                                $element->setAttribute('class', 'cell');
                                $dom->appendChild($element);
                
                                echo $dom->saveHTML();
                            }
                        }


                    
    


                 
                    }

            
                }

          
          ?> 
        
        
        </div>
       

     


    


    </div>


<form method="post">
   
    <input type="submit" name="LastMonth" class="right" value="Zurück" > 
    <input type="submit" name="AddToAppointments" class="TopShowRight" value="asdass" > 
    <input type="submit" name="NextMonth" class="left" value="Nächste" > 
</form>


 
 
    <button id="BackTodateButton" class="TopHidden" onclick="getCurentDate()">Zurück zu Heute</button>



</section>

<scrip src = "CollorChanger.php"></script>
    
</body>









</html>

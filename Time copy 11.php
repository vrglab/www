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



<div class="form" >

<form name="Termin" method="post">
    <input name="clr" type="color" style="
        position: relative;
        left: 62px;
    ">
    <input name="txts" type="text">
    <input name="timesd" type="time" style="
        position: relative;
        left: 2px;
        top: 6px;
    ">
    <input name="timeds" type="time" style="
        position: relative;
        left: 29px;
        top: 6px;
    ">
    <select name="catagory" style="
        position: relative;
        left: 4px;
        top: 10px;
    ">
    <option value="norm">Normal</option>

    <?php 
        $date = "1_" . $_COOKIE['ViewMonthData'] . "_" . $_COOKIE['ViewYearData'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "callander";
        $id = $_COOKIE["useData"];
        $existings = [];
        $dom = new DOMDocument('1.0', 'iso-8859-1');
                    
                                
        $dom->validateOnParse = true;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, user_ida, Dataa FROM catagory";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {


                    if(in_array($row['id'], $existings) == false)
                    {

                        if($row['user_ida'] == $_COOKIE['useData'])
                        {
    
    
    
    
    
    
    
                            $jobj = json_decode($row['Dataa'], true);
                        
                        
    
    
                                 
                                    $element = $dom->createElement('option', $jobj['Texta']);
    
                                                                   
                                    $element->setAttribute('value',$row['id'] );
    
                                    $dom->appendChild($element);
                                                
                                    echo $dom->saveHTML();
    
    
                                    array_push($existings, $row['id']);
                            
                        }
                    }


                }
            } else {
        
            }
            $conn->close();
    
    ?>
    </select>
    <input name="submitCreation" type="submit" style="position: relative;left: 42px;top: 10px;">

</form>





</div>




<div class="form" style="
    position:  relative;
    left: 300px;
    top: -112px;
    width: 175px;
">

<form name="Cata" array_intersect_ukey method="post">
    
    <label for="Cata" style="
    position: relative;
    top: -8px;
    left: 55px;
    color: white;
">Katagorie</label>


    <input name="crs" type="color" style="
        position: relative;
        left: -3px;
        top: 22px;
    ">
    <input name="txtss" type="text" style="
    position: relative;
    top: 25px;
">


    </select>
    <input name="Cat" type="submit" value="submit" style="position: relative;left: 60px;top: 30px;">

</form>






</div>

<a href="index.php">Zurück</a>



<div id="Termines">




<?php
        $date = "11_" . $_COOKIE['ViewMonthData'] . "_" . $_COOKIE['ViewYearData'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "callander";
        $id = $_COOKIE["useData"];
        $shouldReset = false;
        $jsondat = "";
        $existings = [];
        $existingElements = [];
        $clr = false;

        $conn = new mysqli($servername, $username, $password, $dbname);


        $dom = new DOMDocument('1.0', 'iso-8859-1');
                    
                                
        $dom->validateOnParse = true;

            foreach ($_POST as &$key) {


           
                if(strpos($key, "Delete:"))
                {
                $std = explode(" ", $key , 200);
                $notstd = $std[2];
                
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // sql to delete a record
                    $sql = "DELETE FROM callanderdata WHERE id=$notstd";
                    
                    if ($conn->query($sql) === TRUE) {
                    
                    } else {
                    
                    }
                    
                    $conn->close();


                }



              
                if(strpos($key, "Update:"))
                {
               
                    


                    $std = explode(" ", $key , 200);
                    $notstd = $std[2];

                
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }



                        $a= array("userid"=> $_COOKIE['useData'],"Texta" => $_POST['txtsr'], "Color" => $_POST['clrr'], "TimeclockFrom" => $_POST['timesdr'], "TimeclockTo" => $_POST['timedsr'], "date" =>  $date, "catagory" => $_POST['catagoryr']);
                        $jsondat = json_encode($a);

                        // sql to delete a record
                        $sql = "UPDATE callanderdata SET dataa= $jsondat WHERE id=$notstd";
                      
                        if ($conn->query($sql) === TRUE) {

                        } else {
                        
                        }
                        
                        $conn->close();


                }
            
                
            }
            if(array_key_exists('crs',$_POST ))
            {
                $aa= array("userid"=> $_COOKIE['useData'],"Texta" => $_POST['txtss'], "Color" => $_POST['crs']);
                $jsondatt = json_encode($aa);


                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
    
                    $sql = "INSERT INTO catagory (user_ida, Dataa)
                    VALUES ('$id', ' $jsondatt')";
             
    
    
                    $children = $dom->childNodes;
                    for($i = $children->length; $i--;) {
                        $child = $children->item($i);
                    
                            $dom->removeChild($child);
                        
                    } 
    
    
                                            
                    if ($conn->query($sql) === TRUE) {
                    
             
                
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    
                    $conn->close();
    


            }

            if(array_key_exists('clr', $_POST)) {







                $a= array("userid"=> $_COOKIE['useData'],"Texta" => $_POST['txts'], "Color" => $_POST['clr'], "TimeclockFrom" => $_POST['timesd'], "TimeclockTo" => $_POST['timeds'], "date" =>  $date, "catagory" => $_POST['catagory']);
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

                                        $sql = "SELECT id, user_ida, dataa FROM callanderdata";
                                        $result = $conn->query($sql);

                                     
                                            if ($result->num_rows > 0) {

                                                while($row = $result->fetch_assoc()) {

                                                    
                                          

                                                  

                                                  
                                                        if($row['user_ida'] == $_COOKIE['useData'])
                                                        {
        
        
        
        
        
        
        
                                                            $jobj = json_decode($row['dataa'], true);




                                                            if(in_array($row['dataa'],  $existings) == false)
                                                            {
                                                                if($jobj['date'] == $date)
                                                                {
            
            
                                                                    if($jobj['catagory'] == "norm")
                                                                    {
                                                                        $element = $dom->createElement('div', $jobj['Texta']);
            
                                                                        $elementSS = $dom->createElement('form');

                                                                
                                                                        $elementSAA = $dom->createElement('input');


                                                                        


            
                                                                        $elementS = $dom->createElement('form', "Löschen");
                                                
                                                                        $elementSA = $dom->createElement('input');

                                                                        $elementta = $dom->createElement('div', "von ". $jobj['TimeclockFrom'] . ' bis ' .  $jobj['TimeclockTo'] );
                                                                    
                                                        
                                                                    $attr = $element->setAttributeNode(
                                                                            new DOMAttr('style', 'cellCurent'));
                                                
                                                        
                                                        
                                                                        
                                                
                                                                                $elementSA->setAttribute('style',  '    Color: transparent;
                                                                                background: transparent;
                                                                                text-align: center;
                                                                                position: relative;
                                                                                width: 102px;
                                                                                height: 29px;
                                                                                left: -74px;
                                                                        
                                                                                ');

                                                                                $elementta->setAttribute('style',  '     
                                                                                position: relative;
                                                                                top: -60px;;');




                                                                              
                                                
                                                
                                                                                $elementS->setAttribute('class',  'bs');
                                                
                                                                                $elementSA->setAttribute('type',  'submit');
                                                
                                                                                $elementSA->setAttribute('value',  ' Delete: ' . $row['id']);
                                                                                $elementSA->setAttribute('name',  ' Delete: ' . $row['id']);
                                                
                                                
                                                
                                                                                $elementS->setAttribute('method',  'post');
            
            
            
            
            
            
                                                                                $elementSAA->setAttribute('style',  '    Color: transparent;
                                                                                background: transparent;
                                                                                color: transparent;
                                                                                text-align: center;
                                                                                position: relative;
                                                                                width: 119px;
                                                                                height: 29px;
                                                                                left: -117px;
                                                                              
                                                                                ');
                                      



                                                
                                                
                                                
                                                                                $elementS->setAttribute('method',  'post');
                                                                        
                                                                            
                                                            
                                                                        $element->setAttribute('style', 'border: 1px solid ' . $jobj['Color'] .";" 
                                                                    
                                                                            .
                                                                
                                                                            "background: " . $jobj['Color'] .";".
                                                                        
                                                                        
                                                                            "color: white;
                                                                            text-align: center;
                                                                            font-size: 23px;
                                                                            height: 54px;
                                                                            margin: 25px;
                                                                            " );
                                                
                                                
                                                                        
                                                                            $elementS->appendChild($elementSA);
                                                
                                                                            $elementSS->appendChild($elementSAA);
                                                
                                                
                                                                            $element->appendChild($elementS);
                                                          
                                                                            
                                                
                                                                            $element->appendChild($elementSS);
                                                                            $element->appendChild($elementta);


                                                                  
                                                                            $dom->appendChild($element);
                                                        
                                                                            echo $dom->saveHTML();

                                                                      
                                                                            $dom->removeChild($element);
                                                        
                                                                            echo $dom->saveHTML();
                                                                      
                                                                        array_push($existings, $row['dataa']);
            
            
            
            
            
                                                                    }else
                                                                    {
            
                                                                        $sqls = "SELECT id, user_ida, Dataa FROM catagory";
                                                                        $results = $conn->query($sqls);
            
            
                                                                        if ($results->num_rows > 0) 
                                                                        {
                                                                            while($rows = $results->fetch_assoc())
                                                                            {
                                                                                if($rows['user_ida'] == $_COOKIE['useData'])
                                                                                {
                                                                                   


                                                                                 
                                                                                   

                                                                             
                                                                                    $jobjs = json_decode($rows['Dataa'], true);

                                                                          
                                                                                
                                                                                    if($jobj['catagory'] ==  $rows['id'])
                                                                                    {

                                                                                     
                                                                                        $element = $dom->createElement('div', $jobj['Texta']);
            
                                                                                        $elementSS = $dom->createElement('form');
                
                                                                                
                                                                                        $elementSAA = $dom->createElement('input');
                
                
                                                                                        
                
                
                            
                                                                                        $elementS = $dom->createElement('form', "Löschen");
                                                                
                                                                                        $elementSA = $dom->createElement('input');
                
                                                                                        $elementta = $dom->createElement('div', "von ". $jobj['TimeclockFrom'] . ' bis ' .  $jobj['TimeclockTo'] );
                                                                                    
                                                                        
                                                                                    $attr = $element->setAttributeNode(
                                                                                            new DOMAttr('style', 'cellCurent'));
                                                                
                                                                        
                                                                        
                                                                                        
                                                                
                                                                                                $elementSA->setAttribute('style',  '    Color: transparent;
                                                                                                background: transparent;
                                                                                                text-align: center;
                                                                                                position: relative;
                                                                                                width: 102px;
                                                                                                height: 29px;
                                                                                                left: -74px;
                                                                                        
                                                                                                ');
                
                                                                                                $elementta->setAttribute('style',  '     
                                                                                                position: relative;
                                                                                                top: -60px;;');
                
                
                
                
                                                                                              
                                                                
                                                                
                                                                                                $elementS->setAttribute('class',  'bs');
                                                                
                                                                                                $elementSA->setAttribute('type',  'submit');
                                                                
                                                                                                $elementSA->setAttribute('value',  ' Delete: ' . $row['id']);
                                                                                                $elementSA->setAttribute('name',  ' Delete: ' . $row['id']);
                                                                
                                                                
                                                                
                                                                                                $elementS->setAttribute('method',  'post');
                            
                            
                            
                            
                            
                            
                                                                                                $elementSAA->setAttribute('style',  '    Color: transparent;
                                                                                                background: transparent;
                                                                                                color: transparent;
                                                                                                text-align: center;
                                                                                                position: relative;
                                                                                                width: 119px;
                                                                                                height: 29px;
                                                                                                left: -117px;
                                                                                              
                                                                                                ');
                                                      
                
                
                
                                                                
                                                                
                                                                
                                                                                                $elementS->setAttribute('method',  'post');
                                                                                        
                                                                                            
                                                                            
                                                                                        $element->setAttribute('style', 'border: 1px solid ' . $jobjs['Color'] .";" 
                                                                                    
                                                                                            .
                                                                                
                                                                                            "background: " . $jobjs['Color'] .";".
                                                                                        
                                                                                        
                                                                                            "color: white;
                                                                                            text-align: center;
                                                                                            font-size: 23px;
                                                                                            height: 54px;
                                                                                            margin: 25px;
                                                                                            " );
                                                                
                                                                
                                                                                        
                                                                                            $elementS->appendChild($elementSA);
                                                                
                                                                                            $elementSS->appendChild($elementSAA);
                                                                
                                                                
                                                                                            $element->appendChild($elementS);
                                                                          
                                                                                            
                                                                
                                                                                            $element->appendChild($elementSS);
                                                                                            $element->appendChild($elementta);
                
                
                                                                                  
                                                                                            $dom->appendChild($element);
                                                                        
                                                                                            echo $dom->saveHTML();
                
                                                                                      
                                                                                            $dom->removeChild($element);
                                                                        
                                                                                            echo $dom->saveHTML();
                                                                                      
                                                                                        array_push($existings, $row['dataa']);

                                                                                    }

                                                                                 
                        
                                                                                }
                                                                            }
                                                                        }else{
                                                                
                                                                        }
                                                                    }
            
            
            
            
            
                                                                
                                                                }
                                                            }else{
                                                           
                                                            }

                                                        
                                                          
                                                        }
                                                    




                                                   
                                                }
                                            } else {
                                        
                                            }
                                        

                                    
                                        $conn->close();


?>

</div>






                </body>

</html>

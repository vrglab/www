<!DOCTYPE html> 

<meta name="viewport" content="width=device-width, initial-scale=0.5">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Calander</title>
<html lang="de">

 <link rel="stylesheet"  href="style.css"> 


<body id="body" class="Norm">



<section >   
        <div class="info" id = "Month">    <?php
          
          
          
          


                $list = ["","","Mär"];
                $strDate =  explode(" ", date("year"), 8);
           
                $monthNummber = date("m");

                switch ($monthNummber) {
                    case '01':
                       
                        break;

                    case '02':
                       
                        break;  

                    case '03':
                         echo($list[2] . " " . date("d") . " " .  $strDate[3]);
                        break;                 


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
           
          $monthNummber = date("m");
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


        
            

          

          
          ?> </div>
        <div class="header" id="Theusday">Dienstag
        <?php
          
          $strDate =  explode(" ", date("year"), 8);
           
          $monthNummber = date("m");
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
           
          $monthNummber = date("m");
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
           
          $monthNummber = date("m");
          $d=cal_days_in_month(CAL_GREGORIAN,date("m"),$strDate[3]);




                for ($i=0; $i < $d; $i++) { 
                    $da = $i + 1;

                    $date = $strDate[3] . "-" . date("m") . "-" .  $da;

       
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
           
          $monthNummber = date("m");
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
           
          $monthNummber = date("m");
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
           
          $monthNummber = date("m");
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

    <button class="right" onclick="GetPreviousMonth()">Zurück</button>
    <button class="left" onclick="GetNextMonth()">Nächste</button>
    <button id="BackTodateButton" class="TopHidden" onclick="getCurentDate()">Zurück zu Heute</button>



</section>

<scrip src = "Scripts/CDate.php"></script>
    
</body>









</html>

<html>
   
   <head>
      <title>PHP Form Validation</title>
   </head>
   
   <body>
      <?php
         
         // define variables and set to empty values
         $address_from = $postal_from = $address_to = $postal_to = $date = $priority = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $address_from = test_input($_POST["address_from"]);
            $postal_from = test_input($_POST["postal_from"]);
            $address_to = test_input($_POST["address_to"]);
            $postal_to = test_input($_POST["postal_to"]);
            $date = test_input($_POST["date"]);
            $time = test_input($_POST["time"]);
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
   
      <h2>User Request Form</h2>
      
      <form method = "post" action = "adminView.html">
         <table>
            <tr>
               <td>Address From:</td> 
               <td><input type = "text" name = "address_from"></td>
            </tr>
            
            <tr>
               <td>Postal From:</td>
               <td><input type = "text" name = "postal_from"></td>
            </tr>
            
            <tr>
               <td>Address To:</td>
               <td><input type = "text" name = "address_to"></td>
            </tr>
            
            <tr>
               <td>Postal To:</td>
               <td><input type = "text" name = "postal_to"></td>
            </tr>
            
            <tr>
               <td>Date:</td>
               <td><input type = "date" name = "date"></td>
            </tr>

            <tr>
               <td>Time:</td>
               <td><input type = "time" name = "time"></td>
            </tr>
            
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
         </table>
      </form>
      
   </body>
</html>
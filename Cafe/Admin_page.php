<html>
<head>
  <title>Admin Page</title>
  <style type="text/css">
    table{
      border-collapse: collapse;
      width: 100%;
      color: red;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }

    th{
      background-color: blue;
      color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2;}

    .btnd: hover {
      background-color: blue;
      color: white;
    }

  </style>

  <script type="text/javascript">
    function display_data() {

      var btn = document.getElementById("btn_dis");
      var t1 = document.getElementById("t1");
      var btn2 = document.getElementById("btn_hide");

     //t1.style.visibility = "visible";
      //btn2.src = "despok.jpg";

      btn.style.color= "red";


    }

  </script>

</head>
<body style="background-color: powderblue;">

  <h1>ADMIN CONTROLS</h1>

  <br><br>
<form method="post">
  <fieldset>
    <legend>Manipulate Data</legend>
    <button class="btnd" style="margin-right: 30px; background-color: lightgreen; font-size: 20px;" onclick="display_data()" id="btn_dis" name="btn_dis1">Display Data</button>
  <label>Enter Mobile No: </label>
  <input type="text" name="ph_info" >
  <button style="margin-left: 30px;"  >Update</button>
  <button name="del_btn" style="margin-left: 30px; ">Delete</button>
</fieldset><br>
  <fieldset>
    <legend>Send Receipt</legend>
   <label>Enter Email Id: </label> 
  <input type="text" name="emailidt" hint="Enter Email">
  <button name="mailbtn" style="margin-left: 30px;">Send Mail</button>
</fieldset><br>
  
</form>

  <div class="table" >

    <br><table id="t1">
    <tr>
      <th>first_name</th>
      <th>last_name</th>
      <th>mob</th>
      <th>payment</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'user_db');
    if($conn-> connect_error){
      die("connection failed:". $conn->connect_error);
    }

    if (isset($_POST['btn_dis1'])) {
      
    $sql = "SELECT first_name, last_name, mob, payment from user_details";
    $result = $conn->query($sql);

    if ($result-> num_rows >= 0) {
      while ($row = $result-> fetch_assoc()) {
        echo "<tr><td>". $row["first_name"] ."</td><td>" . $row["last_name"] ."</td><td>" . $row["mob"] ."</td><td>" . $row["payment"] ."</td><tr>";
      }
     echo"</table>";
    }
    else {
      echo "0 result";
    }

    
    

    $conn-> close();
  }

    if(isset($_POST['del_btn'])){
    $ph = $_POST['ph_info'];

    $sql = "DELETE FROM user_details WHERE mob = '$ph'";
    if ($conn->query($sql)==TRUE) {
      echo "record deleted successfully";
      
    }
    else{
      echo "Error deleting record:" . $conn->error;
    }

    $conn->close();
  }     


  if (isset($_POST['mailbtn'])) {
    $to_email = $_POST['emailidt'];
    $subject ="Canteen Receipt";
    $body = "Thankyou for using this website and plz stay the fuck out of canteen thankyou.";
    $headers="From: rahul2000pune@gmail.com";

    if(mail($to_email, $subject, $body, $headers)){
      echo "Email successfully sent to $to_email...";
    } else{
      echo "Email sending failed...";
    }
  }
    ?>
    
  </table>

  </div>

  
</body>
</html>

<html></html>
    <head>
        <title>MEDICINE FINDER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          body{
            background-image: url('bg.jpeg');           
          }
          .wholepage{
            display: flex;
          
           justify-content: end;
           flex-direction: row;
          }
          h1{
                margin: 30px;
                color: palevioletred;
                background-color: rgb(7, 6, 6);
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
            }
            h4{
                background-color: orange;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
            button{
                padding: 10px;
                margin: 20px;
                background-color: rgb(0, 242, 255);
                color: black;
                border-radius: 30px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: larger;
                border-color: rgb(52, 3, 168);
            }
            button:hover{
                transition: 0.5s ease-in-out;
                background-color:orangered;
                padding:15px;
                
                border: 5px solid black;
            }
            button:not(:hover){
                 transition: 0.5s ease-in-out;
            }
            input{
            margin: 10px;
            padding: 10px;
          }
          label.label1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          }
          .container1{
            width:fit-content;
            height: fit-content;
            background-color:burlywood ;
            align-content: center;
            margin: 40px;
            padding: 40px;
            border: 2px solid black;
          }
          .container2{
           
            width:fit-content;
            height: fit-content;
            background-color:burlywood ;
            align-content: center;
            margin: 50px;
            padding: 40px;
            border: 2px solid black;
            
          }
          td{
            padding:5px;
          }

          table{
            border:5px solid black;
            background-color:coral ;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin:5px;
          }
          h5{
                background-color: chartreuse;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
            .container2 label{
            color:seagreen;
         }
        </style>
    </head>
    <body>
    <center><h1>MEDI-GUIDE</h1></center>
        <div class="wholepage">
            <center>
            
            <div class="container1">
                <h4>GENERIC MEDICINE FINDER</h4>
                <form method="post" action="">
                <div>
                <label class="label1" >ENTER MEDICINE NAME</label>                
                <input type="text" name="name" required>
                </div> 
                <button type="submit" name="submit">SEARCH</button>
                <button type="reset" name="reset">CLEAR</button>
                <?php
if(isset($_POST['submit'])) {
    $medicinename = $_POST['name'];
    $mycon = mysqli_connect("localhost", "root", "", "mediguide");
     

    
    // First query to fetch medicine details
    $sql = "SELECT * FROM alternatives WHERE name='$medicinename'";
    $result = $mycon->query($sql);
    $n = mysqli_num_rows($result);

    if($n > 0) {
        while($row = mysqli_fetch_row($result)) {
            echo "<br>";  
            echo "<br>";
            echo "<table border=2px black >";
            echo "<tr><td>MEDICINE NAME: $row[0]<br></td></tr>";

            // Second query to fetch price for the main medicine
            $sql2 = "SELECT * FROM prices WHERE name='$row[0]'";
            $result2 = $mycon->query($sql2);
            $n2 = mysqli_num_rows($result2);

            if($n2 > 0) {
                $row2 = mysqli_fetch_row($result2);
                echo "<tr><td><center>PRICE : RS $row2[2]<br></center></td></tr>";
                echo "</table>";
                echo "<br>";
                echo "<br>";
            } else {
                echo "<table><tr><td><center> No price found for $row[0]<br></center></td></tr></table>";
            }

            // Display alternative medicines and fetch their prices
            for ($i = 1; $i <= 5; $i++) {
                if (!empty($row[$i])) {
                    echo "<table border=2px black >";
                    echo "<tr><td>ALTERNATIVE MEDICINE NAME: $row[$i]<br></td></tr>";

                    // Query to fetch price for each alternative medicine
                    $sql3 = "SELECT * FROM prices WHERE name='$row[$i]'";
                    $result3 = $mycon->query($sql3);
                    $n3 = mysqli_num_rows($result3);

                    if($n3 > 0) {
                        $row3 = mysqli_fetch_row($result3);
                        echo "<tr><td><center>PRICE : RS $row3[2]<br></center></td></tr>";
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";
                    } else {
                        
                        echo "<tr><td>No price found for $row[$i]<br></td></tr>";
                    }
                }
            }

            echo "THANK YOU FOR USING OUR APPLICATION";
        }
    } else {
        echo "<br>";
        echo "PLEASE ENTER CORRECT MEDICINE NAME";
    }

    mysqli_close($mycon);
}
?>

                </form>
            </div>
            
            </center>
            <div class="container2">
                <h5>Medicine Availability<br> in Pharmacies</h5>
             <center>
            <?php
            if(isset($_POST['submit'])) {
                $medicinename = $_POST['name'];
                $mycon = mysqli_connect("localhost", "root", "", "mediguide");
           //Medicine Available or not in medical stores
    $sql100 = "SELECT * FROM pharmacy_vaishnavpharmacy WHERE medicinename='$medicinename'";
    $result100 = $mycon->query($sql100);
    $n100 = mysqli_num_rows($result100);

    if($n100 > 0) {
       
        echo "<table>";
        
        echo "<tr><td><marquee><label><a href='https://www.google.com/maps/place/Apollo+Pharmacy+VV+Nagar+Allapur/@17.4591438,78.399468,19.79z/data=!4m6!3m5!1s0x3bcb910037f0c2cd:0x4c4ca02c9199b7e!8m2!3d17.4591564!4d78.3994886!16s%2Fg%2F11vxyzrcb6?entry=ttu&g_ep=EgoyMDI0MTAwMi4xIKXMDSoASAFQAw%3D%3D'>Kishore Pharmacy</a></label></marquee></td></tr>";
        
        echo " <tr><td>Medicine Available</td></tr>";
        echo "<br>";
        echo "<br>";
    } else {
        echo "<table>";
        
        echo "<tr><td><label>Kishore Pharmacy</label></td></tr>";
        
        echo " <tr><td>Medicine Not Available</td></tr>";
        echo "<br>";
        echo "<br>";
    }
    $sql100 = "SELECT * FROM pharmacy_kishorepharmacy WHERE medicinename='$medicinename'";
    $result100 = $mycon->query($sql100);
    $n100 = mysqli_num_rows($result100);

    if($n100 > 0) {
       
        echo "<table>";
        
        echo "<tr><td><marquee><label><a href='https://www.google.com/maps/place/Apollo+Pharmacy+VV+Nagar+Allapur/@17.4591438,78.399468,19.79z/data=!4m6!3m5!1s0x3bcb910037f0c2cd:0x4c4ca02c9199b7e!8m2!3d17.4591564!4d78.3994886!16s%2Fg%2F11vxyzrcb6?entry=ttu&g_ep=EgoyMDI0MTAwMi4xIKXMDSoASAFQAw%3D%3D'>Vaishnav Pharmacy</a></label></marquee></td></tr>";
        
        echo " <tr><td>Medicine Available</td></tr>";
        echo "<br>";
        echo "<br>";
    } else {
        echo "<table>";
        
        echo "<tr><td><label>Durga Pharmacy</label></td></tr>";
        
        echo " <tr><td>Medicine Not Available</td></tr>";
        echo "<br>";
        echo "<br>";
        
    }

    $sql100 = "SELECT * FROM pharmacy_gopalpharmacy WHERE medicinename='$medicinename'";
    $result100 = $mycon->query($sql100);
    $n100 = mysqli_num_rows($result100);

    if($n100 > 0) {
       
        echo "<table>";
        
        echo "<tr><td><marquee><label><a href='https://www.google.com/maps/place/Apollo+Pharmacy+VV+Nagar+Allapur/@17.4591438,78.399468,19.79z/data=!4m6!3m5!1s0x3bcb910037f0c2cd:0x4c4ca02c9199b7e!8m2!3d17.4591564!4d78.3994886!16s%2Fg%2F11vxyzrcb6?entry=ttu&g_ep=EgoyMDI0MTAwMi4xIKXMDSoASAFQAw%3D%3D'>Gopal Pharmacy</a></label></marquee></td></tr>";
        
        echo " <tr><td>Medicine Available</td></tr>";
        echo "<br>";
        echo "<br>";
    } else {
        echo "<table>";
        
        echo "<tr><td><label>Gopal Pharmacy</label></td></tr>";
        
        echo " <tr><td>Medicine Not Available</td></tr>";
        echo "<br>";
        echo "<br>";
    }
}
            ?>
            </center>  
            </div>
        </div>
    </body>
</html>


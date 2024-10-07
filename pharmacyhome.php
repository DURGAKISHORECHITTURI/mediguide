<html>
    <head>
        <title>HOME PAGE</title>
        <style>
          body{
            background-image: url('bg.jpeg');           
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
                background-color: chartreuse;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
            p{
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
          .wholepage{
            display: flex;
            border: 5px solid black;
            padding: 10px;
          }
          .wholecontainer{
            width: fit-content;
            background-color: transparent;
            border: 3px solid rgb(5, 120, 197);
            border-radius: 20px;
            margin: 10px;
            padding: 20px;
          }
          .container1{
            width:fit-content;
            height: fit-content;
            background-color:burlywood ;
            align-content: center;
            margin: 30px;
            padding: 40px;
            border: 2px solid black;
          }
          .container2{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 30px;
          }

          .btn1{
            margin-top: 80px;
          }
          button{
                padding: 10px;
                margin: 20px;
                background-color: orange;
                color: black;
                border-radius: 30px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: larger;
                border-color: greenyellow;
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
        </style>
    </head>
    <body>
        <div class="wholepage">
            <div class="container2">
                <div><button class="btn1" onclick="window.location.href='pharmacydataentry.php'">DATA ENTRY</button></div>
                <div><button onclick="window.location.href='pharmacydatamodify.php'">DATA MODIFY</button></div>
                <div><button onclick="window.location.href='pharmacyexceldata.php'">DATA THROUGH EXCEL</button></div>
            </div>
            <div class="wholecontainer">
                <center>
                <h1>MEDI-GUIDE</h1>
                <NAV class="container1">
                    <h4>About MEDI-GUIDE</h4>
                    <i>MEDIGUIDE helps you to digitize your pharmacy.<br><br>
                    Whenever you want to check whether the medicine is available in your store.<br> 
                    You no longer need to search it in the shelves.<br>
                    You can go to our website to check the availability of the medicine.</i>
                </NAV>
                </center>
            </div>
        </div>
    </body>
</html>

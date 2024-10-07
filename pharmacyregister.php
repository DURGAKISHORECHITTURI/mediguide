<?php
include 'db_connection.php';
include 'functions.php';
?>
<style>
            body{
                background-image: url('bg.jpeg');
            }
            .wholepage{
                border: 3px solid black;
                margin: 5px;
            }
            h1{
                margin: 15px;
                color: palevioletred;
                background-color: rgb(7, 6, 6);
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
            }
            h3{
                background-color: chartreuse;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:10px;
            }
            input{
                margin: 5px;
                position: relative;
                padding: 5px;
            }
            .loginbutton{
                padding: 10px;
                margin: 10px;
                background-color: rgba(91, 202, 13, 0.79);
                color: black;
                border-radius: 30px;

            }
            .loginbutton:hover{
                transition: 0.5s ease-in-out;
                background-color:rgb(106, 248, 18);
                padding:15px;

            }
            .loginbutton:not(:hover){
                 transition: 0.5s ease-in-out;
            }

            button{
                padding: 10px;
                margin: 10px;
                background-color: orange;
                color: black;
                border-radius: 30px;

            }
            button:hover{
                transition: 0.5s ease-in-out;
                background-color:orangered;
                padding:15px;

            }
            button:not(:hover){
                 transition: 0.5s ease-in-out;
            }

        </style>

<body>
    <div class="wholepage">
        <center>
            <div>
                <h1>MEDI-GUIDE</h1>
                <h3>PHARMACY REGISTRATION</h3>
            </div>
            <div class="container">
                <form method="post" action="">
                    <div>
                        PHARMACY NAME<input type="text" name="name" required>
                    </div>
                    <div>
                        PHONE NUMBER<input type="text" name="phoneno" required>
                    </div>
                    <div>
                        EMAIL<input type="email" name="email" required>
                    </div>
                    <div>
                        PASSWORD<input type="password" name="password" required>
                    </div>
                    <div>
                        CONFIRM PASSWORD<input type="password" name="repassword" required>
                    </div>
                    <span>
                        <button type="submit" name="submit">SUBMIT</button>
                        <button type="reset" name="clear" onclick="window.location.href='pharmacyregister.php'">CLEAR</button>
                    </span>
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['name'];
                        $phoneno = $_POST['phoneno'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $password_confirm = $_POST['repassword'];

                        if (strcmp($password, $password_confirm) === 0) {
                            $sql = "INSERT INTO pharmacyregistration (pharmacyname, phoneno, email, password) VALUES (?, ?, ?, ?)";
                            $ps = $conn->prepare($sql);
                            $ps->bind_param("ssss", $username, $phoneno, $email, $password);
                            $ps->execute();

                            createUserTable($username);

                            echo "<br>DETAILS STORED SUCCESSFULLY<br>REGISTRATION SUCCESSFUL<br>LOGIN NOW";
                        } else {
                            echo "<br>Password does not match";
                        }
                    }
                    ?>
                </form>
                <div></div>
                <p>Already have an account?</p>
                <div>
                    <button onclick="window.location.href='pharmacylogin.php'" class="loginbutton">LOGIN</button>
                </div>
            </div>
        </center>
    </div>
</body>

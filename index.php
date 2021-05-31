<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="css/animation.css" rel="stylesheet" type="text/css"/>

        <title>Oba wenuwen api</title>
        <style>
            body{
                background: url(images/1.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                color:white;
            }
            .main-frame{
                border: 2px solid black;
                background-color: rgba(0,0,0,0.7);
                border-radius: 10px;
                padding: 20px;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%,-50%);

            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Oba wenuwen api</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="register.php">Registration</a></li>
                    <li><a href="view.php">View</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="main-frame">
                <div class="row">
                    <div class="col-md-12 slideInUp">
                        <!--web description will enter here-->
                        <center>
                            <h1>About Obawenuwen Api</h1>
                            <hr>
                            <br>
                        </center>
                        <br>
                        <p>We, the ICT students, determined to help all the folks in Sri  Lanka during this pandemic time if required. In this line of thinking we expect to portrait ones need with their consent to authorities to see them in real time through GIS mapping. For example, if one needs medicine, he/she can put a post at the geographical position where they live so that anyone, who is capable of delivering it can do so. In a worst situation the visibility for the MOH in the area for multiple people at any given time will be provided. The ICT students will help anyone without physical going to see them.</p>
                        <br><br>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 slideInUp">
                        <a href="register.php" class="btn btn-warning btn-block btn-lg" style="color:black;">Register</a>

                    </div>
                    <div class="col-md-6 slideInUp">
                        <a href="view.php" class="btn btn-primary btn-block btn-lg">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
             &copy; Supported by <a href="https://ictbus.online">ICTBUS</a> in collaboration with ICT FOR LIFE
        </div>
    </body>
</html>

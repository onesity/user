<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #main-headeing{
            font-size: xx-large;
            margin-right: 500px;
            margin-left: 60px;
            font-weight: bold;

        }
        #search{
            width: 300px;
            height: 40px;
            margin-left: 200px;
            border-radius: 10px;
            font-size: 18px;
            padding-left: 15px;
            color: lightcoral;
        }
        #total{
            margin-left: 50px;
            margin-top: -10px;
            margin-bottom: -10px;
        }
        .user-div{
            width: 98%;
            position: relative;
            height: 900px;
            border: 1px solid black;
            /* top: 40px; */
            padding-top: 40px;
            margin-left: 1%;
            /* display: flex; */
        }
        label{
            margin-top: 50px;
            margin-left: 30px;
        }
      
        #card{
            width: 250px;
            height: 350px;
            border: 1px solid black;
            float: left;
            margin-left: 60px;
            margin-top: 50px;
            border-radius: 10px;
            background-color: lightblue;
            
        }
        #no_data{
            text-align: center;
            color: orangered;
            margin-top: 15%;
        }
      #username,#email,#age,#phone{
        margin-left: 20px;
      }
      #image{
        width: 80px;
        height: 80px;
        border-radius: 50px;
        margin-top: 10px;
        margin-left: 10px;

      }
    </style>
    
</head>
<body>
    <span id="main-headeing">Live Search</span>
    <input type="text" name="search" id="search" placeholder="Search...">
    <br><br>
    <div class="user-div">
  
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<?php




?>
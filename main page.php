<!DOCTYPE html>
<html>
    <head>
        <title>main page</title>    
        <!-- <link rel="stylesheet" href="style.css"> -->
        <style>
            *{
                margin: 2;
                padding: 0;
                font-family: sans-serif;
            }
            .header{
                width: 100%;  
                min-height: 455px;
                background-image:url('com.jpg');
                background-position: center;
                background-size: cover;
                position: relative;
            }
            nav{
                display: flex;
                /* padding:0%; */
                justify-content: space-between;
                align-items: center;
            }
            .nav-links{
                flex: 1;
                text-align: right; 
                background-color: #ADD8E6;
            }
            .h9{
                background-color: #ADD8E6;
                list-style: none;
                display: inline-block;
                padding: 9px 12px;
                position: relative;
                font-size: 25px;
            }
            .nav-links a{
                list-style: none;
                display: inline-block;
                padding: 8px 12px;
                position: relative;
            }
            .nav-links a{
                color:rgb(17, 17, 17);
                text-decoration: none;
                font-size: 25px;
            }
            .nav-links a::after{
                content: '';
                width: 0;
                height: 2px;
                background:rgb(209, 25, 25);
                display: block;
                margin: auto;
                transition: 0.5s;
            }
            .nav-links a:hover::after{
                width: 100%;
            }
            .column{
                margin-top: 2%;
                display: flex;
                justify-content: space-between;
            }
            .row{
                flex-basis: 30%;
                font-size:20px;
                background: #E8ADAA;
                /* background:#990066; */
                /* background: #808000; */
               
                border-radius: 10px;
                margin-bottom: 2%;
                padding: 18px 15px;
                box-sizing:border-box;
            }
            .row:hover{
                box-shadow: 10px 10px 10px 10px rgb(41, 46, 48);
            }
            .footer{
                text-align: center;
            }
        </style>
    </head>
    <body style="background-color:#737CA1;">
        <section class="header">
            <nav>
                <h9 class="h9"><b>Online Complaint management system</b></h9>
                <div class="nav-links">
                    <a href="adminlogin.php">Admin</a>
                    <a href="user_login.php">User</a>
                    <a href="engineerlogin.php">Engineer</a>
                    <a href="contactus.php">Contact Us</a>
                </div>
            </nav>
        </section>
        <h1 style="text-align:center;  font-weight: 700;">Welcome to our website</h1>
        <section class="column">
            <div class="row">
                <p>You can complain directly to us for what you have been dealing with. Complaints are often sorted out immediately.</p>
            </div>
            <div class="row">
                <p>If you don't know who to contact,then call on 1234567890 for enquire purpose.</p>
            </div>
            <div class="row">
                <p>The best way to complaint,you can use our online complaint form.</p>
            </div>
        </section>
            <p style="text-align: center; color: rgb(8, 7, 8); font-size:20px;"><b>Your complaint will be recorder and dealt by the most appropriate engineer in your area.</b></p> <br><br><br>
        <section class="footer">
        <h2><b>About Us</b></h2>
        <p >We Are Building An Unique Technology Company<br>
            The problem is to build a complaint system which records the information regarding the complaints registered by a customer against the company.;<br> To Build A Place Where Anyone Can Register The Complaint And Hire Any  Help They Want.</p>
    </section>
        </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <title>Ajax POST request with JQuery and PHP</title>
        <style type="text/css">
        body {
        font-family: calibri;
        }
        .box {
        margin-bottom: 10px;
        }
        .box label {
        display: inline-block;
        width: 80px;
        text-align: right;
        margin-right: 10px;
        }
        .box input, .box textarea {
        border-radius: 3px;
        border: 1px solid #ddd;
        padding: 5px 10px;
        }
        .btn-submit {
        margin-left: 90px;
        }
        </style>
    </head>
    <body>
        <h2>Ajax POST request with JQuery and PHP - <a href="https://www.cluemediator.com" target="_blank">Clue Mediator</a></h2>
        <form>
            <div class="box">
            <label>First Name:</label><input type="text" name="firstName" id="firstName" />
            </div>
            <div class="box">
            <label>Last Name:</label><input type="text" name="lastName" id="lastName" />
            </div>
            <div class="box">
            <label>Email:</label><input type="email" name="email" id="email" />
            </div>
            <div class="box">
            <label>Message:</label><textarea type="text" name="message" id="message"></textarea>
            </div>
            <input id="submit" type="button" class="btn-submit" value="Submit" />
        </form>
        <p id="karthikeyan"></p>
    </body>
    <script>
        $(document).ready(function() {
            $("#submit").click(function(){
                
                var firstName = ["karthikeyan","monesh","hari","Logesh","jeol","jeyan"];
                
                $.ajax({
                    type: "POST",
                    url: "submission.php",
                    data: {
                    firstName: firstName
                    },
                    cache: false,
                    success: function(data) {
                        document.getElementById("karthikeyan").innerHTML=data;
                    },
                    error: function(xhr, status, error) {
                    console.error(xhr);
                    }
                });
            });
        
        });
    </script>
</html>
<?php
session_start();
$_SESSION["voted"] = false;
if ($_SESSION["voted"] = true) {
    header("Location: https://damp-chamber-22241.herokuapp.com/prove03/results.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Need Your Opinion!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!-- Put each question in a bootstrap tab interface?? -->
    <div class="container">
        <a href="results.php" style="float: right; padding: 4px">Results Page</a>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#q1">Question 1</a></li>
            <li><a data-toggle="tab" href="#q2">Question 2</a></li>
            <li><a data-toggle="tab" href="#q3">Question 3</a></li>
            <li><a data-toggle="tab" href="#q4">Question 4</a></li>
            <li><a data-toggle="tab" href="#q5">Question 5</a></li>
            <!--<li><a data-toggle="tab" href="#q6">Question 6</a></li>-->
        </ul>
        <form method="post" action="results.php">
            <div class="tab-content" style="padding: 30px;">
                <div id="q1" class="tab-pane fade in active">
                    <h4>1. How many hours of sleep do you get in a typical night?</h4>
                    <div class="radio">
                        <label for="a5-">
                            <input id="a5-" type="radio" name="actual" value="a5-">5 or less
                        </label>
                    </div>
                    <div class="radio">
                        <label for="a6-7">
                            <input id="a6-7" type="radio" name="actual" value="a6-7">6-7
                        </label>
                    </div>
                    <div class="radio">
                        <label for="a8-9">
                            <input id="a8-9" type="radio" name="actual" value="a8-9">8-9
                        </label>
                    </div>
                    <div class="radio">
                        <label for="a10+">
                            <input id="a10+" type="radio" name="actual" value="a10+">10 or more
                        </label>
                    </div>
                </div>
                <div id="q2" class="tab-pane fade">
                    <h4>2. How many hours of sleep do you <strong>want</strong> to get each night?</h4>
                    <div class="radio">
                        <label for="w5-">
                            <input id="w5-" type="radio" name="wanted" value="w5-">5 or less
                        </label>
                    </div>
                    <div class="radio">
                        <label for="w6-7">
                            <input id="w6-7" type="radio" name="wanted" value="w6-7">6-7
                        </label>
                    </div>
                    <div class="radio">
                        <label for="w8-9">
                            <input id="w8-9" type="radio" name="wanted" value="w8-9">8-9
                        </label>
                    </div>
                    <div class="radio">
                        <label for="w10+">
                            <input id="w10+" type="radio" name="wanted" value="w10+">10 or more
                        </label>
                    </div>
                </div>
                <div id="q3" class="tab-pane fade">
                    <h4>3. What form of transportation do you take to work?</h4>
                    <div class="radio">
                        <label for="car">
                            <input id="car" type="radio" name="transport" value="car">Car
                        </label>
                    </div>
                    <div class="radio">
                        <label for="bike">
                            <input id="bike" type="radio" name="transport" value="bike">Bike
                        </label>
                    </div>
                    <div class="radio">
                        <label for="walk">
                            <input id="walk" type="radio" name="transport" value="walk">Walk
                        </label>
                    </div>
                    <div class="radio">
                        <label for="pTransport">
                            <input id="pTransport" type="radio" name="transport" value="pTransport">Public Transportation
                        </label>
                    </div>
                </div>
                <div id="q4" class="tab-pane fade">
                    <h4>4. How long is your commute to work?</h4>
                    <div class="radio">
                        <label for="15-">
                            <input id="15-" type="radio" name="cTime" value="15-">15 minutes or less
                        </label>
                    </div>
                    <div class="radio">
                        <label for="15-30">
                            <input id="15-30" type="radio" name="cTime" value="15-30">15 to 30 minutes
                        </label>
                    </div>
                    <div class="radio">
                        <label for="30-60">
                            <input id="30-60" type="radio" name="cTime" value="30-60">30 minutes to an hour
                        </label>
                    </div>
                    <div class="radio">
                        <label for="60+">
                            <input id="60+" type="radio" name="cTime" value="60+">More than an hour
                        </label>
                    </div>
                </div>
                <div id="q5" class="tab-pane fade">
                    <h4>5. How many miles do you live from your work office?</h4>
                    <div class="radio">
                        <label for="10-">
                            <input id="10-" type="radio" name="cLength" value="10-">10 miles or less
                        </label>
                    </div>
                    <div class="radio">
                        <label for="10-20">
                            <input id="10-20" type="radio" name="cLength" value="10-20">10 to 20 miles
                        </label>
                    </div>
                    <div class="radio">
                        <label for="20-30">
                            <input id="20-30" type="radio" name="cLength" value="20-30">20 to 30 miles
                        </label>
                    </div>
                    <div class="radio">
                        <label for="30+">
                            <input id="30+" type="radio" name="cLength" value="30+">More than 30 miles
                        </label>
                    </div>
                    <button id="surveySubmit" class="btn btn-success" type="submit">Submit</button>
                </div>
                <!--<div id="q6" class="tab-pane fade">
                    <h4>6. What is the make of the car you drive?</h4>
                    <input class="text-input" name="make" type="text" placeholder="Make"><br/><br/>
                </div>-->
            </div>
        </form>
    </div>
</body>
</html>
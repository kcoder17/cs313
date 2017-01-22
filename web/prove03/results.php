<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results So Far</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
$_SESSION["voted"] = true;
$rFile = fopen("results.txt", "a+");
while(!feof($rFile)) {
    //get the old values and store them in an associative array
    $results[fgets($rFile)] = fgets($rFile);
}
fclose($rFile);
//from my research these should update the values but don't for some reason
//$results[$_POST['actual']]++;
//$results[$_POST['wanted']]++;
//$results[$_POST['transport']++;
//$results[$_POST['cTime']]++;
//$results[$_POST['cLength']]++;
$file = fopen("results.txt", "w");
foreach($results as $x => $x_value) {
    fwrite($file, $x);
    fwrite($file, $x_value);
    //echo "Key=" . $x . ", Value=" . $x_value;
    //echo "<br>";
}
fclose($file);
?>
    <div class="container">
        <a href="questions.html" style="float: right; padding: 4px">Survey Page</a>
        <table>
            <tr>
                <th style="text-align: center;" colspan="6">Results</th>
            </tr>
            <tr>
                <th>Question #</th>
                <th>Answer 1</th>
                <th>Answer 2</th>
                <th>Answer 3</th>
                <th>Answer 4</th>
            </tr>
            <tr>
                <th>1</th><!-- I also have no idea why this won't access the value in the associative array but a foreach will -->
                <td><?php echo $results["a5-"];  ?></td>
                <td><?php echo $results["a6-7"]; ?></td>
                <td><?php echo $results["a8-9"]; ?></td>
                <td><?php echo $results["a10+"]; ?></td>
            </tr>
            <tr>
                <th>2</th>
                <td><?php echo $results["w5-"];  ?></td>
                <td><?php echo $results["w6-7"]; ?></td>
                <td><?php echo $results["w8-9"]; ?></td>
                <td><?php echo $results["w10+"]; ?></td>
            </tr>
            <tr>
                <th>3</th>
                <td><?php echo $results["car"];        ?></td>
                <td><?php echo $results["bike"];       ?></td>
                <td><?php echo $results["walk"];       ?></td>
                <td><?php echo $results["pTransport"]; ?></td>
            </tr>
            <tr>
                <th>4</th>
                <td><?php echo $results["15-"];   ?></td>
                <td><?php echo $results["15-30"]; ?></td>
                <td><?php echo $results["30-60"]; ?></td>
                <td><?php echo $results["60+"];   ?></td>
            </tr>
            <tr>
                <th>5</th>
                <td><?php echo $results["10-"];   ?></td>
                <td><?php echo $results["10-20"]; ?></td>
                <td><?php echo $results["20-30"]; ?></td>
                <td><?php echo $results["30+"];   ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
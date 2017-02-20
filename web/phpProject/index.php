<?php
    require 'connect.php';
    $db = get_db();

    if (!$db) {
        echo "Error connecting to database.\n";
        exit;
    }
    $statement = $db->prepare("SELECT id, model, make_id FROM model");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $modelMake[$row['id']] = $row['make_id'];
        $modelIds[$row['id']] = $row['model'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Maintenance Tracker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        function change() {
            var temp = document.getElementById("make").value;
            var x = document.getElementById("model");
            obj1 = <?php echo json_encode($modelMake); ?>;
            obj2 = <?php echo json_encode($modelIds); ?>;
            var makeIds = Object.keys(obj1).map(function (key) { return obj1[key]; });
            var models = Object.keys(obj2).map(function (key) { return obj2[key]; });
            var aIds = [];
            var aModels = [];

            for (var i = 0; i < makeIds.length; i++){
                if (makeIds[i] == temp){
                    aIds.push(i + 1);
                    aModels.push(models[i]);
                }
            }

            do {
                x.remove(x.length - 1);
            } while (x.length > 0);

            for (var i = 0; i < aIds.length; i++){
                var objOption = document.createElement("option");
                objOption.value = aIds[i];
                objOption.text = aModels[i];
                x.options.add(objOption);
            }
        }
    </script>
</head>
<body class="container">
    <form class="form" action="insert.php" method="POST">
    <h1>Enter Your Car's Information</h1>
<?php
    $statement = $db->prepare("SELECT id, make FROM make");
    $statement->execute();

    echo "<label class='col-md-offset-4 col-md-2'>Make:</label>";
    echo "<select id='make' class='select' name='make' onchange='change()'>";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='{$row['id']}'>{$row['make']}</option>\n";
    }
    echo "</select></br></br>";
?>
    <label class='col-md-offset-4 col-md-2'>Model:</label>
    <select id="model" class='select' name='model'>
    </select>
    </br></br>
    <label class="col-md-offset-4 col-md-2">Transmission:</label>
    <select class="select" name="trans">
        <option value="true">Manual</option>
        <option value="false">Automatic</option>
    </select>
    </br></br>
    <label class="col-md-offset-4 col-md-2">Engine Size:</label>
    <input name="engine">
    </br></br>
    <label class="col-md-offset-4 col-md-2">Mileage:</label>
    <input name="mileage">
    </br></br>
    <button class="col-md-offset-5" type="submit">Submit</button>
    </form>
</body>
</html>
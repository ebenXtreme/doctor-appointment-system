<?php
include 'classTest.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Dummy Data</title>
</head>
<body>
    <form id="sp-form">
        <input type="text" name="name" id="name">
        <button type="submit">Insert!</button>
    </form>
    <form id="wd-form">
        <select name="type" id="type">
            <option value="morning">Morning</option>
            <option value="afternoon">Afternoon</option>
            <option value="evening">Evening</option>
            <option value="night">Night</option>
        </select>
        <select name="online_days" id="online_days">
            <option value="weekend">Weekend</option>
            <option value="weekdays">WeekDays</option>
        </select>
        <button type="submit">Insert!</button>
    </form>
    <form action="insertdummy.php" method="post" id="doc-form">
        <input type="text" name="name" id="name" placeholder="Name">
        <input type="tel" name="phone" id="phone" placeholder="phone">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="text" name="address" id="address" placeholder="address">
        <input type="password" name="password" id="password" placeholder="password">
        <select name="specialty" id="specialty" aria-placeholder="specialty">
            <option value="">select one</option>
    <?php 
            foreach ($specialty as $key=>$value) {?>
                <option value="<?=$value['id']?>"><?=$value['type']?></option>

            <?php
            }
            ?>
            
        </select>
        <select name="working_days_id" id="working_days_id">
            <option value="">select one</option>
            <?php 
            foreach ($wd as $key=>$value) {?>
                <option value="<?=$value['id']?>"><?=$value['work_type']?> | <?=$value['online_days']?></option>

            <?php
            }
            ?>
        </select>
        <button type="submit">Insert Doc!</button>
    </form>

    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script>
        $(function() {
            $("#wd-form").on('submit', function(e) {
                e.preventDefault();
                myData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "insertwd.php",
                    data: myData,
                    success: function (response) {
                        alert(response);
                        $("#wd-form :input").val("");
                    }
                });
            })
            $("#sp-form").on('submit', function(e) {
                e.preventDefault();
                myData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "insertspecialty.php",
                    data: myData,
                    success: function (response) {
                        alert(response);
                        $("#sp-form :input").val("");
                    }
                });
            })
            $("#doc-form").on('submit', function(e) {
                e.preventDefault();
                myData = $(this).serializeArray();
                console.log(myData);
                $.ajax({
                    type: "POST",
                    url: "insertdoc.php",
                    data: myData,
                    success: function (response) {
                        alert(response);
                        $("#sp-form :input").val("");
                    }
                });
            })
        });
    </script>
</body>
</html>
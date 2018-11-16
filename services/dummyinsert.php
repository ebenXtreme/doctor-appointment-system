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
        <div><input type="text" name="a" value="1" id="a"></div>
  <div><input type="text" name="b" value="2" id="b"></div>
  <div><input type="hidden" name="c" value="3" id="c"></div>
  <div>
    <textarea name="d" rows="8" cols="40">4</textarea>
  </div>
  <div><select name="e">
    <option value="5" selected="selected">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
  </select></div>
  <div>
    <input type="checkbox" name="f" value="8" id="f">
  </div>
        <input type="submit" value="Insert!">
    </form>
    <form action="insertdummy.php" method="post">
        <input type="text" name="name" id="name">
        <input type="tel" name="phone" id="phone">
        <input type="email" name="email" id="email">
        <input type="text" name="address" id="address">
        <select name="specialty" id="specialty">
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
        </select>
    </form>

    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script>
        $(function() {
            $("#sp-form").on('mouseleave', function(e) {
                myData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "insertspecialty.php",
                    data: myData,
                    success: function (response) {
                        console.log(response);
                    }
                });
            })
        });
    </script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Sign up form</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <form action="index.php" method="POST" class="col-sm-4">
            <h3 style="text-align: center; margin: 20px 0; color: rgb(40, 167, 69);">Sign up form</h3>
            <div class="form-group">
                <label for="adult_name">User name:</label>
                <input type="text" class="form-control" name="adult_name" id="adult_name">
            </div>
            <div class="form-group">
                <label for="adult_dob">Date of birth:</label>
                <input type="date" class="form-control" name="adult_dob" id="adult_dob">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <br>
                <input type="radio" name="gender" value="m"> Male<br>
                <input type="radio" name="gender" value="f"> Female<br>
            </div>
            <div class="form-group">
                <lable for="child">Do you have a child?</lable>
                <br>
                <input type="radio" name="child" value="yes" onclick="show_block()"> Yes<br>
                <input type="radio" name="child" value="no" onclick="hide_block()"> No<br>
            </div>
            <div id="child_section" style="display: none;">
                <div class="form-group">
                    <label for="child_name">Child name:</label>
                    <input type="text" class="form-control" name="child_name" id="child_name">
                </div>
                <div class="form-group">
                    <label for="child_dob">Child Date of birth:</label>
                    <input type="date" class="form-control" name="child_dob" id="child_dob">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="f_color">Favorite colour: <span style="font-size: 12px; color: red;">*Only for children</span></label>
                        <select type="text" class="form-control" name="f_color" id="f_color">
                            <option value="1">blue</option>
                            <option value="2">green</option>
                            <option value="3">red</option>
                            <option value="4">orange</option>
                            <option value="5">purple</option>
                            <option value="6">fuchia</option>
                            <option value="7">black</option>
                            <option value="8">yellow</option>
                            <option value="9">white</option>
                            <option value="10">rainbow</option>
                            <option value="11">pink</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg btn-block">
        </form>
    </div>
</div>
<?php
    include ("put_data_functions.php");
?>
<script>
    function hide_block() {
        var content = document.getElementById('child_section');
        content.style.display = 'none';
    }
    function show_block() {
        var content = document.getElementById('child_section');
        content.style.display = 'block';
    }
</script>
</body>
</html>
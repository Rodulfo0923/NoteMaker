<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include 'connection/config.php';
?>
<body>
    <form method="POST">
        <?php
            if($link){
                $sql = "SELECT * FROM users";
                $result = mysqli_query($link, $sql);
                if($result && mysqli_num_rows($result) > 0) {
                    echo "<select name='username' id='username'>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $selected = ($_POST['username'] ?? '') == $row['username'] ? 'selected' : '';
                        echo "<option value='{$row['username']}' $selected>{$row['username']}</option>";
                    }
                    echo "</select>";
                } else {
                    echo "No users found.";
                }
            } else {
                echo "Connection to database failed.";
            }
        ?>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($link) {
        if(isset($_POST['username'])) {
            $username = mysqli_real_escape_string($link, $_POST['username']);
            $sql = "SELECT * FROM notes WHERE note_user = '$username'";
            $result1 = mysqli_query($link, $sql);
            
            if ($result1) {
                if(mysqli_num_rows($result1) > 0 && $username != "") {
                    echo "<h2>Notes for $username:</h2>";
                    while ($row = mysqli_fetch_assoc($result1)) {
                        echo "<p>Title: {$row['title']}</p>";
                        echo "<p>Content: {$row['text']}</p>";
                    }
                } else {
                    echo "No notes found for the selected user.";
                }
            } else {
                echo "Error: " . mysqli_error($link);
            }
        } else {
            echo "No username selected.";
        }
    } else {
        echo "Connection to database failed.";
    }
    ?>

</body>
</html>

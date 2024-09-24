<?php
include_once 'connection/config.php';
include 'bars/time.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    position: relative; /* Set position relative for absolute positioning */
 background-color:white; 
} 

.content {
    margin-left: 250px;
    padding: 20px;
    position: relative; /* Set position relative for absolute positioning */

}

/* Add Note Popup */
.popup {
    display: none; /* Hide popup by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
}

.popup-content h2 {
    margin-bottom: 10px;
}

.popup-content input[type="text"],
.popup-content textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.popup-content textarea {
    resize: none;
    height: 150px;
}

.popup-content button {
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 2px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    transition: .4s;
    background-color: #00BFA6;
}


.popup-content {
    background-color: #fefefe;
    margin: 10% auto; /* Center popup vertically and horizontally */
    padding: 20px;
    border-radius: 5px;
    width: 50%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Search area */
.search {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Align search area to the right */
    margin-bottom: 20px; /* Add some spacing between search and content */
}

.group {
    display: flex;
    align-items: center;
    position: relative;
    margin-right: 20px; /* Add some spacing between search input and plus icon */
}

.input {
    height: 40px;
    line-height: 28px;
    padding: 0 1rem;
    width: 100%;
    padding-left: 2.5rem;
    border: 2px solid transparent;
    border-radius: 8px;
    outline: none;
    background-color: #D9E8D8;
    color: #0d0c22;
    box-shadow: 0 0 5px #C1D9BF, 0 0 0 10px #f5f5f5eb;
    transition: .3s ease;
    border: none; /* Remove border */
    outline: none;
}

.input::placeholder {
    color: #777;
}

.icon {
    position: absolute;
    left: 1rem;
    fill: #777;
    width: 1rem;
    height: 1rem;
}

/* Plus icon */
.add-note-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
}

.add-note-icon img {
    width: 50px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    cursor: pointer;
}

.row {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Adjust minmax values and other properties as needed */
    grid-gap: 20px; /* Adjust the gap between grid items */
    padding-left: 20px;
}


.card {
    width: 200px; /* Adjust width as needed */
    height: 180px; /* Adjust height as needed */
    margin-bottom: 20px; /* Add margin below each row */
    padding: 10px;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    overflow: hidden; /* Hide overflow */
    position: relative; /* Add relative positioning */
    transition: box-shadow 0.3s ease; /* Add transition for smooth hover effect */
    background-color:white;
    box-shadow: 0px 0px 2px black, -0px -0px 2px white;
}

.card:hover {
    box-shadow: 0px 0px 10px  rgba(0, 0, 0, 0.2); /* Add box-shadow effect on hover */
}

.card-content {
    max-height: 70px; /* Set maximum height */
    overflow: hidden; /* Hide overflow */
    text-wrap: pretty;
    transition: max-height 0.3s ease; /* Add smooth transition */
}

.card h2 {
    margin-bottom: 5px; /* Add margin below the title */
    font-size: 15px; /* Adjust font size as needed */
}

.card p {
    font-size: smaller;
    opacity: 0.7;
    position: absolute;
    bottom: 5px; /* Adjust as needed */
    right: 5px; /* Adjust as needed */
}

/* Dropdown */
.dropdown {
    position: absolute; /* Change position to absolute */
    top: 10px; /* Adjust as needed */
    right: 10px; /* Adjust as needed */
    cursor: pointer;
}

.dropdown-toggle img {
    width: 24px; /* Adjust width as needed */
    height: 24px; /* Adjust height as needed */
}

.dropdown-menu {
    display: none;
    position: fixed; /* Change position to fixed */
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 2; /* Set z-index higher than the cards */
}

.dropdown-menu.active {
    display: block;
}

.dropdown-menu-item {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    cursor: pointer;
}

.dropdown-menu-item:hover {
    background-color:  #f1f1f1;
}

.btn span:last-child {
    display: none;
}

.btn:hover {
    transition: .3s;
    background-color: #fff;
    color: #00BFA6;
}

.btn:active {
    background-color: #87dbd0;
}
  


.profile-content {
    max-width: 800px;
    height: 350px;
    background-color: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow:  5px 5px 10px ,
        -5px -5px 10px;
}

.profile-container {
    text-align: center;
    padding: 20px;
    display: flex;
    justify-content: space-evenly;
    margin-top: 40px;
}

.profile-img {
    width: 250px;
    height: 250px;
    float: left;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
    transition: box-shadow 0.3s ease;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer; /* Add cursor pointer to indicate clickable */
}

.profile-details p {
    margin: 10px 0;
    text-align: justify;
    font-weight: bold;
    color: #333;
    font-size: 18px;
} 

.edit-profile-form {
    margin-top: 20px;
}

.edit-profile-form input {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}



.modal {
    display: none; 
    position: fixed; 
    align-items: center;
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 5px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}


.tooltip-container {
    position: absolute;
    bottom: 10px; /* Adjust as needed */
    right: 10px;
}

.tooltip-icon {
    width: 24px; /* Adjust width as needed */
    height: 24px; /* Adjust height as needed */
    cursor: pointer;
}
.tooltip {
    position: absolute;
    bottom: 100%; /* Position above the icon */
    left: -60%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 5px;
    border-radius: 3px;
    visibility: hidden;
    z-index: 9; 
}

.tooltip-container:hover .tooltip {
    visibility: visible;
}

    </style>
</head>
<body>
<?php include 'bars/sidebar.php'; ?>

<div class="content">
    <?php include 'bars/search.php'?>

    <h1>Trash</h1>
    <?php
    $sql = "SELECT dn.deleted_note_id, dn.note_id, dn.deleted_at, dn.scheduled_permanent_deletion,
                n.title, n.text, n.created_at, n.updated_at
            FROM deletednotes dn
            JOIN notes n ON dn.note_id = n.note_id
            WHERE user_id = $user_id";
    $result = mysqli_query($link, $sql);

    // Error handling
    if (!$result) {
        echo "Error: " . mysqli_error($link);
        exit(); // Stop script execution if there's an error
    }
    $i = 0;
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            $scheduled_deletion = new DateTime($row['scheduled_permanent_deletion']);
            $current_date = new DateTime();
            $difference = $current_date->diff($scheduled_deletion)->days;

            if ($i % 4 == 0 && $i != 0) {
                echo '</div><div class="row">';
            }

            echo "<div class='card' id='note_" . $row['note_id'] . "'>";
echo "<h2>" . $row['title'] . "</h2>";
echo "<div class='card-content'>" . (strlen($row['text']) > 60 ? substr($row['text'], 0, 60) . "..." : $row['text']) . "</div>";
echo "<div class='card-actions'>";
echo "<div class='tooltip-container'>";
echo "<img src='icons/date-span.png' alt='Tooltip' class='tooltip-icon'>";
echo "<span class='tooltip'>" . $difference . " days until permanent deletion</span>";
echo "</div>";
echo "<div class='dropdown'>";
echo "<div class='dropdown-toggle' onclick='toggleDropdown(this)'><img src='icons/elipsis.png' alt='Dropdown'></div>";
echo "<div class='dropdown-menu'>";
echo "<div class='dropdown-menu-item' onclick='confirmDelete(" . $row['note_id'] . ")'>Delete</div>";
echo "<div class='dropdown-menu-item' onclick='restoreNote(". $row['note_id'] . ")'>Restore</div>";
echo "<div class='dropdown-menu-item' onclick='viewNote(" . $row['note_id'] . ")'>View</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";


            $i++;
        }
        echo '</div>';
    } else {
        echo "No notes found.";
    } 
    mysqli_close($link);
    ?>
</div>
<div class="popup" id="view-popup">
        <div class="popup-content">
            <span class="close" onclick="closeViewPopup()">&times;</span>
            <h2 id="view-popup-title"></h2>
            <div id="view-popup-text"></div>
        </div>
</div>
<script>
     function toggleDropdown(element) {
        var dropdownMenu = element.nextElementSibling;
        dropdownMenu.classList.toggle('active');
    }

    // Close dropdowns when clicking outside
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle img')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('active')) {
                    openDropdown.classList.remove('active');
                }
            }
        }
    }
    function viewNote(noteId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    showViewPopup(data.title, data.text);
                }
            };
        xhr.open("POST", "view_note.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("note_id=" + noteId);
    }

    function showViewPopup(title, text) {
        document.getElementById("view-popup-title").textContent = title;
        document.getElementById("view-popup-text").textContent = text;
        document.getElementById("view-popup").style.display = "block";
    }

    function closeViewPopup() {
        document.getElementById("view-popup").style.display = "none";
    }
    
    function confirmDelete(noteId) {
        if (confirm("Are you sure you want to delete this note?")) {
            // If user confirms deletion, proceed with the deletion
            deleteNote(noteId);
        }
    }

    function deleteNote(noteId) {
        // Send AJAX request to delete the note
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // If deletion is successful, reload the page to reflect changes
                    location.reload();
                } else {
                    // If deletion fails, display an error message
                    alert("Failed to delete note: " + response.error);
                }
            }
        };
        xhr.open("POST", "delete_note.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("note_id=" + noteId);
    }

    function restoreNote(noteId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // If restoration is successful, reload the page to reflect changes
                    location.reload();
                } else {
                    // If restoration fails, display an error message
                    alert("Failed to restore note: " + response.error);
                }
            }
        };
        xhr.open("POST", "restore_note.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("note_id=" + noteId);
    }


</script>
</body>
</html>

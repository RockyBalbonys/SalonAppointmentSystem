<?php
include "connection.php";  
include "sessions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="nav-item">ADMIN PAGE</div>
            <div class="nav-item"><a href="users.php">Users</a> | <a href="messages.php">Messages</a> | <a href="history.php">History</a> | <a href="logout.php">Log Out</a></div>
        </nav>
        <div class="h2">
            Messages
        </div>
        <div>
            <?php
                $selectAllMessages = "SELECT * FROM tbl_messages ORDER BY mess_id";
                $query = mysqli_query($conn, $selectAllMessages);

                if ($query) {
                    echo '<table class="table table-bordered" id="bookingTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Sender</th>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';

                    while ($row = mysqli_fetch_array($query)) {
                        echo '<tr>';
                        echo '<td>' . $row["mess_id"] . '</td>';
                        echo '<td>' . $row["mess_sender"] . '</td>';
                        echo '<td>' . $row["mess_email"] . '</td>';
                        echo '<td>' . $row["mess_content"] . '</td>';
                        echo '<td>' . "<div class='btn delete-btn btn-primary' data-id='" . $row["mess_id"] . "'>Delete</div>" . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody></table>';
                }
            ?>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $(".delete-btn").on("click", function(){
            var row = $(this).closest('tr');
            var messageId = $(this).data("id");
            var confirmation = confirm("Are you sure you want to delete this message?");

            if (confirmation) {
                // Remove the row immediately
                row.remove();

                // Now, send an AJAX request to delete the message in the database
                $.ajax({
                    type: "POST",
                    url: "delete_message.php",
                    data: { id: messageId },
                    success: function(response){
                        if(response !== "success") {
                            // If deletion in the database fails, you may need to handle it accordingly
                            alert("Failed to delete message.");
                        }
                    },
                    error: function(){
                        // If the AJAX request fails, you may need to handle it accordingly
                        alert("Failed to communicate with the server.");
                    }
                });
            }
        });
    });
</script>

</body>
</html>

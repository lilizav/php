<!DOCTYPE html>
<html>
<head>
    <title>Mini Challenge</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 50px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// Step 2: Define your data
$phones = [
    ["Iphone 14", 20, 10],
    ["Iphone 13", 20, 20],
    ["Iphone 12", 20, 25],
    ["Iphone 11", 25, 40]
];

// Step 3: Create the table using nested loops
echo "<table>";
echo "<tr><th>Phones</th><th>In stock</th><th>Sold</th></tr>";

for ($row = 0; $row < count($phones); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($phones[$row]); $col++) {
        echo "<td>" . $phones[$row][$col] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>

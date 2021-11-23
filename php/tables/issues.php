<?php 

function table_rows($data) {
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td><span>#".$row['id']."</span>".$row['title']."</td>";
        echo "<td>".$row['type']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['assigned_to']."</td>";
        echo "<td>".$row['created']."</td>";
        echo "</tr>";
    }
}

$db = new DatabaseSQL();



$is_param = isset($_GET['filter']);
$filter = " ";

if ($is_param) {
    $filter = $_GET['filter'];
}



if ($filter == "my_tickets") {
    $auth = unserialize($_SESSION['auth']);
    $user = $auth->user;
    $sql = "SELECT * FROM `isues` WHERE assigned_to = '$user->firstname $user->lastname'";
} else if ($filter == "open") {
    $sql = "SELECT * FROM `issues` WHERE status = 'open'";
} else {
    $sql = "SELECT * FROM `issues`";
}

$response = $db->select($sql);

if ($response['count'] > 0) {
    $results = $response['results']->fetchAll_assoc(); 
    table_rows($results);
}

?>
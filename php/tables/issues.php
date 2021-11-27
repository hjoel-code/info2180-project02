

<?php 

function table_rows($data) {
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td class='title'><span>#4302</span><a class='issue-title' id='0' href='#'>Bug</a></td>";
        echo "<td>Bug</td>";
        echo "<td class='status progress'><span></span></td>";
        echo "<td>Joel Henry</td>";
        echo "<td>Me</td>";
        echo "</tr>";
    }
}

$db = new DatabaseSQL();



$is_param = isset($_GET['filter']);
$filter = "all";

if ($is_param) {
    $filter = $_GET['filter'];
}



if ($filter == "my_tickets") {
    $auth = unserialize($_SESSION['auth']);
    $user = $auth->user;
    $sql = "SELECT * FROM `issues` WHERE assigned_to = ".$user->uid;
} else if ($filter == "open") {
    $sql = "SELECT * FROM `issues` WHERE type = 'bug'";
} else {
    $sql = "SELECT * FROM `issues`";
}

$response = $db->select($sql);

if ($response['count'] > 0) {
    $results = $response['results']->fetchAll_assoc(); 
    echo table_rows($results);
}

echo "<tr>";
echo "<td class='title'><span>#4302</span><a class='issue-title' id='0' href='#'>Bug</a></td>";
echo "<td>Bug</td>";
echo "<td class='status progress'><span></span></td>";
echo "<td>Joel Henry</td>";
echo "<td>Me</td>";
echo "</tr>";

?>

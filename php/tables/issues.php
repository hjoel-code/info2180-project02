

<?php 


$db = new DatabaseSQL();

function table_rows($data) {
    $db = new DatabaseSQL();
    while($row = $data->fetch_assoc()) {
        $sql = "SELECT * FROM `users` WHERE id=".(int)$row['assigned_to']."";
        $stateAssigned = $db->select($sql);
        $sql = "SELECT * FROM `users` WHERE id=".(int)$row['created_by']."";
        $stateCreated = $db->select($sql);
        if ($stateAssigned['state'] && $stateCreated['state']) {
            
            if ($stateCreated['count'] > 0) {
                $created = new User();
                $stateCreated = $stateCreated['result']->fetch_assoc();
                $created->set_user($stateCreated['id'], $stateCreated['firstname'], $stateCreated['lastname'], $stateCreated['email'], $stateCreated['date_joined']);
            } else {
                die("Error Retrieving Data");
            }

            if ($stateAssigned['count'] > 0) {
                $assigned = new User();
                $stateAssigned = $stateAssigned['result']->fetch_assoc();

                $assigned->set_user($stateAssigned['id'], $stateAssigned['firstname'], $stateAssigned['lastname'], $stateAssigned['email'], $stateAssigned['date_joined']);
            } else {
                die("Error Retrieving Data");
            }

            $date = date_create($row['created']);

            echo "<tr>";
            echo "<td class='title'><span>#".$row['id']."</span><a class='issue-title' id='".$row['id']."' href='#'>".$row['title']."</a></td>";
            echo "<td>".$row['type']."</td>";
            echo "<td class='status ".$row['status']."'><span></span></td>";
            echo "<td>".$assigned->get_fullname()."</td>";
            echo "<td>".date_format($date, 'Y-m-d H:i:s')."</td>";
            echo "</tr>";
        }

        

        
    }
}


$is_param = isset($_GET['filter']);
$filter = "all";

if ($is_param) {
    $filter = $_GET['filter'];
}



if ($filter == "my_tickets") {
    $auth = unserialize($_SESSION['auth']);
    $user = $auth->user;
    $sql = "SELECT * FROM `issues` WHERE created_by = ".$user->uid;
} else if ($filter == "open") {
    $sql = "SELECT * FROM `issues` WHERE type = 'bug'";
} else {
    $sql = "SELECT * FROM `issues`";
}

$response = $db->select($sql);

if ($response['count'] > 0) {
    $results = $response['result'];
    echo table_rows($results);
}
?>
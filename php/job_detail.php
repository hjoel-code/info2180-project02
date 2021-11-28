<link rel="stylesheet" href="./styles.css">

<?php 

    $id = $_GET['id'];
    
    
    function getDetails($id){
        $query = "SELECT * FROM `issues` WHERE id = ".$id."" ;
        $data = array();
        $db = new DatabaseSQL();
        $result = $db->select($query);
        if ($result['state']){
            if ($result['count'] > 0) {
                // output data of each row
                while($row = $result['result']->fetch_assoc()) {
                    $title = $row['title'];
                    $id_ = $row['id'];
                    $description = $row['description'];
                    $type = $row['type'];
                    $priority = $row['priority'];
                    $status = $row['status'];
                    $assigned_to = $row['assigned_to'];
                    $created_by = $row['created_by'];
                    $created = $row['created'];
                    $updated = $row['updated'];
                    array_push($data, $title, $id_, $description, $type, $priority, $status, $assigned_to, $created_by, $created, $updated);
                    return $data;
                }
            }
            
        }

        
    }

    

    $arr = getDetails($id);

    echo "<h1>"."<div id = page-content>".$arr[0]."</h1>";

    echo "<h3>""<div id = page-content>".$arr[1]."</h3>";
    echo "<p>".$arr[2]."</p>";

    echo "</div>";

?>



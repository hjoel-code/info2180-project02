<h1>Bug Detail</h1>

<?php 

    $id = $_GET['id'];
    function getDetails(){
        $query = 'SELECT * FROM `issues` WHERE id = %$id%' ;
        $db = new DatabaseSQL();
        $result = $db->select($query);
        if ($result['state']){
            if ($result['count'] > 0) {
                // output data of each row
                while($row = $result['result']->fetch_assoc()) {
                    echo  $row["id"]." ".$row["title"]. " " . $row["description"]." ".$row["type"]." ".$row["priority"]." ".$row["assigned_to"]." ".$row["created_by"]." ".$row["created"]." ".$row["updated"];
                }
            }
        }
}
?>

<h1>Create Issue</h1>


<?php 
    function assigned_to(){
    $query = 'SELECT * FROM users';
    $db = new DatabaseSQL();
    $result = $db->select($query);
    if ($result['state']){
        if ($result['count'] > 0) {
            // output data of each row
            while($row = $result['result']->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["firstname"]. " " . $row["lastname"]."</option>" ;
            }
        } else {
            echo "0 results";
        }
    }//state 
}
?>


<div class="create_issue_form">
    <form name="create-issue" action="./routing.php" method="post">
        <input type="hidden" type="text" name="content" value="new_issue">
        <label for="title">Title:</label><br>
        <input type="text" name="title" maxlength="35"><br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" maxlength="160"><br>
        <label for="assigned_to">Assigned to:</label>
            <select id="assigned_to" name="assigned_to">
                <?php assigned_to() ?>
        </select>
        <br>
        <label for="type">Type:</label>
            <select id="type" name="type">
            <option value="bug">Bug</option>
            <option value="proposal">Proposal</option>
            <option value="task">Task</option>
        </select>
        <br>
        <label for="priority">Priority:</label>
            <select id="priority"name="priority">
            <option value="critical">Critical</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
        </select>
        <br>
        <button type="submit">Submit</button>
</form>


    

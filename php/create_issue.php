
<link rel="stylesheet" href="./php/css/new_issue.css">

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
            }
        }
}
?>


<div class="create_issue_form">
    <form id="issue-form" name="create-issue" action="./routing.php" method="post">
        <input type="hidden" type="text" name="content" value="new_issue">
        <label for="title">Title:</label><br>
        <input type="text" name="title" maxlength="35"><br>
        <label for="description">Description:</label><br>
        <textarea name="description" cols="30" rows="10"></textarea><br>
        <label for="assigned_to">Assigned to:</label>
            <select id="assigned_to" name="assigned_to">
                <?php assigned_to() ?>
        </select>
        <br>
        <label for="type">Type:</label>
            <select id="type" name="type">
            <option value="Bug">Bug</option>
            <option value="Proposal">Proposal</option>
            <option value="Task">Task</option>
        </select>
        <br>
        <label for="priority">Priority:</label>
            <select id="priority"name="priority">
            <option value="Critical">Critical</option>
            <option value="Major">Major</option>
            <option value="Minor">Minor</option>
        </select>
        <br>
        <button type="submit" id="issue-btn">Submit</button>
</form>


    
<script src="./php/js/new_issue.js"></script>
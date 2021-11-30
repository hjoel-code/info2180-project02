
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
                    updateAssignedTo();

                    function updateAssignedTo(){
                        $assigned = $row["assigned_to"];
                        $created = $row['created_by'];
                        
                        $query = "INSERT INTO issues (assigned_to, created_by) VALUES ($assigned, $created)";
                        $db = new DatabaseSQL();
                        $result = $db->select($query);
                        print_r($result);
                    }
    
                    
                    
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
        <input type="text" name="title" maxlength="35"><br><br>
        <label for="description">Description:</label><br>
        <textarea name="description" cols="30" rows="10"></textarea><br><br>
        <label for="assigned_to">Assigned to:</label><br>
            <select id="assigned_to" name="assigned_to">
            <option value="" disabled selected hidden>Select a user</option>
                <?php assigned_to() ?>
        </select>
        <br><br>
        <label for="type">Type:</label><br>
            <select id="type" name="type">
            <option value="" disabled selected hidden>Choose a type</option>
            <option value="Bug">Bug</option>
            <option value="Proposal">Proposal</option>
            <option value="Task">Task</option>
        </select>
        <br><br>
        <label for="priority">Priority:</label><br>
            <select id="priority"name="priority">
            <option value="" disabled selected hidden>Select priority</option>
            <option value="Critical">Critical</option>
            <option value="Major">Major</option>
            <option value="Minor">Minor</option>
        </select>
        <br><br>
        <button type="submit" id="issue-btn">Submit</button>
</form>


    
<script src="./php/js/new_issue.js"></script>
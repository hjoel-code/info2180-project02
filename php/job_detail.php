<link rel="stylesheet" href="./php/css/bug-detail.css">

<?php 

    $id = $_GET['id'];
    
    
    function getDetails($id){
        $query = "SELECT * FROM `issues` WHERE id = ".$id."" ;
        $db = new DatabaseSQL();
        $result = $db->select($query);
        
        if ($result['state']){
            if ($result['count'] > 0) {
                return $result['result']->fetch_assoc();
            }
            
        }
        return null;    
    }


    $arr = getDetails($id);

    if ($arr != null) {

        $createDate = date_create($arr['created']);
        $updateDate = date_create($arr['updated']);


        $closed = '';
        $progress = '';

        if ($arr['status'] == 'progress') {
            $progress = "disabled = 'true'";
        } else if ($arr['status'] == 'closed') {
            $closed = "disabled = 'true'";
        }

        $db = new DatabaseSQL();

        $sql = "SELECT * FROM `users` WHERE id=".(int)$arr['assigned_to']."";
        $stateAssigned = $db->select($sql);
        $sql = "SELECT * FROM `users` WHERE id=".(int)$arr['created_by']."";
        $stateCreated = $db->select($sql);

        if ($stateAssigned['state'] && $stateCreated['state']) {
            
            if ($stateCreated['count'] > 0) {
                $created = new User();
                $stateCreated = $stateCreated['result']->fetch_assoc();
                $created->set_user($stateCreated['id'], $stateCreated['firstname'], $stateCreated['lastname'], $stateCreated['email'], $stateCreated['date_joined']);
            } else {
                die("FAILED_TO_GET_DATA");
            }

            if ($stateAssigned['count'] > 0) {
                $assigned = new User();
                $stateAssigned = $stateAssigned['result']->fetch_assoc();

                $assigned->set_user($stateAssigned['id'], $stateAssigned['firstname'], $stateAssigned['lastname'], $stateAssigned['email'], $stateAssigned['date_joined']);
            } else {
                die("FAILED_TO_GET_DATA");
            }

        }
    } else {
        die("FAILED_TO_GET_DATA");
    }

    


?>


<div class="bug-title">
    <h1><?= $arr['title'] ?></h1>
    <h3>Issue #<?= $arr['id'] ?></h3>
</div>

<div class="grid-container">
    <div class="bug-description-container">
        <p><?= $arr['description'] ?></p>

        <ul>
            <li><span><i class="fa fa-chevron-right"></i></span> Issue created on <?= date_format($createDate, "F d, Y") ?> at <?php echo date_format($createDate, "g:i A") ?>  by <?= $created->get_fullname() ?> </li>
            <li><span><i class="fa fa-chevron-right"></i></span> Last updated on <?= date_format($updateDate, "F d, Y") ?> at <?php echo date_format($updateDate, "g:i A") ?></li>
        </ul>
    </div>
    <div class="bug-details-container">
        <div class="details-card">
            <ul>
                <li><h4>Assigned To</h4><p><?= $assigned->get_fullname() ?></p></li>
                <li><h4>Type</h4><p><?= $arr['type'] ?></p></li>
                <li><h4>Priority</h4><p><?= $arr['priority'] ?></p></li>
                <li><h4>Status</h4><p class="<?= $arr['status'] ?>"></p></li>
            </ul>
        </div>
        <input id="bug-id" type="hidden" value="<?= $arr['id'] ?>">
        <button id="closed-btn" <?= $closed ?>>Mark as Closed</button>
        <button id='progress-btn' <?= $progress ?>>Mark In Progress</button>
    </div>
</div>

<script src="./php/js/bug-detail.js"></script>
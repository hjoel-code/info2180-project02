

<link rel="stylesheet" href="./php/css/dashboard.css">


<div class="dashboard-title-container">
    <div class="title-container">
        <h1 class="page-title">Issues</h1>
    </div>
    <div class="create-issue-btn-container">
        <button class="create-issue-btn" id="new_issue">Create New Issue</button>
    </div>
</div>

<div class="filter-tab-container">
    <div class="filter-label">
        <label>Filter by:</label>
    </div>
    <div class="filter-btn-group">
        <button id="all" class="filter-btn active">All</button>
        <button id="open" class="filter-btn">Open</button>
        <button id="my_tickets" class="filter-btn">My Tickets</button>
    </div>
</div>

<table>
    <thead>
        <th>Title</th>
        <th>Type</th>
        <th>Status</th>
        <th>Assigned To</th>
        <th>Created</th>
    </thead>

    <tbody id='issue-body-container'>
        <?php 
        include('./php/tables/issues.php') ?>
    </tbody>

</table>
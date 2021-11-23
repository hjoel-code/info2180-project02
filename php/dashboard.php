
<div class="dashboard-title-container">
    <div class="title-container">
        <h1>Issues</h1>
    </div>
    <div class="create-issue-btn-container">
        <button class="create-issue-btn">Create New Issue</button>
    </div>
</div>

<div class="filter-tab-container">
    <div class="filter-label">
        <label>Filter by:</label>
    </div>
    <div class="filter-btn-group">
        <button class="filter-btn active">All</button>
        <button class="filter-btn">Open</button>
        <button class="filter-btn">My Tickets</button>
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

    <tbody>
        <?php include('./php/tables/issues.php') ?>
    </tbody>

</table>
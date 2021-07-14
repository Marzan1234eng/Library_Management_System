
<div  class="col-3 dashboard-col" >
    <div class="row logo-row">
        <img class="logo-image" src="images/Logo.png">
    </div>

    <ul class="dashboard-ul">
        <li class="<?php if ($page == 'dashboard') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-history category-icon"></i>
            <a class="dash-content" href="dashboard.php">Dashboard</a>
        </li>
        <li class="<?php if ($page == 'book_search') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-search category-icon"></i>
            <a class="dash-content" href="book_search.php">Book Search</a>
        </li>
        <li class="<?php if ($page == 'book_issue') {echo 'active';} ?> dashboard-li">
            <i class="far fa-hand-point-right category-icon"></i>
            <a class="dash-content" href="book_issue.php">Book Issue</a>
        </li>
        <li class="<?php if ($page == 'book_return') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-exchange-alt category-icon"></i>
            <a class="dash-content" href="book_return.php">Book Return</a>
        </li>
        <li class="<?php if ($page == 'book_update') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-pen-alt category-icon"></i>
            <a class="dash-content" href="book_update.php">Book Update</a>
        </li>
        <li class="<?php if ($page == 'add_category') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-plus category-icon"></i>
            <a class="dash-content" href="add_category.php">Add Category</a>
        </li>
        <li class="<?php if ($page == 'add_book') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-book category-icon"></i>
            <a class="dash-content" href="add_book.php">Add Book</a>
        </li>
        <li class="<?php if ($page == 'add_member') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-universal-access category-icon"></i>
            <a class="dash-content" href="add_member.php">Add Member</a>
        </li>
        <li class="<?php if ($page == 'user_update') {echo 'active';} ?> dashboard-li">
            <i class="fas fa-users category-icon"></i>
            <a class="dash-content" href="user_update.php">User Update</a>
        </li>
        <li class="dashboard-li">
            <i class="fas fa-power-off category-icon"></i>
            <a class="dash-content" href="include/logout.php">Logout</a>
        </li>
    </ul>
    <br>
    <br>
    <br>
    <br>
</div>
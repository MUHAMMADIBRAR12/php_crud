<?php
session_start();
// Create alert
if (isset($_SESSION['register_success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Register Successfull
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    unset($_SESSION['register_success']);
}
// Delete alert
if (isset($_SESSION['delete_success'])) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Deleted Successfull
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    unset($_SESSION['delete_success']);
}
// Update alert
if (isset($_SESSION['update_success'])) {
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Updated Successfull
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    unset($_SESSION['update_success']);
}
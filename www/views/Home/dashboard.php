<?php $title = "Dashboard"; include 'views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Dashboard</h4>
            </div>
            <div class="card-body">
                <h5>Welcome, <?php echo $_SESSION['username']; ?>!</h5>
                <p>You are successfully logged in to your dashboard.</p>
                <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                <p><strong>User ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="index.php" class="btn btn-outline-primary btn-sm mb-2 w-100">Go to Home</a>
                <a href="index.php?action=logout" class="btn btn-outline-danger btn-sm w-100">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>
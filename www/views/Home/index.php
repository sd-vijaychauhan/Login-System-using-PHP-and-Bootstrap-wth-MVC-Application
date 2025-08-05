<?php $title = "Home"; include 'views/layouts/header.php'; ?>

<div class="jumbotron bg-light p-5 rounded">
    <h1 class="display-4">Welcome to Our Login System</h1>
    <p class="lead">This is a simple PHP MVC login system with Bootstrap styling.</p>
    <?php if(!isset($_SESSION['user_id'])): ?>
        <hr class="my-4">
        <p>Please login or register to access the dashboard.</p>
        <a class="btn btn-primary btn-lg me-2" href="index.php?action=login" role="button">Login</a>
        <a class="btn btn-secondary btn-lg" href="index.php?action=register" role="button">Register</a>
    <?php else: ?>
        <hr class="my-4">
        <p>Welcome back, <?php echo $_SESSION['username']; ?>!</p>
        <a class="btn btn-success btn-lg" href="index.php?action=dashboard" role="button">Go to Dashboard</a>
    <?php endif; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
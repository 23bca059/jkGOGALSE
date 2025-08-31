<div class="sidebar">
    <div class="sidebar-header">
        <h3><i class="fas fa-store me-2"></i>GoGalse</h3>
        <p>Admin Panel</p>
    </div>
    
    <nav class="sidebar-menu">
        <a href="index.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </a>
        
        <a href="products.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : '' ?>">
            <i class="fas fa-glasses"></i>
            Products
        </a>
        
        <a href="add-product.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'add-product.php' ? 'active' : '' ?>">
            <i class="fas fa-plus-circle"></i>
            Add Product
        </a>
        
        <a href="orders.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : '' ?>">
            <i class="fas fa-shopping-cart"></i>
            Orders
        </a>
        
        <a href="testimonials.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'active' : '' ?>">
            <i class="fas fa-star"></i>
            Testimonials
        </a>
        
        <a href="users.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>">
            <i class="fas fa-users"></i>
            Users
        </a>
        
        <a href="eye-tests.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'eye-tests.php' ? 'active' : '' ?>">
            <i class="fas fa-eye"></i>
            Eye Test Bookings
        </a>
        
        <a href="feedback.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'feedback.php' ? 'active' : '' ?>">
            <i class="fas fa-comments"></i>
            Feedback
        </a>
        
        <a href="settings.php" class="menu-item <?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : '' ?>">
            <i class="fas fa-cog"></i>
            Settings
        </a>
        
        <a href="logout.php" class="menu-item">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </nav>
</div>
<header class="header">
    <nav class="navbar">
        <div class="nav-icon back" onclick="goBack()">
            <i class="ri-arrow-left-line"></i>
        </div>
        <div class="nav-title">
            <a href="index.php" class="nav__logo">
                <i class="fi fi-sr-mushroom-alt"></i> Smart Mushroom
                </a>
        </div>
        <div class="nav-icon reface" onclick="reloadPage()">
            <i class="ri-loop-right-line"></i>
        </div>
    </nav>

    <script>
        function goBack() {
            window.history.back();
        }

        function reloadPage() {
            window.location.reload();
        }
    </script>
</header>


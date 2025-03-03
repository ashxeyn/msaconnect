<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../includes/head.php'; ?> <!-- Include head.php for Bootstrap and other dependencies -->
    <title>Admin Dashboard</title>
    <script src="../js/admin.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-2 bg-dark text-white min-vh-100 p-3">
                <?php include '../../includes/sideBar.php'; ?> <!-- Include the sidebar -->
            </div>

            <!-- Main Content Column -->
            <div class="col-md-10 py-3">
                <div id="contentArea" class="container mt-4">
                    <h3><?php echo "Welcome to Dashboard"; ?><br></h3>
                    <!-- Default content (e.g., dashboard) will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
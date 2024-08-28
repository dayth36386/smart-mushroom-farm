<?php
session_start();
require_once "db.php";
if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = "Please log in.";
    header("location: signin.php");
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM crud_product WHERE id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        $_SESSION['success'] = "Data has been deleted successfully";
    }
}

// Pagination logic
$limit = 10;  // Number of entries to show in a page.
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
} else { 
    $page=1; 
};  
$start_from = ($page-1) * $limit;  

// Fetching records with limit and offset
$stmt = $conn->prepare("SELECT * FROM crud_product ORDER BY created_at DESC LIMIT :start_from, :limit");
$stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll();
?>
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="mushroom" class="col-form-label">Mushroom Type:</label>
                    <select class="form-select" name="mushroom" aria-label="Example select with button addon" required>
                        <option selected>Select Mushroom Type</option>
                        <option value="เห็ดนางฟ้าภูฐาน">เห็ดนางฟ้าภูฐาน</option>
                        <option value="เห็ดนางรม">เห็ดนางรม</option>
                        <option value="เห็ดนางฟ้า">เห็ดนางฟ้า</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="weight" class="col-form-label">Weight (KG): </label>
                    <input type="text" required class="form-control" name="weight" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="col-form-label">House Location: </label>
                    <select class="form-select" name="location" aria-label="Example select with button addon" required>
                        <option selected>Select House Location</option>
                        <option value="House 1">House 1</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">Description: </label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>    
    </div>
</div>
</div> 
<div class="container mt-5">
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']); 
            ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']); 
            ?>
        </div>
    <?php } ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date & Time</th>
                <th scope="col">Mushroom Type</th>
                <th scope="col">Weight (KG)</th>
                <th scope="col">House Location</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (!$users) {
                    echo "<p><td colspan='9' class='text-center'>No data available</td></p>";
                } else {
                    foreach($users as $user) {  
            ?>
                <tr>
                    <td><?php echo $user['created_at']; ?></td>
                    <td><?php echo $user['mushroom']; ?></td>
                    <td><?php echo $user['weight']; ?></td>
                    <td><?php echo $user['location']; ?></td>
                    <td><?php echo $user['description']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } } ?>
        </tbody>
    </table>
    
    <?php
    // Fetch total records to calculate total pages
    $stmt = $conn->query("SELECT COUNT(id) FROM crud_product");
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    $total_pages = ceil($total_records / $limit);
    ?>

    <nav>
        <ul class="pagination">
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                <li class="page-item <?php if ($i==$page) echo 'active'; ?>">
                    <a class="page-link" href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
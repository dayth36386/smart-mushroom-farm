<?php
$servername = "localhost";
$username = "u103987334_vwnde";
$password = "ZX!zx123456";

try {
    $conn = new PDO("mysql:host=$servername;dbname=u103987334_R9GiO", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Fetch latest data
$stmt = $conn->query("SELECT * FROM logdata ORDER BY reading_time DESC");
$stmt->execute();
$logdata = $stmt->fetchAll();

// Close the database connection
$conn = null;
?>
<div class="container mt-5">
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Location</th>
                    <th>Reading Time</th>
                    <th>Sensor</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Equipment</th>
                    <th>Status</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logdata as $logdatas) { ?>
                    <tr>
                        <td><?php echo $logdatas['location']?></td>
                        <td><?php echo $logdatas['reading_time']?></td>
                        <td><?php echo $logdatas['sensor']?></td>
                        <td><?php echo $logdatas['value1']?></td>
                        <td><?php echo $logdatas['value2']?></td>
                        <td><?php echo $logdatas['equipment']?></td>
                        <td><?php echo $logdatas['status']?></td>
                        <td><?php echo $logdatas['id']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
   $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                pagingType: 'simple'
            });
        });
</script>
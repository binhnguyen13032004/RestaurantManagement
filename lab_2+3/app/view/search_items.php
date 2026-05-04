<?php
// --- 1. Configuration & Connection ---
// (Note: You might want to replace this with include 'config/database.php'; to match your other files)
$db = new PDO('mysql:host=localhost;dbname=project_database1', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$items_per_page = 6; // Changed to 6 so it creates two perfect rows of 3 on desktop

// --- 2. Get Inputs ---
$keyword = $_GET['q'] ?? '';
$sort_by = $_GET['sort'] ?? 'name';
$page    = (int)($_GET['page'] ?? 1);

// --- 3. Validate & Calculate ---
$sort_by = in_array($sort_by, ['name', 'price']) ? $sort_by : 'name';
$offset  = ($page - 1) * $items_per_page;

// --- NEW: Calculate Total Pages for Pagination UI ---
$count_sql = "SELECT COUNT(*) FROM items WHERE name LIKE :keyword";
$count_stmt = $db->prepare($count_sql);
$count_stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
$count_stmt->execute();
$total_items = $count_stmt->fetchColumn();
$total_pages = ceil($total_items / $items_per_page);

// --- 4. Prepare & Execute Query ---
$sql = "SELECT * FROM items WHERE name LIKE :keyword ORDER BY $sort_by ASC LIMIT :limit OFFSET :offset";
$stmt = $db->prepare($sql);

$stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
$stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Menu Items</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body class="bg-light">

<!-- Navbar/Header Spacer -->
<div class="container mt-5">
    
    <!-- Header & Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Items</h2>
        <a href="home.php" class="btn btn-outline-secondary px-4">Back to Menu</a>
    </div>

    
    <!-- Results Display -->
    <?php if (empty($items)): ?>
        <div class="text-center py-5">
            <h4 class="text-muted">No matching items found.</h4>
        </div>
    <?php else: ?>
        
        <div class="row">
            <?php foreach ($items as $item): ?>
                <?php 
                    $name  = htmlspecialchars($item['name']);
                    $price = htmlspecialchars($item['price']);
                    // Safely grab the image or fallback to a placeholder if the DB is missing it
                    //$image = htmlspecialchars($item['image'] ?? '../images/placeholder.jpg'); 
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?php echo $name; ?></h5>
                            <h4 class="price-tag mb-3">$<?php echo $price; ?></h4>
                            <a href="item_details.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination UI -->
        <?php if ($total_pages > 1): ?>
            <nav aria-label="Search results pages" class="mt-4 mb-5">
                <ul class="pagination justify-content-center">
                    
                    <!-- Previous Button -->
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?q=<?php echo urlencode($keyword); ?>&sort=<?php echo $sort_by; ?>&page=<?php echo $page - 1; ?>">Previous</a>
                    </li>
                    
                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?q=<?php echo urlencode($keyword); ?>&sort=<?php echo $sort_by; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <!-- Next Button -->
                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?q=<?php echo urlencode($keyword); ?>&sort=<?php echo $sort_by; ?>&page=<?php echo $page + 1; ?>">Next</a>
                    </li>

                </ul>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

</div>

</body>
</html>
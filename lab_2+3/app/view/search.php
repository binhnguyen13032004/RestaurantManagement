<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Search Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link rel="stylesheet" href=".../../public/css/style.css">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb p-3 bg-white rounded-3 shadow-sm">
            <li class="breadcrumb-item"><a href="home.php" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="search_items.php" class="text-decoration-none">Items</a></li>
            <li class="breadcrumb-item active fw-bold" aria-current="page">Live Search</li>
            <li class="breadcrumb-item ms-auto"><a href="contact.php" class="text-decoration-none text-muted">Contact</a></li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold m-0">Live Interactive Search</h2>
        <p class="text-muted">Results update automatically as you type.</p>
    </div>

    <!-- Search Controls Card -->
    <div class="card shadow-sm border-0 rounded-4 mb-5 p-4 bg-white">
        <div class="row g-3">
            
            <div class="col-md-8">
                <label for="searchBox" class="form-label fw-semibold text-muted small text-uppercase">Keyword</label>
                <input type="text" class="form-control form-control-lg" id="searchBox" placeholder="Start typing to search..." oninput="resetAndSearch()">
            </div>
            
            <div class="col-md-4">
                <label for="sortBox" class="form-label fw-semibold text-muted small text-uppercase">Sort By</label>
                <select class="form-select form-select-lg" id="sortBox" onchange="resetAndSearch()">
                    <option value="name">Name (A-Z)</option>
                    <option value="price">Price (Lowest First)</option>
                </select>
            </div>

        </div>
    </div>

    <!-- Dynamic Results Container -->
    <div id="results" class="min-vh-50">
        <!-- Backend HTML gets injected here -->
    </div>

    <!-- Bootstrap Pagination UI -->
    <nav aria-label="Search results pagination" class="mt-5 mb-5">
        <ul class="pagination justify-content-center pagination-lg">
            
            <!-- Previous -->
            <li class="page-item" id="prevItem">
                <button class="page-link" id="prevBtn" onclick="changePage(-1)">Previous</button>
            </li>
            
            <!-- Current Page Indicator -->
            <li class="page-item active" aria-current="page">
                <span class="page-link" id="pageIndicator">Page 1</span>
            </li>
            
            <!-- Next -->
            <li class="page-item" id="nextItem">
                <button class="page-link" id="nextBtn" onclick="changePage(1)">Next</button>
            </li>

        </ul>
    </nav>

</div>

<script>
    // --- 1. Application State ---
    let currentPage = 1;

    // --- 2. Event Handlers ---
    function resetAndSearch() {
        currentPage = 1; 
        fetchResults();
    }

    function changePage(direction) {
        currentPage += direction;
        if (currentPage < 1) currentPage = 1; 
        fetchResults();
    }

    // --- 3. Core AJAX Logic ---
    function fetchResults() {
        const keyword = document.getElementById("searchBox").value;
        const sort    = document.getElementById("sortBox").value;

        // Display a loading spinner while fetching
        document.getElementById("results").innerHTML = `
            <div class="d-flex justify-content-center align-items-center py-5">
                <div class="spinner-border text-danger" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;

        const url = `search_items.php?q=${encodeURIComponent(keyword)}&sort=${sort}&page=${currentPage}`;

        fetch(url)
            .then(response => response.text())
            .then(html => {
                // Update the DOM with results
                document.getElementById("results").innerHTML = html;

                // Update Pagination Display
                document.getElementById("pageIndicator").textContent = `Page ${currentPage}`;
                
                // Toggle 'disabled' class on the list items for Bootstrap styling, and disable the actual button
                const isFirstPage = (currentPage === 1);
                document.getElementById("prevItem").classList.toggle("disabled", isFirstPage);
                document.getElementById("prevBtn").disabled = isFirstPage;
                
                // If the backend returns "No matching items found", disable the Next button
                const noMoreResults = html.includes("No matching items found");
                document.getElementById("nextItem").classList.toggle("disabled", noMoreResults);
                document.getElementById("nextBtn").disabled = noMoreResults;
            })
            .catch(err => {
                console.error("Failed to fetch items:", err);
                document.getElementById("results").innerHTML = `
                    <div class="alert alert-danger text-center" role="alert">
                        Failed to load data. Please check your connection.
                    </div>`;
            });
    }

    // --- 4. Initial Load ---
    fetchResults();
</script>

</body>
</html>
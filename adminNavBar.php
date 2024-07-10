<nav class="navbar  navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container mt-2 mb-1">

        <a class="navbar-brand h1 mb-0" href="adminPanel.php">
            <img class="me-3" src="resources/resoimg/RenuProductsLogo-01.svg" height="25" />
            Renu Foods (PVT) LTD
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <a class="navbar-brand ms-3 mb-0" href="adminPanel.php">
                    <button class="btn btn-light rounded-3" type="button">
                        <i class="bi bi-grid-1x2 me-2 "></i>
                        Dashbord
                    </button>
                </a>

                <a class="navbar-brand ms-3 mb-0" href="adminUserManagement.php">
                    <button class="btn btn-light rounded-3" type="button">
                        <i class="bi bi-person-check me-2 "></i>
                        User Management
                    </button>
                </a>

                <div class="btn-group">
                    <button class="btn btn-light rounded-3 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-bag-check me-2"></i>
                        Product Management
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminProductStatus.php">Product Management</a></li>
                        <li><a class="dropdown-item" href="adminProductManagement.php">Product Registration</a></li>

                    </ul>
                </div>

                <a class="navbar-brand ms-3 mb-0" href="adminStock.php">
                    <button class="btn btn-light rounded-3" type="button">
                        <i class="bi bi-clipboard2-pulse me-2 "></i>
                        Stock Management
                    </button>
                </a>

                <div class="btn-group">
                    <button class="btn btn-light rounded-3 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-journal-bookmark me-2"></i>
                        Reports
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminReportProduct.php">Product Report</a></li>
                        <li><a class="dropdown-item" href="adminStockReport.php">Stock Reports</a></li>
                        <li><a class="dropdown-item" href="adminUserReport.php">User Report</a></li>
                        <li><a class="dropdown-item" href="adminSellingReport.php">Selling Report</a></li>
                        <li><a class="dropdown-item" href="adminDailyIncomeReports.php">Daily Income</a></li>
                    </ul>
                </div>

                <a class="navbar-brand ms-3 mb-0" href="">
                    <button class="btn btn-light rounded-3" type="button" onclick="adminLogOut();">
                        <i class="bi bi-box-arrow-right me-2 "></i>
                        Log Out
                    </button>
                </a>
            </ul>
        </div>
    </div>
</nav>
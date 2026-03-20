<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PS Restaurant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg header px-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="main.php">
                <img src="images/logo.png" alt="PS Restaurant Logo" style="height: 50px;">
                <h1 class="mb-0 ms-2" style="color: #E2c785; font-size: 1.5rem;">PS Restaurant</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                style="background-color: #E2c785;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav icons mt-3 mt-lg-0">
                    <a class="nav-link mx-2" href="main.php"><i class="bi bi-house-door"></i>Home</a>
                    <a class="nav-link mx-2" href="2.php"><i class="bi bi-cart3"></i>Cart</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container mt-4">

        <div class="row">

            <!-- CART ITEMS -->
            <div class="col-lg-7 mb-4">

                <div id="cartItemsContainer">
                    <!-- Dynamic Cart Items -->
                </div>


                <button class="add-btn" onclick="window.location.href='main.php'">ADD ITEMS</button>

            </div>


            <!-- TOTAL BOX -->
            <div class="col-lg-5">

                <div class="total-box">

                    <h4>Total Amount</h4>

                    <h3 id="totalPrice">XXXX.XX</h3>

                    <button class="order-btn" onclick="openPayment()">Place Order</button>

                </div>

            </div>

        </div>

    </div>


    <!-- PAYMENT MODAL -->

    <div id="paymentModal" class="payment-modal">

        <div class="payment-box" id="paymentDetails">

            <h2>Total Billing Amount is</h2>

            <h1 id="billAmount">XXXX.XX</h1>

            <div class="mt-4 form-group justify-content-center d-flex align-items-center gap-2">

                <label class="fw-bold">Pay in :</label>

                <select id="paymentMethod" onchange="checkPaymentMethod()" class="border border-dark fw-bold p-1">
                    <option>Choose</option>
                    <option>Cash</option>
                    <option>Card</option>
                </select>

            </div>

            <div id="receiveCashMsg" class="receive-cash" style="display: none;">
                Receive the cash
            </div>

            <div class="mt-4 buttons-container">

                <button onclick="window.location.href='main.php'" class="cancel">Cancel</button>

                <button onclick="processPayment()" class="pay">Pay Now</button>

            </div>

        </div>

        <div class="payment-box" id="paymentSuccess" style="display: none;">
            <h2>Payment Successful !</h2>
            <h1 id="successAmount">XXXX.XX</h1>

            <div class="success-icon my-4">
                <i class="bi bi-check"></i>
            </div>

            <div class="action-btns mt-4">
                <button onclick="goHome()" class="home-btn"><i class="bi bi-house-door"></i></button>
                <button onclick="window.location.href='index.php'" class="hourglass-btn"><i
                        class="bi bi-hourglass-split"></i></button>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
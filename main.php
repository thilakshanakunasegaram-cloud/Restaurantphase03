<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PS Restaurant</title>

    <!-- Bootstrap -->
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

        <div class="d-flex justify-content-end mb-4">
            <select class="form-select w-auto" id="foodFilter" onchange="filterFood()">
                <option value="all">Foods</option>
                <option value="veg">Veg</option>
                <option value="nonveg">Non-Veg</option>
            </select>
        </div>


        <!-- Food Cards -->
        <div class="row g-4" id="foodContainer">

            <!-- VEG ITEMS -->
            <!-- Rice & curry -->
            <div class="col-12 col-sm-6 col-lg-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/rice_and_curry.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Rice & curry</h5>
                        <p class="price">Rs.400</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Veg fried rice -->
            <div class="col-md-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/veg Fried rice.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Veg fried rice</h5>
                        <p class="price">Rs.700</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Veg briyani -->
            <div class="col-md-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/veg briyani.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Veg briyani</h5>
                        <p class="price">Rs.750</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dosai -->
            <div class="col-md-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/Dhosai.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Dosai</h5>
                        <p class="price">Rs.150</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Veg koththu -->
            <div class="col-md-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/veg kottu.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Veg koththu</h5>
                        <p class="price">Rs.800</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Veg roll -->
            <div class="col-md-4 food-card" data-type="veg">
                <div class="card foodBox">
                    <img src="images/rolls.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Veg roll</h5>
                        <p class="price">Rs.80</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- NON-VEG ITEMS -->
            <!-- Chicken Fried rice -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/Chicken fried rice.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Chicken Fried rice</h5>
                        <p class="price">Rs.1200</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mutton Fried rice -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/muttonfriedrice.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Mutton Fried rice</h5>
                        <p class="price">Rs.1350</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chicken briyani -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/Chicken briyani.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Chicken briyani</h5>
                        <p class="price">Rs.1400</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chicken koththu -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/Chicken kottu.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Chicken koththu</h5>
                        <p class="price">Rs.950</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Beef koththu -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/beefkottu.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Beef koththu</h5>
                        <p class="price">Rs.1000</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Burger -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/burger.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Burger</h5>
                        <p class="price">Rs.800</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chicken noodles -->
            <div class="col-md-4 food-card" data-type="nonveg">
                <div class="card foodBox">
                    <img src="images/chicken noodles.jpeg" class="card-img-top">
                    <div class="card-body">
                        <h5>Chicken noodles</h5>
                        <p class="price">Rs.650</p>
                        <div class="qty">
                            <button onclick="decrease(this)">-</button>
                            <span>0</span>
                            <button onclick="increase(this)">+</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
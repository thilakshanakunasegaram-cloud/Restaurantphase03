<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS Restaurant - Login</title>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>

    <div class="container">
        <div class="login-box">

            <h1>Welcome</h1>
            <br>
            <form id="loginForm" action="main.php">

                Username<br> <input type="text" name="username" required>
                <br>
                Cashier ID <br> <input type="text" id="cashierIdInput" name="cashier_id" pattern="\d{4}" maxlength="4"
                    title="Enter exactly a 4-digit Cashier ID" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    required>

                <button type="submit" class="login-btn">Login</button>

            </form>

        </div>
        <div class="image-box">
            <img src="images/food.jpg" alt="Food Image">
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            const cashierId = document.getElementById('cashierIdInput').value;
            localStorage.setItem('cashier_id', cashierId);
        });
    </script>

</body>

</html>

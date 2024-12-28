<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with Promo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }

        .login-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            color: #333;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            transform: scale(0.95);
        }

        .form-label {
            font-size: 1rem;
            font-weight: 500;
        }

        .logo {
            text-align: center;
            margin: 20px 0 40px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        .promo-section {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            color: #333;
            margin-top: 20px;
        }

        .promo-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #6a11cb;
        }

        .promo-section .promo-item {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .promo-section .promo-item img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .promo-section .promo-item p {
            margin: 0;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <!-- Logo -->
    <div class="logo">
        <img src="/storage/General/pelajarinlogoMain.png" alt="Pelajarin Logo">
    </div>

    <!-- Login Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center" style="margin-top: -40px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <div class="text-center">
                            <h2 class="mb-4">Welcome Back!</h2>
                        </div>
                        <form action="/login" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" required />
                                <label class="form-label">Email Address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" required />
                                <label class="form-label">Password</label>
                            </div>

                            <!-- Sign In button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                            <!-- Register button -->
                            <a href="register" class="btn btn-secondary btn-lg btn-block mt-3">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotion Section -->
    <section class="promo-section container">
        <h2 class="text-center">Why Choose Pelajarin?</h2>
        <div class="promo-item">
            <img src="https://via.placeholder.com/50" alt="Promo 1">
            <p>Get access to top-rated mentors and exclusive bootcamp sessions.</p>
        </div>
        <div class="promo-item">
            <img src="https://via.placeholder.com/50" alt="Promo 2">
            <p>Save 50% on your first course with our limited-time offer!</p>
        </div>
        <div class="promo-item">
            <img src="https://via.placeholder.com/50" alt="Promo 3">
            <p>Join a vibrant community of learners and professionals.</p>
        </div>
        <div class="promo-item">
            <img src="https://via.placeholder.com/50" alt="Promo 4">
            <p>Gain lifetime access to courses and materials.</p>
        </div>
        <div class="promo-item">
            <img src="https://via.placeholder.com/50" alt="Promo 5">
            <p>Earn certificates that boost your career and resume.</p>
        </div>
    </section>
</body>
</html>

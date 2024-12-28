<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }

        .register-container {
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
    </style>
</head>
<body>
    <!-- Logo -->
    <div class="logo">
        <img src="/storage/General/pelajarinlogoMain.png" alt="Pelajarin Logo">
    </div>

    <!-- Register Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center" style="margin-top: -40px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="register-container">
                        <div class="text-center">
                            <h2 class="mb-4">Create Your Account</h2>
                        </div>
                        <form action="/register" method="POST">
                            @csrf
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="name" class="form-control form-control-lg" required />
                                <label class="form-label">Full Name</label>
                            </div>

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

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" required />
                                <label class="form-label">Confirm Password</label>
                            </div>

                            <!-- Register button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>

                            <!-- Login button -->
                            <a href="login" class="btn btn-secondary btn-lg btn-block mt-3">Already have an account? Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

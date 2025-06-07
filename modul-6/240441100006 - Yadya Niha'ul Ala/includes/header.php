<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../assets/citrus-slice.png">
    <title>Manajemen | Zhizi Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shippori+Antique&display=swap">
    <link rel="stylesheet" href="assets/style.css">

    <style>
        body {
            background-color:rgb(255, 247, 243);
            color: #3C3C3C;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .zhizi-navbar {
            background-color: #fff;
            border-bottom: 2px solid #fe552a;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration; none;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .zhizi-navbar .navbar-title {
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
            margin: 0;
            color: #fe552a;
        }

        form label {
        font-weight: 500;
        margin-bottom: 0.3rem;
        display: block;
        }

        form .form-control, form select {
            margin-bottom: 1rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.95rem;
            border-radius: 0.5rem;
            border: 1px solid #fe552a;
        }
            
        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #fe552a;
        }

        .table th {
            background-color: #fe552a;
            color: white;
            vertical-align: middle;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .table-bordered td, .table-bordered th {
            border-color: #fbf3f0;
        }

        .btn-accent {
            background-color: #fe552a;
            color: white;
            border: 1px solid #fe552a;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            background-color: #000;
            color: #fff;
            border: 1px solid #fff;
        }

        .container-content {
            padding: 30px;
        }

        .btn-secondary {
            background-color: #fff !important;
            color: #fe552a !important;
            border: 1px solid #fe552a !important;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color:rgb(255, 60, 11) !important;
            color: #ffffff !important;
        }

        .btn-outline-secondary {
            background-color: #fff;
            color: #3C3C3C;
            border: 1px solid rgb(22, 22, 22);
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color:rgb(36, 36, 36);
            color: #fff;
        }

        .btn-outline-accent {
            background-color: #fff;
            color: #fe552a;
            border: 1px solid #fe552a;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: #fe552a;
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="zhizi-navbar">
        <a class="navbar-title" href="../dashboard.php">Zhizi Agency</a>
        <a href="../auth/logout.php" class="btn btn-accent">Logout</a>
    </div>
    <!-- <div class="container-content"> -->

    <div class="container mt-4">

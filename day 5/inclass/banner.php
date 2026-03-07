<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f5;
            padding: 30px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding-bottom: 30px;
        }

        .search-box {
            background: #f5f5f5;
            padding: 20px;
            border: 1px solid #ddd;
            width: 900px;
        }

        .search-form {
            display: flex;
            gap: 20px;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
            color: #333;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        select:focus {
            border-color: #4da3ff;
            box-shadow: 0 0 3px rgba(77, 163, 255, 0.6);
        }

        .quick-search {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .place-list {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            padding-bottom: 30px;
        }

        .place-card {
            width: 250px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
            transition: 0.3s;
        }

        .place-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .place-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 6px;
        }

        .place-card h3 {
            margin: 15px 0 10px;
            font-size: 18px;
            color: #333;
        }

        .old-price {
            color: #888;
            text-decoration: line-through;
            font-size: 14px;
            margin: 5px 0;
        }

        .price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            margin: 3px;
            color: white;
        }

        .btn-view {
            background: #3498db;
        }

        .btn-cart {
            background: #e74c3c;
        }

        .btn:hover {
            opacity: 0.85;
        }

        footer {
            background-color: gray;
            text-align: center;
            padding: 40px 20px;
        }

        footer h1 {
            margin-bottom: 15px;
            font-size: 28px;
            color: white;
        }

        footer p {
            font-size: 16px;
            color: white;
            line-height: 1.6;
        }
    </style>
</head>

<body style="padding: 0; margin: 0;">
    <img src="image/image.png" style="width:100%; height:800px; padding:0">
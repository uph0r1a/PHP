<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 10px 0;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<h1>Add book</h1>

<form action="/books" method="post">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <br>

    <label for="author">Author</label>
    <input type="text" name="author" id="author">
    <br>

    <label for="price">Price</label>
    <input type="text" name="price" id="price">
    <br>

    <button type="submit">Save</button>
</form>

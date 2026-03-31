<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        padding: 40px;
        color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #222;
    }

    form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin: 0 auto 40px auto;
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

    a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        display: inline-block;
        margin-bottom: 15px;
        transition: color 0.3s;
    }

    a:hover {
        color: #0056b3;
    }
</style>

<h1>Edit Book</h1>

<form action="/books/{{ $book->id }}" method="post">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $book->title }}">
    <br>

    <label for="author">Author</label>
    <input type="text" name="author" value="{{ $book->author }}">
    <br>

    <label for="title">Price</label>
    <input type="text" name="price" value="{{ $book->price }}">
    <br>

    <button type="submit">Update</button>
</form>

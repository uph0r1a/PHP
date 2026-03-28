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

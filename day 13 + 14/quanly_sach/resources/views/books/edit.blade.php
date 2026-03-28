<h1>Edit Book</h1>

<form action="/books/{{$book->id}}" method="post">
    @csrf
    @method("PUT")

    <label for="title">Title</label>
    <input type="text" name="title" value="{{$book->title}}">
    <br>

    <label for="author">Author</label>
    <input type="text" name="author" value="{{$book->author}}">
    <br>

    <label for="title">Price</label>
    <input type="text" name="price" value="{{$book->price}}">
    <br>

    <button type="submit">Update</button>
</form>
<h1>Book List</h1>

<a href="/books/create">Add Book</a>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->price}}</td>
                <td>
                    <a href="/books/{{$book->id}}/edit">Edit</a>
                    <form action="/books/{{$book->id}}" method="post" style="display:inline;">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
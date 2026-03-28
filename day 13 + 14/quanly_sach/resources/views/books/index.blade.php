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

    a {
        text-decoration: none;
        color: #007bff;
        margin-bottom: 20px;
        display: inline-block;
        font-weight: bold;
        transition: color 0.3s;
    }

    a:hover {
        color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    thead {
        background-color: #007bff;
        color: white;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #e6f0ff;
    }

    button,
    form button {
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    button {
        background-color: #dc3545;
        color: white;
    }

    button:hover {
        background-color: #b02a37;
    }

    td a {
        margin-right: 8px;
        color: #ffc107;
        font-weight: bold;
    }

    td a:hover {
        color: #e0a800;
    }

    form {
        display: inline;
    }
</style>

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
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    <a href="/books/{{ $book->id }}/edit">Edit</a>
                    <form action="/books/{{ $book->id }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

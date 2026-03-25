<?php
class Book
{
    private $isbn, $title, $author, $price, $publishYear;

    public function __construct($isbn, $title, $author, $price, $publishYear)
    {
        $this->isbn = $isbn;
        $this->title =  $title;
        $this->author = $author;
        $this->price = $price;
        $this->publishYear = $publishYear;
    }

    public function getISBN()
    {
        return $this->isbn;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getPublishYear()
    {
        return $this->publishYear;
    }

    public function getAge()
    {
        return 2025 - $this->publishYear;
    }

    public function isExpensive()
    {
        return $this->price > 500000;
    }
}

$library = [
    new Book("9786045678123", "The Silent River", "Nguyen Minh Anh", 125000, 2018),
    new Book("9781987654321", "Shadows of Tomorrow", "Tran Bao Chau", 178500, 2021),
    new Book("9780312345678", "Echoes in the Wind", "Le Quang Huy", 142000, 2019),
    new Book("9780745983210", "The Last Lantern", "Pham Thu Trang", 1000000, 2023)
];
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: #3498db;
            color: white;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        tbody tr:hover {
            background: #d6eaf8;
            transition: 0.3s;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
        }

        td:last-child {
            font-weight: bold;
        }

        .yes {
            color: #e74c3c;
        }

        .no {
            color: #27ae60;
        }
    </style>
</head>

<body>

    <h1>Library Books</h1>

    <table>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price (VND)</th>
                <th>Publish Year</th>
                <th>Book Age</th>
                <th>Expensive?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($library as $book): ?>
                <tr>
                    <td><?= $book->getISBN() ?></td>
                    <td><?= $book->getTitle() ?></td>
                    <td><?= $book->getAuthor() ?></td>
                    <td><?= number_format($book->getPrice()) ?></td>
                    <td><?= $book->getPublishYear() ?></td>
                    <td><?= $book->getAge() ?></td>
                    <td class="<?= $book->isExpensive() ? 'yes' : 'no' ?>">
                        <?= $book->isExpensive() ? "Yes" : "No" ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>
<?php
class Student
{
    private $id, $name, $age, $grade;

    public function __construct($id, $name, $age, $grade)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function getRank()
    {
        if ($this->grade >= 9) {
            return "Excellent";
        } elseif ($this->grade >= 7) {
            return "Good";
        } elseif ($this->grade >= 5) {
            return "Average";
        } else {
            return "Weak";
        }
    }
}

$students = [
    new Student("SV001", "Nguyen Van A", 20, 8.5),
    new Student("SV002", "Tran Thi B", 19, 9.2)
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1e7ff;
        }
    </style>
</head>

<body>

    <h1>Student List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student->getID() ?></td>
                    <td><?= $student->getName() ?></td>
                    <td><?= $student->getAge() ?></td>
                    <td><?= $student->getGrade() ?></td>
                    <td><?= $student->getRank() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>
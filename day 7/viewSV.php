<?php require_once "Sinhvien.php";
$dsSinhVien = [
    new Sinhvien("SV001", "Nguyen Van An", 20, "an.nguyen@example.com", "CNTT K65", 8.5, "Dang hoc"),
    new Sinhvien("SV002", "Tran Thi Binh", 19, "binh.tran@example.com", "Kinh te K66", 7.2, "Dang hoc"),
    new Sinhvien("SV003", "Le Van Cuong", 21, "cuong.le@example.com", "Co Khi K64", 9.1, "Tot nghiep"),
    new Sinhvien("SV004", "Pham Thi Dung", 20, "dung.pham@example.com", "CNTT K65", 6.8, "Dang hoc"),
    new Sinhvien("SV005", "Doan Van Em", 22, "em.doan@example.com", "Xay dung K63", 5.5, "Bao luu"),
];

if (isset($_COOKIE["sinhVien"])) {

    $savedSinhVien = json_decode($_COOKIE["sinhVien"], true);

    $dsSinhVien[] = new Sinhvien(
        "SV00" . (count($dsSinhVien) + 1),
        $savedSinhVien["name"] ?? "",
        $savedSinhVien["age"] ?? "",
        $savedSinhVien["email"] ?? "",
        $savedSinhVien["lop"] ?? "",
        $savedSinhVien["diemTB"] ?? 0
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Xem thong tin sinh vien</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .status-danghoc {
            color: green;
            font-weight: bold;
        }

        .status-totnghiep {
            color: blue;
            font-weight: bold;
        }

        .status-baoluu {
            color: red;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Danh sach sinh vien</h2>
        <?php if (empty($dsSinhVien)): ?>
            <p style="text-align:center">Hien chua co thong tin sinh vien nao</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Ma SV</th>
                        <th>Ho va ten</th>
                        <th>Tuoi</th>
                        <th>Email</th>
                        <th>Lop</th>
                        <th>Diem TB</th>
                        <th>Hoc luc</th>
                        <th>Trang thai</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($dsSinhVien as $sv): ?>
                        <tr>
                            <?php
                            $lopOptions = ["CNTT", "Kinh te", "Co Khi", "Xay dung"];

                            if ($sv->getLop() == "") {
                                $sv->setLop($lopOptions[array_rand($lopOptions)] . " K" . (85 - $sv->getAge()));
                            }

                            if ($sv->getDiemTB() == "" || $sv->getDiemTB() == 0) {
                                $sv->setDiemTB(rand(10, 100) / 10);
                            }
                            ?>

                            <td><?= htmlspecialchars($sv->getMaSV()) ?></td>
                            <td><?= htmlspecialchars($sv->getName()) ?></td>
                            <td><?= $sv->getAge() ?></td>
                            <td><?= htmlspecialchars($sv->getEmail()) ?></td>
                            <td><?= htmlspecialchars($sv->getLop()) ?></td>
                            <td><?= number_format($sv->getDiemTB(), 1) ?></td>
                            <td><?= $sv->getHocLuc() ?></td>

                            <td class="<?=
                                        $sv->getTrangThai() == "Dang hoc" ? "status-danghoc"
                                            : ($sv->getTrangThai() == "Tot nghiep" ? "status-totnghiep" : "status-baoluu")
                                        ?>">
                                <?= htmlspecialchars($sv->getTrangThai()) ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>
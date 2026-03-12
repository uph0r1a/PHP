<?php require_once "Sinhvien.php";
$dsSinhVien = [
    new Sinhvien("SV001", "Nguyen Van An", 20, "an.nguyen@example.com", "CNTT K65", 8.5, "Dang hoc"),
    new Sinhvien("SV002", "Tran Thi Binh", 19, "binh.tran@example.com", "Kinh te K66", 7.2, "Dang hoc"),
    new Sinhvien("SV003", "Le Van Cuong", 21, "cuong.le@example.com", "Co Khi K64", 9.1, "Tot nghiep"),
    new Sinhvien("SV004", "Pham Thi Dung", 20, "dung.pham@example.com", "CNTT K65", 6.8, "Dang hoc"),
    new Sinhvien("SV005", "Doan Van Em", 22, "em.doan@example.com", "Xay dung K63", 5.5, "Bao luu"),
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thong tin sinh vien</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Danh sach sinh vien</h2>
        <?php if (empty($dsSinhVien)): ?>
            <div class="alert alert-info text-center">
                Hien chua co thong tin sinh vien nao
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
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
                        <?php foreach ($dsSinhVien as $index => $sv): ?>
                            <tr>
                                <td><?= htmlspecialchars($sv->getMaSV()) ?></td>
                                <td><?= htmlspecialchars($sv->getName()) ?></td>
                                <td><?= $sv->getAge() ?></td>
                                <td><?= htmlspecialchars($sv->getEmail()) ?></td>
                                <td><?= htmlspecialchars($sv->getLop()) ?></td>
                                <td><?= number_format($sv->getDiemTB(), 1) ?></td>
                                <td><?= $sv->getHocLuc() ?></td>
                                <td class="<?php if ($sv->getTrangThai() == "Dang hoc") {
                                                echo "status-danghoc";
                                            } elseif ($sv->getTrangThai() == "Tot nghiep") {
                                                echo "status-totnghiep";
                                            } else {
                                                echo "status-baoluu";
                                            } ?>"><?= htmlspecialchars($sv->getTrangThai()) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
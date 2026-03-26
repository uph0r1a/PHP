<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 30px;
            background: #f8f9fa;
        }

        .table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Sinh viên</h2>
            <a href="{{ route('sinhvien.create') }}" class="btn btn-success">+ Thêm Sinh Viên</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã SV</th>
                    <th>Họ và Tên</th>
                    <th>Tuổi</th>
                    <th>Email</th>
                    <th>Lớp</th>
                    <th>Điểm TB</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sinhViens as $sv)
                    <tr>
                        <td><strong>{{ $sv->ma_sv }}</strong></td>
                        <td>{{ $sv->ho_ten }}</td>
                        <td>{{ $sv->tuoi }}</td>
                        <td>{{ $sv->email }}</td>
                        <td>{{ $sv->lop }}</td>
                        <td>{{ number_format($sv->diem_tb, 1) }}</td>
                        <td>
                            <a href="{{ route('sinhvien.show', $sv->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('sinhvien.edit', $sv->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="{{ route('sinhvien.destroy', $sv->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Chưa có sinh viên nào trong danh sách.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

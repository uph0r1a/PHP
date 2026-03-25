<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhViens = SinhVien::all();
        return view('sinhvien.index', compact('sinhViens'));
    }

    public function create()
    {
        return view('sinhvien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_sv'   => 'required|unique:sinh_viens',
            'ho_ten'  => 'required|string|max:100',
            'tuoi'    => 'required|integer|min:16',
            'email'   => 'required|email|unique:sinh_viens',
            'lop'     => 'required',
            'diem_tb' => 'required|numeric|min:0|max:10',
        ]);

        SinhVien::create($request->all());

        return redirect()->route('sinhvien.index')
            ->with('success', 'Thêm sinh viên thành công!');
    }

    public function show(SinhVien $sinhVien)
    {
        return view('sinhvien.show', compact('sinhVien'));
    }

    public function edit(SinhVien $sinhVien)
    {
        return view('sinhvien.edit', compact('sinhVien'));
    }

    public function update(Request $request, SinhVien $sinhVien)
    {
        $request->validate([
            'ho_ten'  => 'required|string|max:100',
            'tuoi'    => 'required|integer|min:16',
            'email'   => 'required|email|unique:sinh_viens,email,' . $sinhVien->id,
            'lop'     => 'required',
            'diem_tb' => 'required|numeric|min:0|max:10',
        ]);

        $sinhVien->update($request->all());

        return redirect()->route('sinhvien.index')
            ->with('success', 'Cập nhật thành công!');
    }

    public function destroy(SinhVien $sinhVien)
    {
        $sinhVien->delete();

        return redirect()->route('sinhvien.index')
            ->with('success', 'Xóa sinh viên thành công!');
    }
}

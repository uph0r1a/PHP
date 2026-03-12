<?php require_once "Person.php";
class Sinhvien extends Person
{
    private $maSV, $lop, $diemTB, $trangThai;

    public function __construct($maSV, $name, $age, $email, $lop, $diemTB, $trangThai = "Dang hoc")
    {
        parent::__construct($name, $age, $email);

        $this->maSV = $maSV;
        $this->lop = $lop;
        $this->diemTB = $diemTB;
        $this->trangThai = $trangThai;
    }

    public function getMaSV()
    {
        return $this->maSV;
    }

    public function getLop()
    {
        return $this->lop;
    }

    public function getDiemTB()
    {
        return $this->diemTB;
    }

    public function getTrangThai()
    {
        return $this->trangThai;
    }

    public function setMaSV($maSV)
    {
        $this->maSV = $maSV;
    }

    public function setLop($lop)
    {
        $this->lop = $lop;
    }

    public function setDiemTB($diemTB)
    {
        $this->diemTB = $diemTB;
    }

    public function setTrangThai($trangThai)
    {
        $this->trangThai = $trangThai;
    }

    public function getSinhVienInfo()
    {
        return "Ma SV: {$this->maSV} | " . "Ten: {$this->getName()} | " . "Ma SV: {$this->getAge()} | " . "Ma SV: {$this->getEmail()} | "  . " | " . "Lop: {$this->lop} | " . "Diem TB: {$this->diemTB} | " . "Trang thai: {$this->trangThai}";
    }

    public function getHocLuc()
    {
        if ($this->diemTB >= 8.0) {
            return "Gioi";
        }

        if ($this->diemTB >= 6.5) {
            return "Kha";
        }

        if ($this->diemTB >= 5.0) {
            return "Trung binh";
        }

        if ($this->diemTB == 0.0) {
            return "";
        }

        return "Yeu";
    }
}

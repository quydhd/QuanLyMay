<?php


class May extends ChiTietPhuc
{
    public $ten;
    //ham nhap may
    public function Nhap($ma_so = null, $ten = null, $danh_sach_chi_tiet = null)
    {
        $this->ma_so = readline('Nhap ma so may: ');
        while ($this->ma_so[0]!='M')  //Kiem tra nhap ma so May
        {
            echo 'Ma so May co dang M** VD: M01, M02,M03..';
            echo "\n";
            $this->ma_so = readline('Moi nhap lai ma so may: ');
        }
        $this->ten = readline('Nhap ten may: ');
        $this->so_luong_chi_tiet = readline('Nhap so luong chi tiet cua may: ');
        for ($i = 0; $i <$this->so_luong_chi_tiet;$i++)
        {
            echo 'D: Chi tiet Don';
            echo "\n";
            echo'P: Chi tiet Phuc';
            echo "\n";
            $loai_chi_tiet = readline('Nhap loai chi tiet: ');
            $new_chi_tiet = null;
            if ($loai_chi_tiet == 'D')
            {
                $new_chi_tiet = new ChiTietDon();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);

            }
            if ($loai_chi_tiet == 'P')
            {
                $new_chi_tiet = new ChiTietPhuc();
                $new_chi_tiet->Nhap();
                array_push($this->danh_sach_chi_tiet,$new_chi_tiet);
            }
        }

    }
    //ham xuat thong tin may
    public function xuatThongTin()
    {
        echo '+------------------------------------+';
        echo "\n";
        echo 'May: ';
        echo ' ';
        echo $this->ma_so;
        echo ' ';
        echo 'bao gom: ';
        echo $this->so_luong_chi_tiet;
        echo ' chi tiet';
        echo "\n";
        echo '------------------';
        echo "\n";
        echo 'Thong tin chi tiet';
        echo "\n";

        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'M')
            {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            }
            else
            {

                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
            }
//                $this->danh_sach_chi_tiet[$i]->xuatThongTin();
        }

    }
    //ham tinh tong tien may
    public function tinhTien()
    {
        $tongTien = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            if (substr($this->danh_sach_chi_tiet[$i]->ma_so,0,1) == 'M')
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
            else
            {
                $tongTien += $this->danh_sach_chi_tiet[$i]->tinhTien();
            }
        }
        return $tongTien;
    }
    //ham tinh khoi luong may
    public function tinhKhoiLuong()
    {
        $tongKL = 0;
        for($i=0; $i<$this->so_luong_chi_tiet; $i++)
        {
            $tongKL += $this->danh_sach_chi_tiet[$i]->tinhKhoiLuong();
        }
        return $tongKL;
    }

}
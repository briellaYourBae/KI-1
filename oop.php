<?php

trait UmurTrait {
    public function hitungUmur($tanggalLahir) {
        $today = new DateTime();
        $birthday = new DateTime($tanggalLahir);
        $umur = $today->diff($birthday)->y;
        return $umur;
    }
}

interface Identitas {
    public function perkenalan();
    public function getNama();
}

class Individu {
    protected $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function perkenalan() {
        echo "Nama saya adalah " . $this->nama . ".\n";
    }
}

class Mahasiswa extends Individu implements Identitas {
    use UmurTrait;

    private $nim;

    public function __construct($nama, $nim) {
        parent::__construct($nama);
        $this->nim = $nim;
    }

    public function perkenalan() {
        echo "Saya adalah seorang mahasiswa dengan nama " . $this->nama . " dan NIM " . $this->nim . ".\n";
    }

    public function getNama() {
        return $this->nama;
    }
}

$mahasiswa = new Mahasiswa("Muhammad Faqih", "06660");

$mahasiswa->perkenalan();
$tanggalLahir = "2005-09-11";
$umur = $mahasiswa->hitungUmur($tanggalLahir);
echo "Umur saya adalah " . $umur . " tahun.\n";

echo "Nama saya adalah " . $mahasiswa->getNama() . ".\n";
?>

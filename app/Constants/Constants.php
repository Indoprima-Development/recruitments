<?php

namespace App\Constants;

class Constants
{
    const AppName = 'recruitment';

    const ApiPegawaiBaseUrl = '127.0.0.1:8000';

    const StatusForm = [
        0 => "CV Review",
        1 => "Interview HC",
        2 => "Psikotest",
        3 => "Interview User",
        4 => "Interview Direksi",
        5 => "Finalisasi",
        6 => "MCU",
        7 => "Join",
        9 => "NOT OK"
    ];
}

class DatadiriConst{
    const Agama = ["Islam","Kristen","Katolik","Hindu","Budha","Konghucu"];
    const StatusRumah = ["Milik Pribadi","Milik Orang Tua","Kost","Kontrak","Apartment"];
    const GolonganDarah = ["A","B","AB","O"];
    const SIM = ["A","B1","B2","C","D"];
    const Kendaraan = ["Roda Dua","Roda Empat"];
}

class DataPendidikanConst{
    const Tingkat = ["SD","SMP","SMA","S1","S2","S3"];
}

class DataKeluargaConst{
    const StatusHubungan = ["Ayah","Ibu","Saudara","Istri/Suami","Anak","Mertua"];
}

class DataKemampuan{
    const LevelKemampuan = ["Basic","Middle","Expert"];
}

class DataOrganisasi{
    const TingkatOrganisasi = ["Jurusan","Kampus","Nasional","Lainnya"];
}

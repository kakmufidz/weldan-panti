<?php

function umur($bornDate, $keterangan = null)
{
    // The birthdate in the format "YYYY-MM-DD"
    $birthdate = date("Y-m-d", strtotime($bornDate));
    // Create a DateTime object for the birthdate
    $birthDate = new DateTime($birthdate);
    // Get the current date
    $currentDate = new DateTime();
    // Calculate the interval between the birthdate and the current date
    $age = $currentDate->diff($birthDate);
    // Access the "years" property of the $age object to get the age
    $ageYears = $age->y;
    $ageMonths = $age->m;
    $ageDays = $age->d;
    if ($keterangan == "tahun") {
        return $ageYears . " Tahun";
    } else {
        return $ageYears . " Tahun " . $ageMonths . " Bulan " . $ageDays . " Hari";
    }
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

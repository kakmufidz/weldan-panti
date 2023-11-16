<?php

function rupiah($angka)
{
  $hasil_rupiah = "Rp. " . number_format($angka, 0, '.', ',');
  return $hasil_rupiah;
}

function rp_count($angka)
{
  $hasil = number_format($angka, 0, '.', ',');
  return $hasil;
}
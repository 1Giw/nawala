<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>SIM Surat Masuk & Keluar </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Jumlah Surat Keluar Tahun <?php $tahun = date('Y');
                                                                                echo $tahun;  ?></h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                        datasets: [{
                                            label: 'Surat Keluar',
                                            data: [
                                                <?= $this->referensi->jmlSuratKeluar('01', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('02', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('03', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('04', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('05', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('06', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('07', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('08', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('09', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('10', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('11', $tahun); ?>,
                                                <?= $this->referensi->jmlSuratKeluar('12', $tahun); ?>
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar Chart -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<script>
    const LabelsPad = [
    'PAD',
    'BELANJA',
    'PEMBIAYAAN',
];

const DataPad = {
    labels: LabelsPad,
    datasets: [
        {
            label: 'Sebelum Perubahan',
            backgroundColor: 'hsl(350, 87%, 55%)',
            borderColor: 'hsl(350, 87%, 55%)',
            data: [jumlah_pendapatan1, jumlah_belanja1, jumlah_pembiayaan1],
        },
        {
            label: 'Selisih Anggaran',
            backgroundColor: '#1877F2',
            borderColor: '#1877F2',
            data: [selisih_pendapatan, selisih_belanja, selisih_pembiayaan],
        },
        {
            label: 'Setelah Perubahan',
            backgroundColor: '#2ABBA7',
            borderColor: '#2ABBA7',
            data: [jumlah_pendapatan2, jumlah_belanja2, jumlah_pembiayaan2],
        }

    ]
};

const config = {
    type: 'bar',
    data: DataPad,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Grafik APBD Prov.NTB ' + tahun_anggaran
            }
        }
    }
};

const apbd = new Chart(
    document.getElementById('apbd-chart'),
config
);
</script>

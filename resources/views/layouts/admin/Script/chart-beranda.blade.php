<script>
    const Labels = [
        'PAD',
        'BELANJA',
        'PEMBIAYAAN',
    ];

    const Data = {
        labels: Labels,
        datasets: [{
                label: 'PAD',
                backgroundColor: 'hsl(350, 87%, 55%)',
                borderColor: 'hsl(350, 87%, 55%)',
                data: [PadAnggaran, PadSelisih, PadPerubahan],
            },
            {
                label: 'BELANJA',
                backgroundColor: '#1877F2',
                borderColor: '#1877F2',
                data: [BelanjaAnggaran, BelanjaSelisih, BelanjaPerubahan],
            },
            {
                label: 'PEMBIAYAAN',
                backgroundColor: '#2ABBA7',
                borderColor: '#2ABBA7',
                data: [BiayaAnggaran, BiayaSelisih, BiayaPerubahan],
            }

        ]
    };

    const config = {
        type: 'bar',
        data: Data,
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
        document.getElementById('beranda-chart'),
        config
    );
</script>

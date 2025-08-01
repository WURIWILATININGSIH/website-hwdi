<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HWDI Lampung</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1">
    </script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000"
        data-border-radius="small"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">Sistem Informasi Pendataan Penyandang
                        Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Ringkasan</a>
                <a href="{{ route('data.admin') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Admin</a>
                <a href="{{ route('data.anggota.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    @php
        $jenisDisabilitas = [
            'Tunanetra',
            'Tunarungu',
            'Tunawicara',
            'Tunagrahita',
            'Tunadaksa',
            'Tunalaras',
            'Disabilitas Ganda',
        ];
    @endphp

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-lg font-medium mb-4">Statistik Utama</h2>
        <div class="grid grid-cols-2 gap-8">
            <div id="pieChart" style="height: 300px"></div>
            <div id="barChart" style="height: 300px"></div>
        </div>
    </div>

    <div class="space-y-8">
        @foreach ($jenisDisabilitas as $jenis)
            <div class="bg-white rounded-lg shadow" id="{{ Str::slug($jenis) }}">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis {{ $jenis }}</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @php $total = 0; @endphp
                    @foreach ($dataPerKabupaten as $data)
                        @php
                            $jumlah = $data[$jenis] ?? 0;
                            $total += $jumlah;
                        @endphp
                        <div class="grid grid-cols-2 px-6 py-3">
                            <span class="text-sm text-gray-600">{{ $data['nama'] }}</span>
                            <span class="text-sm text-gray-900">{{ $jumlah }}</span>
                        </div>
                    @endforeach
                    <div class="bg-gray-50 grid grid-cols-2 px-6 py-3">
                        <span class="font-medium">Total Anggota {{ $jenis }}</span>
                        <span class="font-medium">{{ $total }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        const pieChart = echarts.init(document.getElementById('pieChart'));
        const barChart = echarts.init(document.getElementById('barChart'));

        const disabilitasSummary = @json($disabilitasSummary);

        pieChart.setOption({
            tooltip: {
                trigger: 'item'
            },
            series: [{
                type: 'pie',
                radius: '60%',
                data: disabilitasSummary,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });

        barChart.setOption({
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: disabilitasSummary.map(item => item.name),
                axisLabel: {
                    rotate: 45
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: disabilitasSummary.map(item => item.value),
                type: 'bar',
                color: '#1F4690'
            }]
        });

        window.addEventListener('resize', function() {
            pieChart.resize();
            barChart.resize();
        });
    </script>
</body>

</html>

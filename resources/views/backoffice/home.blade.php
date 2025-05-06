@extends('backoffice.layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'ม.ค', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'
                    ],
                    datasets: [{
                        label: 'สมาชิก',
                        data: @json($listSumUserInMonths),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        fill: true
                    }]
                }
            });

            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: @json($listAssetInCategoriesLabel),
                    datasets: [{
                        data: @json($listAssetInCategoriesData),
                        backgroundColor: @json($listAssetInCategoriesColor)
                    }]
                }
            });
        })
    </script>
    <h1 class="text-2xl font-bold text-gray-800">
        <i class="fas fa-chart-line"></i>
        Dashboard
    </h1>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
            <div class="rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-blue-600 mb-1">สมาชิก</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalUsers}}</p>
                    </div>
                    <div class="text-gray-400">
                        <i class="fas fa-user text-4xl"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-md p-6 border-l-4 border-green-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-green-600 mb-1">ทรัพย์ที่ลงประกาศ</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalAssets}}</p>
                    </div>
                    <div class="text-gray-400">
                        <i class="fas fa-house text-4xl"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-md p-6 border-l-4 border-cyan-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-cyan-500 mb-1">ยอดวิวทั้งหมด</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalViews }}</p>
                    </div>
                    <div class="text-gray-400">
                        <i class="fas fa-eye text-4xl"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-yellow-500 mb-1">ประเภททรัพย์</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalAssetCategories }}</p>
                    </div>
                    <div class="text-gray-400">
                        <i class="fas fa-house text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
            <div class="xl:col-span-2">
                <div class="bg-white round-lg shadow-md">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 clas="font-semibold text-gray-800">สมาชิกทั้งหมดแยกตามเดือน</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-white rounded-lg shadow-md">
                    <div class="px-6 py-4 borde-b border-gray-200">
                        <h3 class="font-semibold text-gray-800">สัดส่วนทรัพย์แยกตามประเภท</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



























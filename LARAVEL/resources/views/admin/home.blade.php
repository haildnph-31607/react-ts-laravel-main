@extends('admin.layout')
@section('main')
    <div class="row">
        <div class="col-xl-6 col-lg-6  col-12">
            <div class="card widget-chart-two">
                <div class="float-left">
                    <div id="sparkline9" class="text-left"></div>
                </div>
                <div class="float-right widget-text">
                    <p class="text-muted mb-0 mt-2">Tổng Doanh Thu</p>
                    <h3 class="">{{number_format($totalRevenue,0,',','.')}} VNĐ</h3>
                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card widget-chart-two">
                <div class="float-left">
                    <div id="sparkline7" class="text-left"></div>
                </div>
                <div class="float-right widget-text">
                    <p class="text-muted mb-0 mt-2">Tổng Khách Hàng</p>
                    <h3 class="">{{$totalCustomers}}</h3>
                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card widget-chart-two">
                <div class="float-left">
                    <div id="sparkline10" class="text-left"></div>
                </div>
                <div class="float-right widget-text">
                    <p class="text-muted mb-0 mt-2">Khách Hàng Thân Thiết Nhất</p>
                    <h3 class="">{{$customer->name}}</h3>
                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card widget-chart-two">
                <div class="float-left">
                    <div id="sparkline1"></div>
                </div>
                <div class="float-right widget-text">
                    <p class="text-muted mb-0 mt-2">ADMIN</p>
                    <h3 class="">ngochai</h3>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <h4 class="header-title m-b-0">Doanh Thu</h4>
                <ul class="list-inline text-center gap-items-4 mb-30">
                    <li class="list-inline-item">
                        <span class="badge badge-lg badge-dot mr-1 p-0" style="background-color: #b1bccb;"></span>
                        <span>Doanh Thu</span>
                    </li>
                    <li class="list-inline-item">
                        <span class="badge badge-lg badge-dot mr-1 p-0" style="background-color: #7377e8"></span>
                        <span>Theo Tháng</span>
                    </li>
                </ul>
                <div id="morris-area-with-dotteds" style="height: 350px;" class="mt-4"></div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <h4 class="header-title m-b-0">Top 3 Sản Phẩm Bán Chạy Nhất</h4>

                <canvas id="myPieChart" height="300px"></canvas>

            </div>
        </div>

    </div>



    <script>
        let data = @json($revenueByProduct);
        var totalRevenue = data.reduce(function(acc, item) {
        return acc + item.total_revenue;
    }, 0);

    // Chuẩn bị dữ liệu cho biểu đồ
    var labels = data.map(function(item) {
        return item.name;
    });

    var revenues = data.map(function(item) {
        return (item.total_revenue / totalRevenue) * 100; // Tỷ lệ phần trăm doanh thu
    });

    // Vẽ biểu đồ
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh Thu Theo Sản Phẩm',
                data: revenues,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], // Màu sắc cho từng phần
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var label = tooltipItem.label || '';
                            if (label) {
                                var percentage = tooltipItem.raw.toFixed(2);
                                label += ': ' + percentage + '%';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>
<script>
        let revenueData = @json($monthlyRevenues);
        var morrisData = revenueData.map(function(item) {
            return {
                y: item.year + '-' + ('0' + item.month).slice(-2), // Format yyyy-mm
                a: parseFloat(item.total_revenue)
            };
        });


        console.log(morrisData);
        Morris.Area({
            element: 'morris-area-with-dotteds',
            data: morrisData,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Doanh Thu Theo Tháng'],
            pointSize: 3,
            fillOpacity: 0.4,
            pointStrokeColors: ['#ffffff'],
            behaveLikeLine: true,
            gridLineColor: '#eef0f2',
            lineWidth: 3,
            hideHover: 'auto',
            lineColors: ['#5b9bd1'],
            resize: true,
            xLabelFormat: function(x) {
                const date = new Date(x);
                const month = date.getMonth() + 1;
                return `Tháng ${month}`;
            }
        });
</script>

    </div>
@endsection

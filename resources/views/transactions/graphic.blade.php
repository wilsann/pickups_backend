<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Graphic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <div id="graphic"></div>
            </div>
            {{-- <div class="text-center mt-5">
                {{ $transactions->links() }}
            </div> --}}
        </div>
    </div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
    var income = <?php echo json_encode($total) ?>;
    var month = <?php echo json_encode($month) ?>;
        
            Highcharts.chart('graphic', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Penjemputan Bulan Ini'
        },
        xAxis: {
            categories: [
                month
                // 'Jan',
                // 'Feb',
                // 'Mar',
                // 'Apr',
                // 'May',
                // 'Jun',
                // 'Jul',
                // 'Aug',
                // 'Sep',
                // 'Oct',
                // 'Nov',
                // 'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: trash,
            data: income

        }]
    });
    </script>
</x-app-layout>

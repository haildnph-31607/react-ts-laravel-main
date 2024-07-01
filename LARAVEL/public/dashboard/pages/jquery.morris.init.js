
/**
 * Template Name: Sophia- Responsive Bootstrap 4 Admin Dashboard
 * Author: Lamarena
* Morris Chart
*/

!function ($) {
    "use strict";

    var MorrisCharts = function () { };

    //creates area chart
    MorrisCharts.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true,
            gridLineColor: '#f3f9ff',
            lineColors: lineColors
        });
    },

        //creates Stacked chart
        MorrisCharts.prototype.createStackedChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                stacked: true,
                labels: labels,
                hideHover: 'auto',
                resize: true, //defaulted to true
                gridLineColor: '#ededed',
                barColors: lineColors
            });
        },

        //creates Bar chart
        MorrisCharts.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                hideHover: 'auto',
                resize: true, //defaulted to true
                gridLineColor: '#ededed',
                barSizeRatio: 0.4,
                xLabelAngle: 35,
                barColors: lineColors
            });
        },

        //creates line chart
        MorrisCharts.prototype.createLineChart = function (element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
            Morris.Line({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                fillOpacity: opacity,
                pointFillColors: Pfillcolor,
                pointStrokeColors: Pstockcolor,
                behaveLikeLine: true,
                gridLineColor: '#f3f9ff',
                hideHover: 'auto',
                lineWidth: '3px',
                pointSize: 0,
                preUnits: '$',
                resize: true, //defaulted to true
                lineColors: lineColors
            });
        },



        //creates area chart with dotted
        MorrisCharts.prototype.createAreaChartDotted = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
            Morris.Area({
                element: element,
                pointSize: 3,
                lineWidth: 1,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                hideHover: 'auto',
                pointFillColors: Pfillcolor,
                pointStrokeColors: Pstockcolor,
                resize: true,
                smooth: false,
                gridLineColor: '#f3f9ff',
                lineColors: lineColors
            });
        },

        //creates Donut chart
        MorrisCharts.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                barSize: 0.2,
                resize: true, //defaulted to true
                colors: colors
            });
        },
        MorrisCharts.prototype.init = function () {

            //creating area chart
            var $areaData = [
                { y: '2009', a: 66, b: 32 },
                { y: '2010', a: 57, b: 42 },
                { y: '2011', a: 86, b: 53 },
                { y: '2012', a: 35, b: 46 },
                { y: '2013', a: 68, b: 24 },
                { y: '2014', a: 75, b: 46 },
                { y: '2015', a: 98, b: 75 }
            ];
            this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b'], ["Running", "Climbing"], ['#7360ff', "#f0f8fe"]);
            //creating Stacked chart
            var $stckedData = [
                { y: '2005', a: 22, b: 150, c: 98 },
                { y: '2006', a: 34, b: 44, c: 68 },
                { y: '2007', a: 111, b: 69, c: 98 },
                { y: '2008', a: 42, b: 69, c: 57 },
                { y: '2009', a: 126, b: 58, c: 115 },
                { y: '2010', a: 65, b: 47, c: 34 },
                { y: '2011', a: 65, b: 36, c: 46 },
                { y: '2012', a: 87, b: 76, c: 87 },
                { y: '2013', a: 57, b: 96, c: 67 },
                { y: '2014', a: 85, b: 85, c: 97 },
                { y: '2015', a: 100, b: 75, c: 122 },
                { y: '2016', a: 55, b: 75, c: 95 }
            ];
            this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b', 'c'], ["Bitcoin", "Ethereum", "Litecoin"], ['#7360ff', '#60b6e0', '#f0f8fe']);



            //create line chart
            var $data = [
                { y: '2008', a: 24, b: 0 },
                { y: '2009', a: 53, b: 12 },
                { y: '2010', a: 64, b: 24 },
                { y: '2011', a: 75, b: 57 },
                { y: '2012', a: 24, b: 24 },
                { y: '2013', a: 45, b: 46 },
                { y: '2014', a: 46, b: 64 },
                { y: '2015', a: 799, b: 70 }
            ];
            this.createLineChart('morris-line-example', $data, 'y', ['a', 'b'], ["Running", "Climbing"], ['0.1'], ['#ffffff'], ['#aaaaaa'], ['#fb445f', '#f0f8fe']);


            //creating bar chart
            var $barData = [
                { y: '2009', a: 100, b: 56, c: 42 },
                { y: '2010', a: 35, b: 76, c: 22 },
                { y: '2011', a: 46, b: 86, c: 68 },
                { y: '2012', a: 67, b: 56, c: 97 },
                { y: '2013', a: 97, b: 76, c: 46 },
                { y: '2014', a: 88, b: 35, c: 77 },
                { y: '2015', a: 77, b: 24, c: 57 }
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ["Running", "Climbing", "Walking"], ['#7360ff', '#00dabe', '#f2f2f2']);

            //creating area chart with dotted
            var $areaDotData = [
                { y: '2009', a: 22, b: 67 },
                { y: '2010', a: 32, b: 33 },
                { y: '2011', a: 42, b: 44 },
                { y: '2012', a: 66, b: 75 },
                { y: '2013', a: 44, b: 45 },
                { y: '2014', a: 85, b: 64 },
                { y: '2015', a: 90, b: 33 }
            ];
            this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b'], ["Running", "Climbing"], ['#ffffff'], ['#aaaaaa'], ['#fb445f', "#f0f8fe"]);

            //creating donut chart
            var $donutData = [
                { label: "Bitcoin", value: 16 },
                { label: "Ethereum", value: 22 },
                { label: "Litecoin", value: 33 }
            ];
            this.createDonutChart('morris-donut-example', $donutData, ['#7360ff', '#00dabe', '#f2f2f2']);
        },
        //init
        $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

    //initializing 
    function ($) {
        "use strict";
        $.MorrisCharts.init();
    }(window.jQuery);
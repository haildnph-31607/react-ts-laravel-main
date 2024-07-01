/**
 * Template Name: Sophia- Responsive Bootstrap 4 Admin Dashboard
 * Author: Lamarena
 * Module: Google Chart
 */

! function($) {
    "use strict";

    var GoogleChart = function() {
        this.$body = $("body")
    };

     //donut chart
     GoogleChart.prototype.createDonutChart = function(selector, data, colors) {
        var options = {
            fontName: 'Roboto',
            fontSize: 13,
            height: 300,
            pieHole: 0.55,
            chartArea: {
                left: 50,
                width: '90%',
                height: '90%'
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var pie_chart = new google.visualization.PieChart(selector);
        pie_chart.draw(google_chart_data, options);
        return pie_chart;
    },
    // line graph
    GoogleChart.prototype.createLineChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Roboto',
            height: 350,
            curveType: 'function',
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 300
            },
            pointSize: 4,
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 14
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 12,
                    italic: false
                },
                gridlines:{
                    color: '#dfdfdf',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 14
                }
            },
            lineWidth: 3,
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var line_chart = new google.visualization.LineChart(selector);
        line_chart.draw(google_chart_data, options);
        return line_chart;
    },
     // Column Stacked
     GoogleChart.prototype.createColumnStackChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Roboto',
            height: 400,
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 350
            },
            isStacked: true,
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 12
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 12,
                    italic: false
                },
                gridlines:{
                    color: '#dfdfdf',
                    count: 8
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var stackedcolumn_chart = new google.visualization.ColumnChart(selector);
        stackedcolumn_chart.draw(google_chart_data, options);
        return stackedcolumn_chart;
    },
    // area graph
    GoogleChart.prototype.createAreaChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Roboto',
            height: 340,
            curveType: 'function',
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 300
            },
            pointSize: 4,
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 12
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 14,
                    italic: false
                },
                gridarea: {
                    color: '#dfdfdf',
                    count: 8
                },
                gridlines: {
                    color: '#dfdfdf'
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'end',
                textStyle: {
                    fontSize: 13
                }
            },
            lineWidth: 2,
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var area_chart = new google.visualization.AreaChart(selector);
        area_chart.draw(google_chart_data, options);
        return area_chart;
    },
    // Column graph
    GoogleChart.prototype.createColumnChart = function(selector, data, axislabel, colors) {
        var options = {
            fontName: 'Roboto',
            height: 400,
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 360
            },
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 12
                }
            },
            vAxis: {
                title: axislabel,
                titleTextStyle: {
                    fontSize: 12,
                    italic: false
                },
                gridlines:{
                    color: '#dfdfdf',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var column_chart = new google.visualization.ColumnChart(selector);
        column_chart.draw(google_chart_data, options);
        return column_chart;
    },
    // bar graph
    GoogleChart.prototype.createBarChart = function(selector, data, colors) {
        var options = {
            fontName: 'Roboto',
            height: 400,
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 350
            },
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 12
                }
            },
            vAxis: {
                gridlines:{
                    color: '#dfdfdf',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13
                }
            },
            colors: colors
        };

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var bar_chart = new google.visualization.BarChart(selector);
        bar_chart.draw(google_chart_data, options);
        return bar_chart;
    },
   
    // Bar Stacked
    GoogleChart.prototype.createBarStackChart = function(selector, data, colors) {
        var options = {
            fontName: 'Roboto',
            height: 400,
            fontSize: 12,
            chartArea: {
                left: '8%',
                width: '90%',
                height: 350
            },
            isStacked: true,
            tooltip: {
                textStyle: {
                    fontName: 'Roboto',
                    fontSize: 12
                }
            },
            hAxis: {
                gridlines: {
                    color: '#dfdfdf',
                    count: 10
                },
                minValue: 0
            },
            legend: {
                position: 'top',
                alignment: 'center',
                textStyle: {
                    fontSize: 13
                }
            },
            colors: colors
        };


        var google_chart_data = google.visualization.arrayToDataTable(data);
        var stackedbar_chart = new google.visualization.BarChart(selector);
        stackedbar_chart.draw(google_chart_data, options);
        return stackedbar_chart;
    },
    // pie chart
    GoogleChart.prototype.createPieChart = function(selector, data, colors, is3D, issliced) {
        var options = {
            fontName: 'Roboto',
            fontSize: 13,
            height: 300,
            chartArea: {
                left: 50,
                width: '90%',
                height: '90%'
            },
            colors: colors
        };

        if(is3D) {
            options['is3D'] = true;
        }

        if(issliced) {
            options['is3D'] = true;
            options['pieSliceText'] = 'label';
            options['slices'] = {
                2: {offset: 0.15},
                5: {offset: 0.1}
            };
        }

        var google_chart_data = google.visualization.arrayToDataTable(data);
        var pie_chart = new google.visualization.PieChart(selector);
        pie_chart.draw(google_chart_data, options);
        return pie_chart;
    },

   
    //init
    GoogleChart.prototype.init = function () {
        var $this = this;

        //creating line chart
        var common_data = [
            ['Year', "Bitcoin", "Ethereum"],
            ['2012',  880,      120],
            ['2013',  777,      200],
            ['2014',  678,      180],
            ['2015',  6788,      400],
            ['2016',  1168,      460],
            ['2017',  6460,       3366],
            ['2018',  444,      540]
        ];
        $this.createLineChart($('#line-chart')[0], common_data, 'Sales and Expenses', ['#342992', '#f1556c']);


        //creating area chart using same data
        $this.createAreaChart($('#area-chart')[0], common_data, 'Sales and Expenses', ['#dedede', '#7377e8']);


        //creating column chart
        var column_data = [
            ['Year', "Bitcoin", "Ethereum", "Litecoin"],
            ['2010',  850,      120, 200],
            ['2011',  745,      200, 562],
            ['2012',  852,      180, 521],
            ['2013',  1000,      400, 652],
            ['2014',  1170,      460, 200],
            ['2015',  660,       1120, 562],
            ['2016',  1030,      540, 852]
        ];
        $this.createColumnChart($('#column-chart')[0], column_data, 'Sales and Expenses', ['#574aff','#16d9a2', '#f1f1f1']);


        //creating bar chart
        var bar_data = [
            ['Year', "Bitcoin", "Ethereum"],
            ['2004',  1000,      400],
            ['2005',  1170,      460],
            ['2006',  660,       1120],
            ['2007',  1030,      540]
        ];
        $this.createBarChart($('#bar-chart')[0], bar_data, ['#574aff', '#f1f1f1']);


        //creating columns tacked chart
        var column_stacked_data = [
            ['Genre', "Bitcoin", "Ethereum", "Litecoin", "Ripple", { role: 'annotation' } ],
            ['2000', 20, 30, 35, 40, ''],
            ['2005', 14, 20, 25, 30, ''],
            ['2010', 10, 24, 20, 32, ''],
            ['2015', 15, 25, 30, 35, ''],
            ['2020', 16, 22, 23, 30, ''],
            ['2025', 12, 26, 20, 40, ''],
            ['2030', 28, 19, 29, 30, '']
        ];
        $this.createColumnStackChart($('#column-stacked-chart')[0], column_stacked_data, 'Sales and Expenses', [ '#574aff','#16d9a2', '#f1f1f1', '#e3eaef']);


        //creating bar tacked chart
        var bar_stacked_data = [
            ['Genre', "Bitcoin", "Ethereum", "Litecoin", "Ripple", { role: 'annotation' } ],
            ['2000', 20, 30, 35, 40, ''],
            ['2005', 14, 20, 25, 30, ''],
            ['2010', 10, 24, 20, 32, ''],
            ['2015', 15, 25, 30, 35, ''],
            ['2020', 16, 22, 23, 30, ''],
            ['2025', 12, 26, 20, 40, ''],
            ['2030', 28, 19, 29, 30, '']
        ];
        $this.createBarStackChart($('#bar-stacked-chart')[0], bar_stacked_data, ['#574aff','#16d9a2', '#f1f1f1', '#e3eaef']);


        //creating pie chart
        var pie_data = [
            ['Task', 'Hours per Day'],
            ['Bitcoin',     11],
            ['Ethereum',      2],
            ['Litecoin',  2],
            ['Ripple', 2],
            ['cardano',    7]
        ];
        $this.createPieChart($('#pie-chart')[0], pie_data, ['#574aff','#16d9a2', '#f1f1f1', '#32c861'], false, false);


        //creating donut chart
        $this.createDonutChart($('#donut-chart')[0], pie_data, ['#574aff','#16d9a2', '#f1f1f1', '#32c861']);

        //creating 3d pie chart
        $this.createPieChart($('#pie-3d-chart')[0], pie_data, ['#574aff','#16d9a2', '#f1f1f1', '#e3eaef', '#32c861'], true, false);

        //creating Sliced pie chart
        var sliced_Data = [
            ['Language', 'Speakers (in millions)'],
            ['Assamese', 13],
            ['Bengali', 83],
            ['Gujarati', 46],
            ['Hindi', 90],
            ['Kannada', 38],
            ['Malayalam', 33]
        ];
        $this.createPieChart($('#3d-exploded-chart')[0], sliced_Data, ['#2d7bf4','#4eb7eb','#7377e8', '#e3eaef', '#32c861',"#353d4a"], true, true);

    },
    //init GoogleChart
    $.GoogleChart = new GoogleChart, $.GoogleChart.Constructor = GoogleChart
}(window.jQuery),

//initializing GoogleChart
function($) {
    "use strict";
    //loading visualization lib - don't forget to include this
    google.load("visualization", "1", {packages:["corechart"]});
    //after finished load, calling init method
    google.setOnLoadCallback(function() {$.GoogleChart.init();});
}(window.jQuery);

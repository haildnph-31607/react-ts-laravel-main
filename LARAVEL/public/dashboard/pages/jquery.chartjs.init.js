/**
 * Template Name: Sophia- Responsive Bootstrap 4 Admin Dashboard
 * Author: Lamarena
File: Chartjs
*/

!function ($) {
    "use strict";

    var ChartJs = function () { };

    ChartJs.prototype.respChart = function (selector, type, data, options) {
        var ctx = selector.get(0).getContext("2d");
        var container = $(selector).parent();

        $(window).resize(generateChart);

        function generateChart() {
            var ww = selector.attr('width', $(container).width());
            switch (type) {
                case 'Line':
                    new Chart(ctx, { type: 'line', data: data, options: options });
                    break;
                case 'Doughnut':
                    new Chart(ctx, { type: 'doughnut', data: data, options: options });
                    break;
                case 'Pie':
                    new Chart(ctx, { type: 'pie', data: data, options: options });
                    break;
                case 'Bar':
                    new Chart(ctx, { type: 'bar', data: data, options: options });
                    break;
                case 'Radar':
                    new Chart(ctx, { type: 'radar', data: data, options: options });
                    break;
                case 'PolarArea':
                    new Chart(ctx, { data: data, type: 'polarArea', options: options });
                    break;
            }
            // Initiate new chart or Redraw

        };
        // run function - render chart at first load
        generateChart();
    },

        //init
        ChartJs.prototype.init = function () {
            //creating lineChart
            var lineChart = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                datasets: [{
                    label: "Conversion Rate",
                    fill: false,
                    backgroundColor: '#210b9c',
                    borderColor: '#210b9c',
                    data: [68, 70, 778, -58, -4, 36, -47, 70, -77, 66]
                }, {
                    label: "Average Sale Value",
                    fill: false,
                    backgroundColor: '#e3eaef',
                    borderColor: "#e3eaef",
                    borderDash: [5, 5],
                    data: [45, 86, 86, 29, 22, 36, -85, 56, 49, 6]
                }]
            };

            var lineOpts = {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        },
                        gridLines: {
                            color: "rgba(0,0,0,0.1)"
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(255,255,255,0.05)",
                            fontColor: '#fff'
                        },
                        ticks: {
                            max: 100,
                            min: -100,
                            stepSize: 20
                        }
                    }]
                }
            };

            this.respChart($("#lineChart"), 'Line', lineChart, lineOpts);


            //Polar area chart
            var polarChart = {
                datasets: [{
                    data: [
                        19,
                        35,
                        44,
                        14
                    ],
                    backgroundColor: [
                        "#297ef6",
                        "#45bbe0",
                        "#ebeff2",
                        "#9710dc"
                    ],
                    label: 'My dataset', // for legend
                    hoverBorderColor: "#fff"
                }],
                labels: [
                    "Running ",
                    "Cycling",
                    "Climbing",
                    "Walking"
                ]
            };

            //Pie chart
            var pieChart = {
                labels: [
                    "Desktops",
                    "Tablets",
                    "Mobiles",
                    "Mobiles",
                    "Tablets"
                ],
                datasets: [
                    {
                        data: [80, 58, 66, 112, 88],
                        backgroundColor: [
                            "#7377e8",
                            "#4bc3ff",
                            "#e3eaef",
                            "#2d7bf4",
                            "#98a6ad"
                        ],
                        hoverBackgroundColor: [
                            "#7377e8",
                            "#4bc3ff",
                            "#e3eaef",
                            "#2d7bf4",
                            "#98a6ad"
                        ],
                        hoverBorderColor: "#fff"
                    }]
            };
            this.respChart($("#pie"), 'Pie', pieChart);


            //barchart
            var barChart = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Sales Analytics",
                        backgroundColor: "rgba(98, 2, 206, 0.3)",
                        borderColor: "#342992",
                        borderWidth: 2,
                        hoverBackgroundColor: "rgba(98, 2, 206, 0.7)",
                        hoverBorderColor: "#7377e8",
                        data: [34, 66, 67, 98, 77, 55, 45, 56]
                    }
                ]
            };
            this.respChart($("#bar"), 'Bar', barChart);
            //donut chart
            var donutChart = {
                labels: [
                    "Running",
                    "Cycling",
                    "Climbing",
                    "Walking",
                    "Sprint"
                ],
                datasets: [
                    {
                        data: [80, 58, 66, 112, 88],
                        backgroundColor: [
                            "#7377e8",
                            "#4bc3ff",
                            "#e3eaef",
                            "#2d7bf4",
                            "#98a6ad"
                        ],
                        hoverBackgroundColor: [
                            "#7377e8",
                            "#4bc3ff",
                            "#e3eaef",
                            "#2d7bf4",
                            "#98a6ad"
                        ],
                        hoverBorderColor: "#fff"
                    }]
            };
            this.respChart($("#doughnut"), 'Doughnut', donutChart);

            //radar chart
            var radarChart = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Desktops",
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: [77, 55, 87, 44, 68, 99, 56]
                    },
                    {
                        label: "Laptops",
                        backgroundColor: "rgba(258,54,93,0.2)",
                        borderColor: "rgba(258,54,93,1)",
                        pointBackgroundColor: "rgba(258,54,93,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(258,54,93,1)",
                        data: [34, 85, 25, 36, 85, 43, 24]
                    }
                ]
            };
            this.respChart($("#radar"), 'Radar', radarChart);


            this.respChart($("#polarArea"), 'PolarArea', polarChart);
        },
        $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

    //initializing
    function ($) {
        "use strict";
        $.ChartJs.init()
    }(window.jQuery);


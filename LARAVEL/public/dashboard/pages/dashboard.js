/*
  * Template Name: Sophia- Responsive Bootstrap 4 Admin Dashboard
 * Author: Lamarena
 File: Dashboard js
 */

!function ($) {
    "use strict";

    var Dashboard = function () {
    };


    $( document ).ready(function() {

        var DrawSparkline = function() {


                $('#sparkline9').sparkline([3, 4, 7, 4, 6, 4, 7, 6, 6, 5], {
                    type: 'bar',
                    height: '50',
                    width: '125',
                    barWidth: '7',
                    barSpacing: '3',
                    barColor: '#7377e8'
                });

                $('#sparkline10').sparkline([1,1,0,1,-1,-1,1,-1,0,0,1,1], {
                    height: '70',
                    width: '105',
                    type: 'tristate',
                    posBarColor: '#7377e8',
                    negBarColor: '#e3eaef',
                    zeroBarColor: '#ff679b',
                    barWidth: 8,
                    barSpacing: 3,
                    zeroAxis: false
                });

                $("#sparkline7").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7], {
                    type: 'discrete',
                    width: '125',
                    height: '85',
                    lineColor: '#36404c'
                });

                $('#sparkline1').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
                    type: 'line',
                    width: "105",
                    height: '65',
                    chartRangeMax: 50,
                    lineColor: '#7377e8',
                    fillColor: 'rgba(2, 192, 206, 0.3)',
                    highlightLineColor: 'rgba(0,0,0,.1)',
                    highlightSpotColor: 'rgba(0,0,0,.2)',
                    maxSpotColor:false,
                    minSpotColor: false,
                    spotColor:false,
                    lineWidth: 1
                });

                $('#sparkline1').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
                    type: 'line',
                    width: "105",
                    height: '65',
                    chartRangeMax: 40,
                    lineColor: '#f1556c',
                    fillColor: 'rgba(229, 43, 76, 0.3)',
                    composite: true,
                    highlightLineColor: 'rgba(0,0,0,.1)',
                    highlightSpotColor: 'rgba(0,0,0,.2)',
                    maxSpotColor:false,
                    minSpotColor: false,
                    spotColor:false,
                    lineWidth: 1
                });




            },
            DrawMouseSpeed = function () {
                var mrefreshinterval = 500; // update display every 500ms
                var lastmousex=-1;
                var lastmousey=-1;
                var lastmousetime;
                var mousetravel = 0;
                var mpoints = [];
                var mpoints_max = 30;
                $('html').mousemove(function(e) {
                    var mousex = e.pageX;
                    var mousey = e.pageY;
                    if (lastmousex > -1) {
                        mousetravel += Math.max( Math.abs(mousex-lastmousex), Math.abs(mousey-lastmousey) );
                    }
                    lastmousex = mousex;
                    lastmousey = mousey;
                });
                var mdraw = function() {
                    var md = new Date();
                    var timenow = md.getTime();
                    if (lastmousetime && lastmousetime!=timenow) {
                        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                        mpoints.push(pps);
                        if (mpoints.length > mpoints_max)
                            mpoints.splice(0,1);
                        mousetravel = 0;
                        $('#sparkline5').sparkline(mpoints, {
                            tooltipSuffix: ' pixels per second',
                            type: 'line',
                            width: "100%",
                            height: '165',
                            chartRangeMax: 77,
                            maxSpotColor:false,
                            minSpotColor: false,
                            spotColor:false,
                            lineWidth: 1,
                            lineColor: '#313a46',
                            fillColor: 'rgba(49, 58, 70, 0.3)',
                            highlightLineColor: 'rgba(24,147,126,.1)',
                            highlightSpotColor: 'rgba(24,147,126,.2)'
                        });
                    }
                    lastmousetime = timenow;
                    setTimeout(mdraw, mrefreshinterval);
                }
                // We could use setInterval instead, but I prefer to do it this way
                setTimeout(mdraw, mrefreshinterval);
            };

        DrawSparkline();
        DrawMouseSpeed();

        var resizeChart;

        $(window).resize(function(e) {
            clearTimeout(resizeChart);
            resizeChart = setTimeout(function() {
                DrawSparkline();
                DrawMouseSpeed();
            }, 300);
        });
    });


    //creates area chart with dotted
    Dashboard.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
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
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },


        //creates Bar chart
        Dashboard.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                gridLineColor: '#eee',
                barSizeRatio: 0.4,
                resize: true,
                hideHover: 'auto',
                barColors: lineColors
            });
        },



        //creates Donut chart
        Dashboard.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true,
                colors: colors,
            });
        },

        Dashboard.prototype.init = function () {

            //creating area chart with dotted
            var $areaDotData = [
                { y: '2009', a: 10, b: 20 },
                { y: '2010', a: 75,  b: 65 },
                { y: '2011', a: 50,  b: 40 },
                { y: '2012', a: 75,  b: 65 },
                { y: '2013', a: 50,  b: 40 },
                { y: '2014', a: 75,  b: 65 },
                { y: '2015', a: 90, b: 60 }
            ];
            this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b'], ["Bitcoin","Litecoin"],['#ffffff'],['#999999'], ['#7377e8', "#e3eaef"]);



            //creating bar chart
            var $barData = [

                { y: '2012', a: 75,  b: 65 , c: 95 },
                { y: '2013', a: 50,  b: 40 , c: 22 },
                { y: '2014', a: 75,  b: 65 , c: 56 },
                { y: '2015', a: 100, b: 90 , c: 60 }
            ];
            this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ["Bitcoin", "Ethereum", "Litecoin"], ['#7377e8','#0acf97', '#ebeff2']);



            //creating donut chart
            var $donutData = [

                {label: "Ethereum", value: 42},
                {label: "cardano", value: 20},
                {label: "Ripple", value: 26}
            ];
            this.createDonutChart('morris-donut-example', $donutData, [ "#efb3e6", '#ffdf7c', '#b2def7']);

        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.Dashboard.init();
    }(window.jQuery);
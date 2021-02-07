$(function () {
    "use strict";
    // chart 1
    var options = {
        series: [{
            name: 'Income',
            data: [18, 51, 80, 38, 88, 50, 40, 52, 88, 80, 60, 70]
        }, {
            name: 'Expenses',
            data: [27, 38, 60, 77, 40, 50, 49, 29, 42, 27, 42, 50]
        }],
        chart: {
            foreColor: '#9ba7b2',
            type: 'area',
            height: 340,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            },
            dropShadow: {
                enabled: false,
                top: 3,
                left: 14,
                blur: 4,
                opacity: 0.10,
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: -25
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2.3,
            curve: 'smooth'
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function (val) {
                    return "$ " + val + " "
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                gradientToColors: ['#377dff', '#00c9db'],
                shadeIntensity: 1,
                type: 'vertical',
                inverseColors: false,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                //stops: [0, 50, 65, 91]
            },
        },
        grid: {
            show: true,
            borderColor: '#f8f8f8',
            strokeDashArray: 5,
        },
        colors: ["#377dff", "#00c9db"],
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value + "$";
                }
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        }
    };

});


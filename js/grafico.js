/*
// Data retrieved from: https://www.uefa.com/uefachampionsleague/history/
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Disponibilidade de ramais'
    },
    xAxis: {
        categories: ['2021/22', '2020/21', '2019/20', '2018/19', '2017/18',]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Assists'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'percent'
        }
    },
    series: [{
        name: 'Total',
        data: [4, 4, 2, 4, 4]
    }, {
        name: 'Usados',
        data: [0, 4, 3, 2, 3]
    }, {
        name: 'Disponíveis',
        data: [1, 2, 2, 1, 2]
    }]
});

*/
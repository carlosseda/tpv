import Chart from 'chart.js/auto';

export let renderCharts = () => {

    let chartItems = document.querySelectorAll('.chart-item');
    let chart = document.getElementById('chart');
    let url = new URL('web.php', window.location.origin);
    let data = {};

    chartItems.forEach(chartItem => {

        chartItem.addEventListener("click", (event) => {

            data["route"] = chartItem.dataset.route;
            data["chart_data"] = chartItem.dataset.chart;
            
            let json = JSON.stringify(data);
            url.searchParams.set('data', json);

            let sendFilterRequest = async () => {

                let response = await fetch(url.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET', 
                })
                .then(response => {
                            
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    if(chartItem.dataset.type == 'pie') {
                        renderPieChart(json);
                    }else if(chartItem.dataset.type == 'bar') {
                        renderBarChart(json);
                    }else if(chartItem.dataset.type == 'line') {
                        renderLineChart(json);
                    }
                })
                .catch(error =>  {

                    console.log(error);

                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };

            sendFilterRequest();

        });
    });
    

    let renderBarChart = (json) => {

        let labels = [];
        let data = [];
        let chartStatus = Chart.getChart(chart);

        if (chartStatus != undefined) {
            chartStatus.destroy();
        }

        json.labels.forEach(element => {
            labels.push(element);
        });

        json.data.forEach(element => {
            data.push(element);
        });

        console.log(data);

        let myChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets:  [{
                    axis: 'y',
                    data: data,
                    fill: false,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,

                plugins: {
                    legend: {
                       display: false
                    }
                }
            },
        });
    };

    let renderLineChart = (json) => {

        let labels = [];
        let data = [];
        let quantity = [];
        let chartStatus = Chart.getChart(chart);

        if (chartStatus != undefined) {
            chartStatus.destroy();
        }

        json.labels.forEach(element => {
            labels.push(element);
        });

        json.data.forEach(element => {
            data.push(element);
        });

        json.quantity.forEach(element => {
            quantity.push(element);
        });

        let myChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Ingresos',
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235, 50)',
                        data: data,
                        pointStyle: 'circle',
                        pointRadius: 10,
                        pointHoverRadius: 15
                    }, 
                    {
                        label: 'Ventas',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(201, 203, 207)',
                        data: quantity,
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,

                plugins: {
                    legend: {
                       display: false
                    }
                }
            }
        });
    }

    let renderPieChart = (json) => {

        let labels = [];
        let data = [];
        let chartStatus = Chart.getChart(chart);

        if (chartStatus != undefined) {
            chartStatus.destroy();
        }

        json.labels.forEach(element => {
            labels.push(element);
        });

        json.data.forEach(element => {
            data.push(element);
        });

        let myChart = new Chart(chart, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ]
                }]
            },
            options: {
                responsive: true,

                plugins: {
                    legend: {
                       display: false
                    }
                }
            }
        });
    }
}
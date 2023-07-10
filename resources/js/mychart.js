
const chartLabels = window.chartData.labels;
const chartData = window.chartData.data;

const data = {
    labels: chartLabels,
    datasets: [{
        label: 'Roles',
        data: chartData,
        backgroundColor: 'lightblue',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);



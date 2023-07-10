const chartLabels2 = window.chartData2.labels;
const chartData2 = window.chartData2.data;


const data = {
    labels: chartLabels2,
    datasets: [{
        label: 'Roles',
        data: chartData2,
        backgroundColor: ['lightblue','lightpink','lightgreen','rgba(222, 196, 255, 0.8)','rgba(255, 255, 196, 0.8)'],
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
    }]
};

const config = {
    type: 'pie',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart2'),
    config
);



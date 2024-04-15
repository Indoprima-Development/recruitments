<script>
    // chartID  string  --> id of the chart
    // type     string  --> type of the chart (ex: bar,line,doughnut,pie)
    // labels   []data  --> label chart 
    // datas    []data  --> data which will show inside the chart
    function InitChartJs(chartID){
        const ctx = document.getElementById(chartID,type,labels,datas);

        new Chart(ctx, {
            type: type,
            data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: datas,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    }
</script>

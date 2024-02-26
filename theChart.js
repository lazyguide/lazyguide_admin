$.ajax({
    url: 'theChart_b.php',
    method: 'GET',
    dataType: 'json',
    success: function(response){
        var ctx = document.getElementById("myChart").getContext("2d");

        // 資料
        var data = {
            labels: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
            datasets: [
                {
                    label: "使用一次性餐具產生之碳排放量(kg/CO2e)",
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderWidth: 1,
                    data: response.table
                },
                {
                    label: "交通所產生之碳排放量(kg/CO2e)",
                    backgroundColor: "rgba(255, 99, 132, 0.4)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 1,
                    data: response.traffic
                },
                {
                    label: "總和(kg/CO2e)",
                    type: "line",
                    fill: false,
                    borderColor: "rgba(255, 206, 86, 1)",
                    borderWidth: 2,
                    data: response.sum
                }
            ]
        };

        // 選項
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // 長條圖和折線圖
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        })
    },
    error: function() { // 當取得資料失敗時
        alert("error！");
        location.href = "home.php";
    }
});

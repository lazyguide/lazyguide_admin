$.ajax({
    url: 'red_historyChart_b.php',
    method: 'GET',
    dataType: 'json',
    success: function(response){
        var ctx = document.getElementById("historyChart").getContext("2d");

        // 資料
        var data = {
            labels: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
            datasets: [
                {
                    label: "使用環保餐具減少之碳排放量(kg/CO2e)",
                    backgroundColor: "rgba(150, 217, 120, 0.4)",
                    borderColor: "rgba(150, 217, 120, 1)",
                    borderWidth: 1,
                    data: response.table
                },
                {
                    label: "環保交通所減少之碳排放量(kg/CO2e)",
                    backgroundColor: "rgba(78, 113, 223, 0.4)",
                    borderColor: "rgba(78, 113, 223, 1)",
                    borderWidth: 1,
                    data: response.traffic
                },
                {
                    label: "總和(kg/CO2e)",
                    type: "line",
                    fill: false,
                    borderColor: "rgba(220, 131, 63, 1)",
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
        var historyChart = new Chart(ctx, {
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

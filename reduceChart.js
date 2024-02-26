$.ajax({
    url: 'reduceChart_b.php', // 後端 PHP 腳本路徑
    method: 'GET', // 使用 GET 方法取得資料
    dataType: 'json', // 回傳的資料格式為 JSON
    success: function(response){
        const canvas = document.getElementById('reduceChart');
            const reduceChart = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: ['使用環保餐具減少之碳排放(單位：Kg/CO2e)', '使用環保交通方式減少之碳排放量(單位：Kg/CO2e)'],
                    datasets: [{
                        label: 'Carbon emission',
                        data: response.data,
                        backgroundColor: [
                            '#00FFFF',
                            '#FFD700',
                        ],
                        borderColor: '#003366',
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: '90%',
                    radius: '100%'
                }
            });

    },
    error: function(xhr, status, error) {
        // 處理錯誤
    }
});


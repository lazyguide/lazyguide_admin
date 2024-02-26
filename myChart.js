$.ajax({
    url: 'chart_b.php', // 後端 PHP 腳本路徑
    method: 'GET', // 使用 GET 方法取得資料
    dataType: 'json', // 回傳的資料格式為 JSON
    success: function(response){
        const canvas = document.getElementById('myChart');
        if(response.data.length == 3){
            const myChart = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: ['使用一次性餐具產生之碳排放(單位：Kg/CO2e)', '自行開車或騎車產生之碳排放量(單位：Kg/CO2e)', '與標準差距      (單位：Kg/CO2e)'],
                    datasets: [{
                        label: 'Carbon emission',
                        data: response.data,
                        backgroundColor: [
                            '#E6E6FA',
                            '#FFA07A',
                            '#73E68C',
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
        }else{
            const myChart = new Chart(canvas, {
                type: 'doughnut',
                data: {
                    labels: ['使用一次性餐具產生之碳排放(單位：Kg/CO2e)', '自行開車或騎車產生之碳排放量(單位：Kg/CO2e)'],
                    datasets: [{
                        label: 'Carbon emission',
                        data: response.data,
                        backgroundColor: [
                            '#E6E6FA',
                            '#FFA07A',
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
        }
    },
    error: function(xhr, status, error) {
        // 處理錯誤
    }
});


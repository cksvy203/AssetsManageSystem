$(document).ready(function() {
    fetchNetworkTraffic();
});

function fetchNetworkTraffic() {
    $.ajax({
        url: 'network_traffic.php', // 서버 측에서 트래픽 정보를 반환하는 파일 경로
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#network-traffic').html('<label>Network Traffic:</label><span>' + response.traffic + '</span>');
        },
        error: function() {
            $('#network-traffic').html('<label>Network Traffic:</label><span>Error fetching data</span>');
        }
    });
}
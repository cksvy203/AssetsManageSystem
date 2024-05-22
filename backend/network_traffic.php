<?php
// Apache 액세스 로그 파일 경로
$log_file = '/var/log/apache2/access.log'; // 실제 경로에 따라 수정 필요

// 로그 파일에서 트래픽 데이터 읽기
$log_data = file_get_contents($log_file);

// 로그 데이터를 라인 단위로 분할하여 각 줄을 배열로 저장
$log_lines = explode("\n", $log_data);

// 총 트래픽 변수 초기화
$total_traffic = 0;

// 각 줄을 반복하여 트래픽 데이터 분석
foreach ($log_lines as $line) {
    // 공백으로 구분된 각 열을 배열로 분할
    $columns = explode(" ", $line);
    
    // 열 인덱스 9는 전송된 바이트 수를 나타냄 (클라이언트에서 서버로 전송된 데이터 양)
    $bytes_sent = (int)$columns[9];
    
    // 총 트래픽에 바이트 수 추가
    $total_traffic += $bytes_sent;
}

// 총 트래픽을 메가바이트 단위로 변환
$total_traffic_mb = round($total_traffic / (1024 * 1024), 2); // 바이트를 메가바이트로 변환

// JSON 형식으로 데이터 반환
echo json_encode(array('traffic' => $total_traffic_mb));
?>

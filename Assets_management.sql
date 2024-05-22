-- 개발일자: 2024년 05월 22일
-- 개발자: 김찬표
-- 개발 언어 MySQL

-- 사용자 계정 테이블
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    department VARCHAR(100),
    position VARCHAR(100),
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_id_number (id_number)
);

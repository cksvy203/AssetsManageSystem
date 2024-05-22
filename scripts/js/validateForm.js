function checkDuplicate() {
    var id = document.getElementById('id').value;
    var id_error = document.getElementById('id-error');

    $.ajax({
        url: 'check_duplicate.php', // 중복 확인을 위한 서버 측 파일 경로
        type: 'POST',
        data: {id: id},
        success: function(response) {
            if (response.trim() === 'duplicate') {
                id_error.innerText = '이미 사용 중인 아이디입니다.';
            } else {
                id_error.innerText = '';
            }
        }
    });
}

function validateForm() {
    var id = document.getElementById('id').value;
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('confirm_password').value;
    var id_error = document.getElementById('id-error');
    var password_error = document.getElementById('password-error');
    
    // 아이디 중복 체크
    // 여기서는 입력한 아이디가 이미 사용 중인지 확인하는 기능이라고 가정하겠습니다.
    if (id_error.innerText !== '') {
        return false;
    }

    // 비밀번호 일치 여부 체크
    if (password !== confirm_password) {
        password_error.innerText = '비밀번호가 일치하지 않습니다.';
        return false;
    } else {
        password_error.innerText = '';
    }

    return true;
}

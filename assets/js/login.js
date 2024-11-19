     // JavaScript to update the actionType value
     document.getElementById('login_swich').addEventListener('change', function() {
        document.getElementById('actionType').value = 'login';
    });
    
    document.getElementById('signup_swich').addEventListener('change', function() {
        document.getElementById('actionType').value = 'signup';
    });
    
    document.getElementById('forgot_swich').addEventListener('change', function() {
        document.getElementById('actionType').value = 'forgot';
    });
            function setActionType(action) {
            document.getElementById('actionType').value = action;
        }
            // Lấy các phần tử cần thiết
            const loginBtn = document.getElementById('loginBtn');
            const popup = document.getElementById('loginPopup');
            const closeBtn = document.getElementById('closeBtn');
    
            // Mở popup khi nhấn nút đăng nhập
            loginBtn.onclick = function() {
                popup.style.display = 'block';
            }
    
            // Đóng popup khi nhấn vào nút đóng
            closeBtn.onclick = function() {
                popup.style.display = 'none';
            }
    
            // Đóng popup khi click ra ngoài
            // window.onclick = function(event) {
            //     if (event.target == popup) {
            //         popup.style.display = 'none';
            //     }
            // }
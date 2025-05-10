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
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');
        
        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });
        
        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
        
<div id="login_card" class="ui fluid card">
    <div id="login_warn_zone" class="extra content" hidden>
        <div id="login_warn_txt" class="ui fluid red basic label">
        </div>
    </div>
    <div class="content">
        <form id="login_form" method="POST" class="ui form">
            <div class="field">
                <label>電子郵件</label>
                <input id="login_email" type="email" name="email" placeholder="Email">
            </div>
            <div class="field">
                <label>密碼</label>
                <input id="login_password" type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" tabindex="0" class="hidden" name="check" readonly>
                    <label>保持登入（尚未開放）</label>
                </div>
                <button class="ui right floated primary button" type="submit">送出</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('#login_form').submit(function (event) {
        event.preventDefault();

        let data = {
            'email': '' + $('#login_email').val(),
            'password': '' + $('#login_password').val()
        }

        if (data.email === "" || data.password === "") {
            login_warn("登入失敗：欄位不可為空");
            return;
        }

        fetch('{{ route('login') }}', {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            body: JSON.stringify(data), // must match 'Content-Type' header
            headers: {
                'content-type': 'application/json',
                'Accept': 'application/json'
            },
            mode: "cors"
        }).then(function (response) {
            return response.json();

        }).then(function (json) {
            let token = json.access_token;
            if (token !== undefined) {
                window.localStorage.setItem('token', json.access_token);
                console.log('User login successfully.')
                //todo redirect to user home page
            } else {
                login_warn("登入失敗：帳號或密碼錯誤（401）");
            }
        });
    });

    function login_warn(msg="錯誤") {
        $('#login_card').addClass('red');
        $('#login_warn_txt').empty().append(msg);
        $('#login_warn_zone').prop('hidden', false)
    }
</script>

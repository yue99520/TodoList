<div id="register_card" class="ui fluid card">
    <div id="register_warn_zone" class="extra content" hidden>
        <div id="register_warn_txt" class="ui fluid red basic label">
        </div>
    </div>
    <div class="content">
        <form id="register_form" method="POST" class="ui form">
            <div class="field">
                <label>使用者名稱</label>
                <input id="register_name" type="text" name="name" placeholder="Username">
            </div>
            <div class="field">
                <label>電子郵件</label>
                <input id="register_email" type="email" name="email" placeholder="Email">
            </div>
            <div class="field">
                <label>密碼</label>
                <input id="register_password" type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <label>密碼確認</label>
                <input id="register_password_confirmation" type="password" name="password_confirmation" placeholder="Password Confirmation">
            </div>
            <div class="field">
                <button class="ui right floated primary button" type="submit">送出</button>
            </div>
        </form>
    </div>
    <div id="register_ok_modal" class="ui basic modal">
        <h1 class="ui header">
            <i class="red heart icon"></i>
            恭喜你！
        </h1>
        <div class="content">
            <p>註冊成功了喔，趕快返回首頁登入吧。</p>
        </div>
        <div class="actions">
            <a class="ui big green ok inverted button" href="{{ route('home') }}">
                <i class="checkmark icon"></i>
                讚讚！
            </a>
        </div>
    </div>
</div>
<script>
    $('#register_form').submit(function (event) {
        event.preventDefault();

        let data = {
            'name': $('#register_name').val(),
            'email': $('#register_email').val(),
            'password': $('#register_password').val(),
            'password_confirmation': $('#register_password_confirmation').val(),
        }

        if (data.name === "" || data.email === "" || data.password === "" || data.password_confirmation === "") {
            register_warn("登入失敗：欄位不可為空");
            return;
        }

        if (data.password !== data.password_confirmation) {
            register_warn("登入失敗：密碼確認不一致");
            return;
        }

        fetch('{{ route('register') }}', {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            body: JSON.stringify(data), // must match 'Content-Type' header
            headers: {
                'content-type': 'application/json',
                'Accept': 'application/json'
            },
            mode: "cors"
        }).then(function (response) {
            if (response.status === 201) {
                console.log('User register successfully.');
            } else {
                throw "註冊失敗（" + response.status + "）"
            }

        }).then(function () {
            $('#register_ok_modal').modal('show');

        }).catch(function (e) {
            register_warn(e)
        });
    });

    function register_warn(msg="錯誤") {
        $('#register_card').addClass('red');
        $('#register_warn_txt').empty().append(msg);
        $('#register_warn_zone').prop('hidden', false)
    }
</script>

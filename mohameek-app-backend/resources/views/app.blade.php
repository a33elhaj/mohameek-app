<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>

<body>

    <script>
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) {
                return parts.pop().split(';').shift();
            }
        }

        function request(url, options) {
            // get cookie
            const csrfToken = getCookie('XSRF-TOKEN');
            return fetch(url, {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(csrfToken),
                },
                credentials: 'include',
                ...options,
            })
        }

        // function logout() {
        //     return request('/logout', {
        //         method: 'POST'
        //     });
        // }

        function login() {
            return request('/login', {
                method: "POST",
                body: JSON.stringify({
                    'email': 'user@domain.com',
                    'password': '123456'
                })
            })
        }

        fetch('/sanctum/csrf-cookie', {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json'
                },
                credentials: 'include'
            })
            .then(() => {
                return login();
            })
            .then(() => request('/api/users'))
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Load Vite assets -->
    @vite(['resources/js/app.js'])
</head>
<body>
    Hello :<span id="app"></span>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Echo Object:", window.Echo);


            // Public channel
            if (window.Echo) {
                Echo.channel('post-channel').listen('PostEvent', (e) => {
                    document.getElementById('app').innerHTML = e.post;
                });

                // Private channel
                Echo.private('test-name').listen('PrivateMessage', (e) => {
                    console.log(e);
                    document.getElementById('app').innerHTML =e.userss+' '+e.test;
                });
                // Presence channel
                Echo.join('presensechannel-name').listen('.PresenseMessagewwww', (data) => {
                    console.log(data);
                    document.getElementById('app').innerHTML =`${data.www}${data.pk} `;
                }).here((user) => {
                    console.log(user.length);
                })
                .leaving((user) => {
                    console.log("leaving "+user.name);
                })
                
                .joining((user) => {
                    console.log("JOining "+user.name);
                })
                
            } else {
                console.error("Laravel Echo is not loaded.");
            }
        });
    </script>
</body>
</html>

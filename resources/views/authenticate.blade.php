<!DOCTYPE html>
<html lang="en" class="h-full font-sans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Nova::name() }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">

    <script>
        function checkAutoSubmit(el) {
            if (el.value.length === 6) {
                document.getElementById('authenticate_form').submit();
            }
        }

    </script>
</head>
<body class="bg-40 text-black h-full">
<div class="h-full">
    <div class="px-view py-view mx-auto">
        <div class="mx-auto py-8 max-w-sm text-center font-bold text-90">
            @include('nova::partials.logo')
        </div>

        <form id="authenticate_form" class="bg-white shadow rounded-lg p-8 max-w-login mx-auto" method="POST"
              action="/los/2fa/authenticate">
            @csrf
            <h2 class="text-2xl text-center font-normal mb-6 text-90">Tweefactorauthenticatie</h2>
            <svg class="block mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" width="100" height="2" viewBox="0 0 100 2">
                <path fill="#D8E3EC" d="M0 0h100v2H0z"></path>
            </svg>
            <p class="p-2"><strong>Vul de code in van Google Authenticator.</strong></p>
            <div class="text-center pt-3">
                <div class="mb-6 w-1/2" style="display:inline-block">
                    @if (isset($error))
                        <p id="error_text" class="text-center font-semibold text-danger my-3">
                            {{  $error }}
                            <button
                                    onclick="
                                        document.getElementById('secret_div').style.display = 'none';
                                        document.getElementById('error_text').style.display = 'none';
                                        document.getElementById('recover_div').style.display = 'block';
                                    "
                                    class="text-primary dim font-bold no-underline" type="button">
                                Herstellen
                            </button>
                        </p>
                    @endif
                    <div id="secret_div" class="mb-6 ">
                        <label class="block font-bold mb-2" for="co">Authenticatie code</label>
                        <input class="form-control form-input form-input-bordered w-full" id="secret" type="number" name="secret" value="" onkeyup="checkAutoSubmit(this)" autofocus="">
                    </div>
                    <div id="recover_div" style="display: none;" class="mb-6 ">
                        <label class="block font-bold mb-2" for="co">Herstel code</label>
                        <input class="form-control form-input form-input-bordered w-full" id="recover" type="text" name="recover" value="" autofocus="">
                    </div>
                </div>
                <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
                    Authenticeren
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

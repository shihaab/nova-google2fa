<!DOCTYPE html>
<html lang="en" class="h-full font-sans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Nova::name() }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">
    <style>
        body {
            font-family: Nunito,system-ui,BlinkMacSystemFont,-apple-system,sans-serif;
        }
        .text-primary {
            color: #039f3c!important;
        }
        .btn-primary {
            background-color: #039f3c!important;
        }
    </style>
    <script>
        function checkAutoSubmit(el) {
            if (el.value.length === 6) {
                document.getElementById('register_form').submit();
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

        <form id="register_form" class="bg-white shadow rounded-lg p-8 max-w-login mx-auto" method="POST"
              action="/los/2fa/confirm">
            @csrf
            <h2 class="text-2xl text-center font-normal mb-6 text-90">Tweefactorauthenticatie</h2>
            <svg class="block mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" width="100" height="2" viewBox="0 0 100 2">
                <path fill="#D8E3EC" d="M0 0h100v2H0z"></path>
            </svg>
            
            <p class="p-2">Om tweefactorauthenticatie in te schakelen voor uw account, moet u de code van de mobiele Google Authenticator-app invullen</p>
            <p class="p-2">Scan de QR-code via de app. <a target="_blank" href="https://support.google.com/accounts/answer/1066447?co=GENIE.Platform%3DiOS&hl=nl" class="no-print text-primary dim font-bold no-underline">Help</a></p>
            <div class="text-center">
                <img src="{{ $google2fa_url }}" alt="QR-code is aan het laden...">
            </div>

            <div class="text-center">
                <div class="mb-6" style="display:inline-block">
                    @if (isset($error))
                        <p class="text-center font-semibold text-danger my-3">
                            {{  $error }}
                        </p>
                    @endif
                    <label class="block font-bold mb-2" for="co">Authenticatie code</label>
                    <input class="form-control form-input form-input-bordered w-full" id="secret" type="number"
                           name="secret" value="" required="required" onkeyup="checkAutoSubmit(this)" autofocus="">
                </div>
                <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
                    Bevestig
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

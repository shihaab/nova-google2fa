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
        .text-primary {
            color: #039f3c!important;
        }
        .btn-primary {
            background-color: #039f3c!important;
        }
        button::selection {
            outline: none!important;
        }
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-40 text-black h-full">
<div class="h-full">
    <div class="px-view py-view mx-auto">
        <div class="mx-auto py-8 max-w-sm text-center font-bold text-90">
            @include('nova::partials.logo')
        </div>

        <form class="bg-white shadow rounded-lg p-8 max-w-xl mx-auto" method="POST" action="/los/2fa/register">
            <h2 class="p-2">Tweefactorauthenticatie Mijn Digitale Buddy</h2>
            @csrf
            <p class="p-2">
                Omdat jouw account nog geen connectie met Google Authenticator heeft zijn deze nu aangemaakt. 
            </p>
            <p class="p-2">
                Herstelcodes worden gebruikt om toegang te krijgen tot uw account in het geval u geen tweefactorauthenticatiecodes kunt ontvangen.
            </p>
            <p class="p-2 no-print">
                <strong style="color: #3182ce;">
                Download, print of kopieer uw code voordat u doorgaat met het instellen van tweestapsverificatie.
                </strong>
            </p>
            <div class="p-3">
                <label class="block font-bold mb-2" for="co">Herstel codes:
                    <button style="font-weight: 900;" class="no-print text-primary dim font-bold no-underline" type="button"
                            onclick="window.print();return false;">
                        Print
                    </button>
                </label>

                <div>
                    @foreach ($recovery as $recoveryCode)
                        <ul>
                            <li style="font-family: monospace;" class="p-2">{{ $recoveryCode }}</li>
                        </ul>
                    @endforeach
                </div>
            </div>

            <button class="no-print text-primary dim font-bold text-right w-full" type="submit">
                Ga verder
            </button>
        </form>
    </div>
</div>
</body>
</html>

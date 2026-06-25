<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Error - 500 Error</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .error-container {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%,100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-red-100 min-h-screen flex items-center justify-center p-4">

<div class="error-container max-w-3xl w-full">

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="p-8 md:p-12">

            <div class="flex flex-col md:flex-row items-center gap-8">

                <!-- 500 Circle -->
                <div class="floating flex-shrink-0">

                    <div class="w-40 h-40 rounded-full bg-orange-50 border-4 border-orange-100 flex items-center justify-center">

                        <span class="text-7xl font-bold text-orange-500">
                            500
                        </span>

                    </div>

                </div>

                <!-- Content -->
                <div class="flex-1 text-center md:text-left">

                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Server Error
                    </h1>

                    <p class="text-lg text-gray-600 mb-6">
                        Oops! Something went wrong on our server.
                        Our team has been notified and is working to fix the issue.
                    </p>

                    <div class="bg-orange-50 border-l-4 border-orange-500 rounded-lg p-4 mb-6">

                        <div class="flex items-start">

                            <svg class="w-5 h-5 text-orange-500 mt-0.5"
                                 fill="currentColor"
                                 viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM10 13a1 1 0 100 2 1 1 0 000-2zm-1-6a1 1 0 012 0v3a1 1 0 11-2 0V7z"
                                      clip-rule="evenodd"/>
                            </svg>

                            <p class="ml-3 text-sm text-orange-700">
                                Internal server error occurred while processing your request.
                            </p>

                        </div>

                    </div>

                    <div class="flex flex-wrap gap-3 justify-center md:justify-start">

                        <a href="{{ url('/') }}"
                           class="px-5 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-200 shadow-lg">
                            Back to Home
                        </a>

                        <button onclick="window.location.reload()"
                                class="px-5 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-100 transition duration-200">
                            Refresh Page
                        </button>

                    </div>

                </div>

            </div>

            <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-3">

                <p class="text-sm text-gray-500">
                    Error Code: 500 | Internal Server Error
                </p>

                <p class="text-xs text-gray-400">
                    {{ now()->format('d M Y H:i:s') }}
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>
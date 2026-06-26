<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Error Details</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-slate-100 min-h-screen">

    <div class="container mx-auto px-6 py-10">

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Header -->

            <div class="bg-slate-800 text-white p-6">

                <h1 class="text-3xl font-bold">
                    Error Details
                </h1>

                <p class="text-gray-300 mt-2">
                    Complete error tracking information
                </p>


            </div>

            <div class="p-8">

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Error Code -->

                    <div class="bg-red-50 rounded-xl p-5">

                        <h3 class="text-gray-500 text-sm">
                            Error Code
                        </h3>

                        <p class="text-4xl font-bold text-red-600 mt-2">

                            {{ $error->error_code }}

                        </p>

                    </div>


                    <!-- Date -->

                    <div class="bg-blue-50 rounded-xl p-5">

                        <h3 class="text-gray-500 text-sm">
                            Occurred At
                        </h3>

                        <p class="font-semibold mt-3">

                            {{ $error->created_at->format('d M Y h:i A') }}

                        </p>

                    </div>

                </div>


                <!-- URL -->

                <div class="mt-6 bg-gray-50 rounded-xl p-5">

                    <h3 class="font-semibold text-gray-700">
                        Requested URL
                    </h3>

                    <p class="mt-2 text-gray-600 break-all">

                        {{ $error->url }}

                    </p>


                </div>


                <!-- IP -->

                <div class="mt-6 bg-gray-50 rounded-xl p-5">

                    <h3 class="font-semibold text-gray-700">

                        IP Address

                    </h3>

                    <p class="mt-2 text-gray-600">

                        {{ $error->ip_address ?? 'Not Available' }}

                    </p>

                </div>


                <!-- Browser -->

                <div class="mt-6 bg-gray-50 rounded-xl p-5">

                    <h3 class="font-semibold text-gray-700">

                        Browser / Device

                    </h3>

                    <p class="mt-2 text-gray-600 break-all">

                        {{ $error->user_agent ?? 'Not Available' }}

                    </p>

                </div>


                <!-- Message -->

                <div class="mt-6 bg-yellow-50 border-l-4 border-yellow-500 rounded-xl p-5">


                    <h3 class="font-semibold text-gray-700">

                        Error Message

                    </h3>

                    <p class="mt-2 text-gray-600">

                        {{ $error->message ?? 'No message available' }}

                    </p>

                </div>


                <!-- Back Button -->

                <div class="mt-8">

                    <a href="{{ route('dashboard') }}"

                        class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">

                        ← Back To Dashboard

                    </a>

                </div>


            </div>


        </div>


    </div>


</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Analytics Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .card-hover{
            transition: all .3s ease;
        }

        .card-hover:hover{
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-slate-100">

<div class="container mx-auto px-6 py-8">

    <!-- Header -->

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold text-slate-800">
                Error Analytics Dashboard
            </h1>

            <p class="text-gray-500 mt-2">
                Monitor and track application error activity
            </p>
        </div>

        <div>
            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                System Active
            </span>
        </div>

    </div>

    <!-- Statistics -->

    <div class="grid md:grid-cols-4 gap-6 mb-8">

        <div class="card-hover bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl shadow-lg p-6">

            <h3 class="text-lg font-medium">
                Total Errors
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $totalErrors }}
            </p>

        </div>

        <div class="card-hover bg-gradient-to-r from-red-500 to-red-700 text-white rounded-2xl shadow-lg p-6">

            <h3 class="text-lg font-medium">
                404 Errors
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $total404 }}
            </p>

        </div>

        <div class="card-hover bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-2xl shadow-lg p-6">

            <h3 class="text-lg font-medium">
                403 Errors
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $total403 }}
            </p>

        </div>

        <div class="card-hover bg-gradient-to-r from-orange-500 to-orange-700 text-white rounded-2xl shadow-lg p-6">

            <h3 class="text-lg font-medium">
                500 Errors
            </h3>

            <p class="text-4xl font-bold mt-3">
                {{ $total500 }}
            </p>

        </div>

    </div>

    <!-- Search -->

    <div class="bg-white rounded-2xl shadow-md p-6 mb-8">

        <form method="GET">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search Error Code..."
                    class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                >

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition"
                >
                    Search
                </button>

            </div>

        </form>

    </div>

    <!-- Table -->

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="px-6 py-4 border-b">

            <h2 class="text-xl font-semibold text-slate-800">
                Error Logs
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-800 text-white">

                        <th class="p-4 text-left">
                            ID
                        </th>

                        <th class="p-4 text-left">
                            Error Code
                        </th>

                        <th class="p-4 text-left">
                            URL
                        </th>

                        <th class="p-4 text-left">
                            Date & Time
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($visits as $visit)

                    <tr class="border-b hover:bg-slate-50">

                        <td class="p-4">
                            {{ $visit->id }}
                        </td>

                        <td class="p-4">

                            @if($visit->error_code == 404)

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    404
                                </span>

                            @elseif($visit->error_code == 403)

                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">
                                    403
                                </span>

                            @elseif($visit->error_code == 500)

                                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">
                                    500
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                    {{ $visit->error_code }}
                                </span>

                            @endif

                        </td>

                        <td class="p-4">
                            {{ $visit->url }}
                        </td>

                        <td class="p-4 text-gray-500">
                            {{ $visit->created_at->format('d M Y h:i A') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center p-8 text-gray-500">

                            No error logs found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Pagination -->

    <div class="mt-6">

        {{ $visits->links() }}

    </div>

</div>

</body>
</html>
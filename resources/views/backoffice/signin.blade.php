<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Signn In - BackOffice</title>

        <!-- font awesome -->   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

        <!-- google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    <body class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full mx-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        BackOffice Sign In
                    </h2>
                    <p class="text-gray-600 mt-2">
                        Please sign in to your account
                    </p>
                </div>

                <form method="post" action="{{ route('backoffice-signin') }}"
                    class="space-y-6">
                    @csrf

                    <div>
                        <label for="username" class="block">
                            <i class="fa-solid fa-user"></i>
                            username
                        </label>
                        <input type="text" id="username" name="username" required />
                    </div>

                    <div>
                        <label for="password" class="block">
                            <i class="fa-solid fa-lock"></i>
                            password
                        </label>
                        <input type="password" id="password" name="password" required />
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-50 text-red-500 p-4 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit"
                        class="w-full flex justify-center items-center py-2 px-4 rounded-md">
                        Sign In
                        <i class="fa-solid fa-sign-in-alt ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
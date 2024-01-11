<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add these styles to hide the scrollbar but still allow scrolling */
        body::-webkit-scrollbar {
            width: 0.5em;
        }

        body::-webkit-scrollbar-track {
            background-color: transparent;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #888;
        }

        body::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center bg-[#ededed] items-center h-[100vh]">
    <form method="POST" action="{{ route('todos.store') }}"
        class="w-full max-w-screen-xl flex justify-center items-center pt-3">
        @csrf
        <div class="md:w-2/4 border h-full rounded-md mx-3 bg-white text-[#343a40]">
            <h1 class="text-center text-[2rem] font-bold mt-3">TO-DO LISTS</h1>
            <div class="mx-5 mt-6">
                <input
                    class="border w-full h-12 rounded-md pl-2 text-lg font-bold focus:outline-[#4C49ED] focus:border-white"
                    type="text" name="title" placeholder="todo list title" required>

                <textarea class="border w-full h-[8rem] rounded-md pl-2 text-lg mt-2 pt-2 focus:outline-[#4C49ED] focus:border-white"
                    name="description" cols="50" rows="10" placeholder="todo list description...."></textarea>
                <button
                    class= " border-none cursor-pointer text-white w-full h-[3.5rem] rounded-md pl-2 text-lg mt-2 bg-[#4C49ED]"
                    type="submit">
                    Add
                </button>
                <div class="h-[18rem] pt-2 gap-1">
                    <ul>
                        @foreach ($todos as $todo)
                            <div
                                class=" text-black border justify-between rounded-sm h-12 flex items-center pl-2 mt-1 bg-[#e0e3ff]">
                                <div>
                                    @if ($todo->isDone)
                                        <div class="line-through text-[#0000005c]">
                                            📑 {{ $todo->title }} - {{ $todo->description }}
                                        </div>
                                    @else
                                        📑 {{ $todo->title }} - {{ $todo->description }}
                                    @endif
                                </div>
                                <div class="flex gap-2 pr-3">
                                    <div class="cursor-pointer">🗑️</div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

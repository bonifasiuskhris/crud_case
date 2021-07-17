<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="py-12">
        <div class="container bg-red-500 flex items-center text-white text-sm font-bold max-w-7xl mx-auto sm:px-6 lg:px-8 relative"
			role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

			<span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
				<svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 20 20">
					<title>Close</title>
					<path
						d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
				</svg>
			</span>
		</div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{url('/employee/'.$employee->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="mt-3">
                            <label class="block text-sm mb-2 text-gray-00" for="period">Full Name</label>
                            <input class="w-full px-5 py-1 text-gray-700" type="text" name="full_name" id="full_name" value="{{$employee->full_name}}" required>
                        </div>
                        <div class="mt-10">
                            <button class="w-full py-2 text-white font-light tracking-wider bg-green-600 rounded"
                                type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

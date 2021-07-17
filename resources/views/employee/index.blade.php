<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <div class="w-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Employee List') }}
                </h2>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{url('/employee/create')}}" class="text-white px-5 py-3 bg-gray-600">
                    Create New
                </a>
            </div>
        </div>
    </x-slot>

    @if (session('status'))
    <div class="py-4">
        <div class="container bg-green-500 flex items-center text-white text-sm font-bold max-w-7xl mx-auto sm:px-6 lg:px-8 relative"
			role="alert">
            {{ session('status') }}

			<span class="ml-auto top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
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
                    <table class="min-w-max w-full table-auto table-bordered">
                        <thead>
                            <tr>
                                <th class="text-left">EMP ID</th>
                                <th class="text-left">Full Name</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $i=>$employee)
                            <tr>
                                <td class="py-5">{{$employee->emp_id}}</td>
                                <td class="py-5">{{$employee->full_name}}</td>
                                <td class="py-5">
                                    <div class="flex">
                                        <a href="{{route('employee.edit',['employee'=>$employee->id])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{route('employee.destroy',['employee'=>$employee->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                  </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

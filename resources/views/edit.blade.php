<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Payroll') }}
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
                    <form method="POST" action="{{url('/payroll/update')}}">
                        @csrf
                        <p class="text-gray-800 mb-3 font-medium">Payroll</p>
                        <div class="mt-3">
                            <label class="block text-sm mb-2 text-gray-00" for="period">Period</label>
                            <select class="w-full px-5 py-1 text-gray-700" name="period_id" id="period_id" required>
                                <option {{$period->id==$period_id ? 'selected' : null}} value="{{$period->id}}">{{$period->month}} {{$period->year}}</option>
                            </select>
                        </div>
                        <p class="text-gray-800 mt-6 mb-3 font-medium">Employee</p>
                        <div class="mt-3">
                            <label class="block text-sm mb-2 text-gray-00" for="employee_id">Name</label>
                            <select class="w-full px-5 py-1 text-gray-700" name="employee_id" id="employee_id" required>
                                <option selected value="{{$employee->id}}">{{$employee->emp_id}} - {{$employee->full_name}}</option>
                            </select>
                        </div>

                        <div id="employee_component_master" class="employee_component_master flex">
                            <div class="mt-3 mx-1 w-1/3">
                                <label class="block text-sm mb-2 text-gray-600" for="cus_email">Component</label>
                                <select class="w-full px-5 py-1 text-gray-700" name="component_id[]" id="" required>
                                    @foreach ($components as $component)
                                    <option {{$employeeComponent->first()->component_id == $component->id ? 'selected' : null}} value="{{$component->id}}">{{$component->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 mx-1 w-1/3">
                                <label class="block text-sm mb-2 text-gray-600" for="current_amount">Current Amount</label>
                                <input class="w-full px-5 py-1 text-gray-700" id="current_amount" name="current_amount[]" type="number"
                                    required="" placeholder="" aria-label="Email" value="{{$employeeComponent->first()->current_amount}}">
                            </div>
                            <div class="mt-3 mx-1 w-1/3">
                                <label class="block text-sm mb-2 text-gray-600" for="new_amount">New Amount</label>
                                <input class="w-full px-5 py-1 text-gray-700" id="new_amount" name="new_amount[]" type="number"
                                    required="" placeholder="" aria-label="Email" value="{{$employeeComponent->first()->new_amount}}">
                            </div>
                        </div>
                        <div id="employee_component_duplicate" class="employee_component_duplicate">
                            <div class="flex">
                                @foreach ($employeeComponent as $i=>$empc)
                                @if ($i!=0)
                                <div class="mt-3 mx-1 w-1/3">
                                    <label class="block text-sm mb-2 text-gray-600" for="cus_email">Component</label>
                                    <select class="w-full px-5 py-1 text-gray-700" name="component_id[]" id="" required>
                                        @foreach ($components as $component)
                                        <option {{$empc->component_id == $component->id ? 'selected' : null}} value="{{$component->id}}">{{$component->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 mx-1 w-1/3">
                                    <label class="block text-sm mb-2 text-gray-600" for="current_amount">Current Amount</label>
                                    <input class="w-full px-5 py-1 text-gray-700" id="current_amount" name="current_amount[]" type="number"
                                        required="" placeholder="" aria-label="Email" value="{{$empc->current_amount}}">
                                </div>
                                <div class="mt-3 mx-1 w-1/3">
                                    <label class="block text-sm mb-2 text-gray-600" for="new_amount">New Amount</label>
                                    <input class="w-full px-5 py-1 text-gray-700" id="new_amount" name="new_amount[]" type="number"
                                        required="" placeholder="" aria-label="Email" value="{{$empc->new_amount}}">
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-4 text-right">
                            <button id="add_new_component" class="text-xs px-4 py-1 text-white font-light tracking-wider bg-gray-400 rounded "
                                type="button">+ Add New Component</button>
                        </div>
                        <div class="mt-10">
                            <button class="w-full py-2 text-white font-light tracking-wider bg-green-600 rounded"
                                type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(function() {
        console.log('employee change!');
        // $('#period_id').change();
    });
</script>

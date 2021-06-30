<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--  Application Details Start -->
    <div class="w-full bg-grey-500">
        <div class="container mx-auto py-8">
            <div class="w-96 mx-auto bg-white rounded shadow">

                <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500">Student Application
                </div>

                <form name="student_application" id="student_application" action="">
                    <div class="py-4 px-8">

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Student ID:</label>
                            <input class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                                name="student_id" id="student_id" value="" placeholder="Enter Your ID">
                     
                        </div>


                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Student Name</label>
                            <input class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                                name="student_name" id="student_name" value="" placeholder="Enter Your Name">
                      
                        </div>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Course Name:</label>
                            <input class=" border rounded w-full py-2 px-3 text-grey-darker" type="text"
                                name="course_name" id="course_name" value="" placeholder="Enter Your Course Name">
                            <p id=error_creater_id></p>
                        </div>


                             <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2">Addmission Date:</label>
                            <input class=" border rounded w-full py-2 px-3 text-grey-darker" type="datetime-local"
                                name="addmission_date" id="addmission_date" value="">
                            <p id=error_intake_year></p>
                        </div>
                        <div class="mb-4">
                            <button
                                class="mb-2 mx-16 rounded-full py-1 px-24 bg-gradient-to-r from-green-400 to-blue-500 ">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!--  Application Details End -->
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
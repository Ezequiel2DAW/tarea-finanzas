<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                        DATE
                </th>
                <th scope="col" class="px-6 py-3 bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                        CATEGORY
                </th> 
                <th scope="col" class="px-6 py-3 bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                        AMOUNT
                </th> 
                <th scope="col" class="px-6 py-3 bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                        
                </th>
                <th scope="col" class="px-6 py-3 bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                        
                </th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData as $row)
                @if($loop->even)
                    <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @endif    
                @foreach ($row as $key => $value)
                    @if($key != 'id')
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$value}}
                        </th> 
                    @else
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <x-button href="{{'/'.$tableType.'/edit/'.$value}}">Update</x-button>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <x-button href="{{'/'.$tableType.'/delete/'.$value}}">Delete</x-button>
                        </th>
                    @endif
                @endforeach
            </tr>    
            @endforeach
        </tbody>
    </table>
</div>
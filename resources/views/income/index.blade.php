<x-layouts.index :title="$title" :links="$links">
    <div class="mb-4">
        <x-button href="incomes/add">Add Income</x-button>
    </div>
    <x-table :tableData="$tableData"/>
</x-layouts.index>
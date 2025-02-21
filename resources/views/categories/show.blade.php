<x-layouts.index :title="$title" :links="$links">
    <h2 class="text-3xl font-bold dark mb-3">Incomes</h2>
    <div class="mb-9">
        <x-table :tableData="$incomes" tableType="incomes"></x-table>
    </div>
    <h2 class="text-3xl font-bold dark mb-3">Expenses</h2>
    <div class="mb-9">
        <x-table :tableData="$expenses" tableType="expenses"></x-table>
    </div>
</x-layouts.index>

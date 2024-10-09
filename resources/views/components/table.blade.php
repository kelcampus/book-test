<table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200 dark:divide-gray-700']) }}>
    <thead class="bg-gray-50 dark:bg-gray-800">
        <tr class="text-left font-bold">
            {{$header}}
        </tr>
    </thead>
    <tbody {{ $attributes->merge(['class' => 'bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900']) }}>
        {{$slot}}
    </tbody>
</table>

@props(['success' => null, 'error' => null])

@if ($success)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $success }}
    </div>
@endif

@if ($error)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-red-600 dark:text-red-400']) }}>
        {{ $error }}
    </div>
@endif

<table {{ $attributes->merge(['class' => 'table table-bordered table-striped table-hover']) }}>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
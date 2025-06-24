<div class="btn-group" role="group" aria-label="Basic example">
    @foreach ($data as $btn)
        @isset($btn['can'])
            @can($btn['can'])
                <x-staff.table-button :url="$btn['url']" :type="$btn['type']" :id="$btn['id'] ?? true" />
            @endcan
        @else
            <x-staff.table-button :url="$btn['url']" :type="$btn['type']" :id="$btn['id'] ?? true" />
        @endisset
    @endforeach
</div>

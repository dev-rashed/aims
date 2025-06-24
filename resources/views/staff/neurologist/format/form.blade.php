<x-staff.form-modal
    :title="isset($format) ? 'Update format':'Add New format'"
    action="{{isset($format) ? route('staff.format.update', $format->id) : route('staff.format.store')}}"
    :button="isset($format) ? 'Update':'Submit'"
>
    @isset($format)
        @method('PUT')
    @endisset

    <x-staff.form-group
        label="name"
        placeholder="Enter format name"
        :value="$format->name ?? ''"
    />
</x-staff.form-modal>

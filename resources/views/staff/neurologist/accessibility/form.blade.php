<x-staff.form-modal 
    :title="isset($accessibility) ? 'Update accessibility':'Add New accessibility'" 
    action="{{isset($accessibility) ? route('staff.accessibility.update', $accessibility->id) : route('staff.accessibility.store')}}"
    :button="isset($accessibility) ? 'Update':'Submit'"
>
    @isset($accessibility)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter accessibility name"
        :value="$accessibility->name ?? ''"
    />
</x-staff.form-modal>

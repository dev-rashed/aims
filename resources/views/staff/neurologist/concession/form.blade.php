<x-staff.form-modal 
    :title="isset($concession) ? 'Update Concession':'Add New Concession'" 
    action="{{isset($concession) ? route('staff.concession.update', $concession->id) : route('staff.concession.store')}}"
    :button="isset($concession) ? 'Update':'Submit'"
>
    @isset($concession)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter concession name"
        :value="$concession->name ?? ''"
    />
</x-staff.form-modal>

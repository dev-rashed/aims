<x-staff.form-modal 
    :title="isset($session) ? 'Update Session':'Add New Session'" 
    action="{{isset($session) ? route('staff.session.update', $session->id) : route('staff.session.store')}}"
    :button="isset($session) ? 'Update':'Submit'"
>
    @isset($session)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter session name"
        :value="$session->name ?? ''"
    />
</x-staff.form-modal>

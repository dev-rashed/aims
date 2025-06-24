<x-staff.form-modal 
    :title="isset($profession) ? 'Update Profession':'Add New Profession'" 
    action="{{isset($profession) ? route('staff.profession.update', $profession->id) : route('staff.profession.store')}}"
    :button="isset($profession) ? 'Update':'Submit'"
>
    @isset($profession)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter profession name"  
        :value="$profession->name ?? ''"
    />
</x-staff.form-modal>

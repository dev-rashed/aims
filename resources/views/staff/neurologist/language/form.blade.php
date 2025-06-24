<x-staff.form-modal 
    :title="isset($language) ? 'Update Language':'Add New Language'" 
    action="{{isset($language) ? route('staff.language.update', $language->id) : route('staff.language.store')}}"
    :button="isset($language) ? 'Update':'Submit'"
>
    @isset($language)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter language name"
        :value="$language->name ?? ''"
    />
</x-staff.form-modal>

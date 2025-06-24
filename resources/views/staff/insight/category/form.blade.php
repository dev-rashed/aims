<x-staff.form-modal 
    :title="isset($articleCategory) ? 'Update category':'Add New category'" 
    action="{{isset($articleCategory) ? route('staff.article-category.update', $articleCategory->id) : route('staff.article-category.store')}}"
    :button="isset($articleCategory) ? 'Update':'Submit'"
>
    @isset($articleCategory)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="name" 
        placeholder="Enter category name"
        :value="$articleCategory->name ?? ''"
    />
</x-staff.form-modal>

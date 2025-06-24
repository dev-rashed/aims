<x-staff.form-modal
    :title="isset($counsellor) ? 'Update contributor':'Add New contributor'"
    action="{{isset($counsellor) ? route('staff.counsellor.update', $counsellor->id) : route('staff.counsellor.store')}}"
    :button="isset($counsellor) ? 'Update':'Submit'"
    id="fileForm"
    size="lg"
>
    @isset($counsellor)
        @method('PUT')
    @endisset

    <x-staff.form-group
        label="first_name"
        placeholder="Enter contributor first name"
        :value="$counsellor->first_name ?? ''"
    />
    <x-staff.form-group
        label="last_name"
        placeholder="Enter contributor last name"
        :value="$counsellor->last_name ?? ''"
    />
    <x-staff.form-group
        label="designation"
        placeholder="Enter contributor designation"
        :value="$counsellor->designation ?? ''"
    />
    <x-staff.form-group
        label="email"
        type="email"
        placeholder="Enter contributor email"
        :value="$counsellor->email ?? ''"
    />
    <x-staff.form-group
        label="phone"
        placeholder="Enter contributor phone"
        :value="$counsellor->phone ?? ''"
    />
    <x-staff.form-group label="image" :isInput="false" :required="false">
        <input type="file" name="image" id="image" class="form-control" data-show-image="show_counsellor_image" />
    </x-staff.form-group>

    <div class="">
        <img src="{{ isset($counsellor) ? uploadedFile($counsellor->image) : '' }}" id="show_counsellor_image" class="img-fluid" />
    </div>

</x-staff.form-modal>

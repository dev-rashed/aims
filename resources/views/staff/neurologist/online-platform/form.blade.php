<x-staff.form-modal
    :title="isset($onlinePlatform) ? 'Update online platform':'Add New online platform'"
    action="{{isset($onlinePlatform) ? route('staff.online-platform.update', $onlinePlatform->id) : route('staff.online-platform.store')}}"
    :button="isset($onlinePlatform) ? 'Update':'Submit'"
    id="fileForm"
>
    @isset($onlinePlatform)
        @method('PUT')
    @endisset

    <x-staff.form-group
        label="name"
        placeholder="Enter online platform name"
        :value="$onlinePlatform->name ?? ''"
    />

    <x-staff.form-group label="image" :isInput="false" :required="!isset($onlinePlatform)">
        <input type="file" name="image" id="image" class="form-control" data-show-image="show_online_platform_image" />
    </x-staff.form-group>

    <div class="">
        <img src="{{ isset($onlinePlatform) ? uploadedFile($onlinePlatform->image) : '' }}" id="show_online_platform_image" class="img-fluid" />
    </div>

</x-staff.form-modal>

<x-staff.form-modal
    :title="isset($service) ? 'Update service':'Add New service'"
    action="{{isset($service) ? route('staff.service.update', $service->id) : route('staff.service.store')}}"
    :button="isset($service) ? 'Update':'Submit'"
    id="fileForm"
    size="lg"
>
    @isset($service)
        @method('PUT')
    @endisset

    <x-staff.form-group
        label="title"
        placeholder="Enter service title"
        :value="$service->title ?? ''"
    />
    <x-staff.form-group
        label="link"
        placeholder="Enter service link"
        :value="$service->link ?? ''"
        :required="false"
    />

    <x-staff.form-group label="description" :isInput="false">
        <textarea name="description" id="description" cols="5" class="form-control" placeholder="Enter service description">{{ $service->description ?? '' }}</textarea>
    </x-staff.form-group>

    <x-staff.form-group label="image" type="file" accept="image/*" :required="!isset($service)" data-show-image="show_service_image" />

    <div class="">
        <img src="{{ isset($service) ? uploadedFile($service->image) : '' }}" id="show_service_image" class="img-fluid" />
    </div>

</x-staff.form-modal>

<x-staff.form-modal
    :title="isset($review) ? 'Update testimonial':'Add New testimonial'"
    action="{{isset($review) ? route('staff.review.update', $review->id) : route('staff.review.store')}}"
    :button="isset($review) ? 'Update':'Submit'"
    id="fileForm"
    size="lg"
>
    @isset($review)
        @method('PUT')
    @endisset

    <x-staff.form-group
        label="name"
        placeholder="Enter name"
        :value="$review->name ?? ''"
    />
    <x-staff.form-group
        label="rating"
        type="number"
        placeholder="Enter rating"
        :value="$review->rating ?? ''"
        min="1"
        max="5"
        step="0.5"
    />
    <x-staff.form-group
        label="title"
        placeholder="Enter title"
        :value="$review->title ?? ''"
    />

    <x-staff.form-group label="description" :isInput="false">
        <textarea name="description" id="description" cols="5" class="form-control" placeholder="Enter description">{{ $review->description ?? '' }}</textarea>
    </x-staff.form-group>

    <x-staff.form-group label="image" :isInput="false" :required="!isset($review)">
        <input type="file" name="image" id="image" class="form-control" data-show-image="show_review_image" />
    </x-staff.form-group>

    <div class="">
        <img src="{{ isset($review) ? uploadedFile($review->image) : '' }}" id="show_review_image" class="img-fluid" />
    </div>

</x-staff.form-modal>

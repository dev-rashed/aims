@php($index = $key ?? 0)
<fieldset class="border mb-3" style="padding: revert" id="item">
    <legend class="float-none w-auto">
        Item:
        <a href="javascript:void(0)" id="removeItem" class="text-danger"><i class="bx bxs-trash"></i></a>
    </legend>
    <x-staff.form-group
        label="name"
        for="items[{{ $index }}][name]"
        placeholder="Enter team name"
        :value="$item->name ?? ''"
        class="name"
    />
    <x-staff.form-group
        label="designation"
        for="items[{{ $index }}][designation]"
        placeholder="Enter team designation"
        :value="$item->designation ?? ''"
        class="designation"
    />
    <x-staff.form-group
        label="image"
        type="file"
        for="items[{{ $index }}][image]"
        class="image"
        :required="false"
    />
    @isset ($item)
        <div>
            <img src="{{ uploadedFile($item->image) }}" width="150px" />
        </div>
    @endisset

    <x-staff.form-group label="description" :isInput="false" :required="false">
        <textarea name="items[{{ $index }}][description]" id="items[{{ $index }}][description]" cols="5" class="form-control text-editor description">{{ $item->description ?? '' }}</textarea>
    </x-staff.form-group>

</fieldset>

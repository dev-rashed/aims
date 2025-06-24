<x-staff.form-modal 
    :title="isset($coupon) ? 'Update coupon':'Add New coupon'" 
    action="{{isset($coupon) ? route('staff.coupon.update', $coupon->id) : route('staff.coupon.store')}}"
    :button="isset($coupon) ? 'Update':'Submit'"
    id="fileForm"
>
    @isset($coupon)
        @method('PUT')
    @endisset

    <x-staff.form-group 
        label="code" 
        placeholder="Enter coupon code"
        :value="$coupon->code ?? ''"
    />
    <x-staff.form-group
    label="discount_type"
        :isInput="false"
    >
        <select id="discount_type" name="discount_type" class="form-control">
            @foreach ($discount_types as $discount_type)
                <option value="{{ $discount_type }}">{{ ucfirst($discount_type) }}</option>
            @endforeach
        </select>
    </x-staff.form-group>

    <x-staff.form-group
    label="discount"
        placeholder="Enter discount..."
        :value="$coupon->discount ?? ''"
    />

    <x-staff.form-group
        label="expire_date"
        type="date"
        :value="$coupon->expire_date ?? ''"
    />

</x-staff.form-modal>

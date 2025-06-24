<x-staff.form-modal
    :title="isset($membershipPlan) ? 'Update membership plan':'Add New membership plan'"
    action="{{isset($membershipPlan) ? route('staff.membership-plan.update', $membershipPlan->id) : route('staff.membership-plan.store')}}"
    :button="isset($membershipPlan) ? 'Update':'Submit'"
    id="submit"
    size="lg"
>
    @isset($membershipPlan)
        @method('PUT')
        <input type="hidden" title="id" value="{{$membershipPlan->id}}" />
    @endisset

    <x-staff.form-group
        label="name"
        placeholder="Enter membership plan"
        :value="$membershipPlan->name ?? ''"
    />
    <x-staff.form-group
        label="title"
        placeholder="Enter membership plan title"
        :value="$membershipPlan->title ?? ''"
    />

    <x-staff.form-group
        label="monthly_price"
        type="number"
        step="0.5"
        placeholder="Enter membership monthly price"
        :value="$membershipPlan->monthly_price ?? ''"
    />
    <x-staff.form-group
        label="yearly_price"
        type="number"
        step="0.5"
        placeholder="Enter membership yearly price"
        :value="$membershipPlan->yearly_price ?? ''"
    />

    <x-staff.form-group label="description" :isInput="false">
        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter membership plan description">{{ $membershipPlan->description ?? '' }}</textarea>
    </x-staff.form-group>

</x-staff.form-modal>

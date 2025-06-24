<x-staff.form-modal
    :title="isset($review) ? 'Update testimonial':'Update membership'"
    action="{{isset($review) ? route('staff.renew.update', $renew->id) : route('staff.renew.store')}}"
    :button="isset($review) ? 'Update':'Submit'"
    size="lg"
>
    @isset($review)
        @method('PUT')
    @endisset

    <div class="row">

        <x-staff.form-group label="member" for="user" :isInput="false" column="col-12">
            <select name="user" id="user" class="form-control single-select">
                <option value="">Select user</option>
                @foreach ($data->users as $user)
                    <option value="{{ $user->id }}">{{ $user?->full_name }}</option>
                @endforeach
            </select>
        </x-staff.form-group>

        <x-staff.form-group label="type" :isInput="false" column="col-12">
            <select name="type" id="type" class="form-control">
                @foreach (['renew','upgrade','cancel'] as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </x-staff.form-group>

        <x-staff.form-group label="membership_plan" :isInput="false" column="col-12">
            <select name="membership_plan" id="membership_plan" class="form-control single-select">
                <option value="">Select membership plan</option>
                @foreach ($data->membershipPlans as $membershipPlan)
                    <option value="{{ $membershipPlan->id }}">{{ $membershipPlan->name }}</option>
                @endforeach
            </select>
        </x-staff.form-group>

        <x-staff.form-group label="membership_type" :isInput="false" column="col-12">
            <select name="membership_type" id="membership_type" class="form-control">
                @foreach (['monthly','yearly'] as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </x-staff.form-group>

        <x-staff.form-group label="note" :isInput="false" :required="false" column="col-12">
            <textarea name="note" id="note" cols="5" class="form-control text-editor"></textarea>
        </x-staff.form-group>

    </div>

</x-staff.form-modal>

<script>
    window.users = @json($data->users);
    window.membershipPlans = @json($data->membershipPlans);
</script>

<x-staff.form-modal title="Update Status" :action="route('staff.application.update', $therapist->id)" button="Submit">
    @isset($therapist)
        @method('PUT')
    @endisset

    <x-staff.form-group label="status" :isInput="false" column="col-12">
        <select name="status" id="status" class="form-control">
            @foreach (['review','under review','approved','rejected'] as $item)
                <option value="{{ $item }}" @selected($item == $therapist->status)>{{ ucfirst($item) }}</option>
            @endforeach
        </select>
    </x-staff.form-group>

    <x-staff.form-group label="membership" for="membership_id" :isInput="false" column="col-12">
        <select name="membership_id" id="membership_id" class="form-control">
            @foreach ($plans as $plan)
                <option value="{{ $plan->id }}" @selected($plan->id == $therapist->membership_id)>{{ $plan->name }}</option>
            @endforeach
        </select>
    </x-staff.form-group>

    <x-staff.form-group label="membership_type" :isInput="false" column="col-12">
        <select name="membership_type" id="membership_type" class="form-control">
            @foreach (['monthly','yearly'] as $item)
                <option value="{{ $item }}" @selected($item == $therapist->membership_type)>{{ ucfirst($item) }}</option>
            @endforeach
        </select>
    </x-staff.form-group>

</x-staff.form-modal>

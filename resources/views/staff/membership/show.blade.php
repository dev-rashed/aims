<x-staff.form-modal title="Membership Plan Details" size="lg">
    <table class="table table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th width="15%">Name</th>
                <td>{{ $membershipPlan->name }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $membershipPlan->title }}</td>
            </tr>
            <tr>
                <th>Monthly Price</th>
                <td>{{ convertAmount($membershipPlan->monthly_price) }}</td>
            </tr>
            <tr>
                <th>Yearly Price</th>
                <td>{{ convertAmount($membershipPlan->yearly_price) }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $membershipPlan->description }}</td>
            </tr>
        </tbody>
    </table>
</x-staff.form-modal>

<x-staff.form-modal title="Career Information" size="lg">
    @method('PUT')
    <table class="table table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th width="14%">Name</th>
                <td>{{ $career->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $career->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $career->phone }}</td>
            </tr>
            <tr>
                <th>Details</th>
                <td>{{ $career->details }}</td>
            </tr>
        </tbody>
    </table>
</x-staff.form-modal>

@extends('layouts.staff.app')

@section('title', 'Setting Details')

@section('content')

    <x-staff.page title="Setting Details">

        <x-slot name="header">
            @can('edit_setting')
                <x-staff.page-button :href="route('staff.setting.edit')" title="Edit setting" icon="edit" />
            @endcan
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="10%">App Name</th>
                    <td>{{ setting('app_name') }}</td>
                </tr>
                <tr>
                    <th>App Title</th>
                    <td>{{ setting('app_title') }}</td>
                </tr>
                <tr>
                    <th>App Description</th>
                    <td>{{ setting('app_description') }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ setting('email') }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ setting('phone') }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ setting('address') }}</td>
                </tr>
                <tr>
                    <th>Copyright</th>
                    <td>{{ setting('copyright') }}</td>
                </tr>
                <tr>
                    <th>Timezone</th>
                    <td>{{ setting('timezone') }}</td>
                </tr>
                <tr>
                    <th>Date format</th>
                    <td>{{ setting('date_format') }}</td>
                </tr>
                <tr>
                    <th>Currency Symbol</th>
                    <td>{{ setting('currency_symbol') }}</td>
                </tr>
                <tr>
                    <th>Currency Position</th>
                    <td>{{ setting('currency_position') }}</td>
                </tr>
                <tr>
                    <th>Logo</th>
                    <td>
                        <img src="{{ uploadedFile(setting('logo')) }}" class="img-fluid" alt="Logo" srcset="{{ uploadedFile(setting('currency_position')) }}" />
                    </td>
                </tr>
                <tr>
                    <th>Favicon</th>
                    <td>
                        <img src="{{ uploadedFile(setting('favicon')) }}" class="img-fluid" alt="favicon" srcset="{{ uploadedFile(setting('favicon')) }}" />
                    </td>
                </tr>
            </tbody>
        </table>

    </x-staff.page>

@endsection

@extends('layouts.staff.app')

@section('title', 'Edit settings')

@section('content')

    <x-staff.page title="Edit settings">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.setting.index')" title="Back to setting" icon="back" class="btn-danger me-2" />
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{ route('staff.setting.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            @php $tabs = ['general', 'finance', 'mail', 'social', 'file','api_configuration']; @endphp

            <ul class="nav nav-pills mb-3 justify-content-center" role="tablist">
                <x-staff.setting-tab :name="$tabs[0]" icon="bx-home" :active="true" />
                <x-staff.setting-tab :name="$tabs[1]" icon="bx-credit-card-alt" />
                <x-staff.setting-tab :name="$tabs[2]" icon="bx-envelope" />
                <x-staff.setting-tab :name="$tabs[3]" icon="bx-link" />
                <x-staff.setting-tab :name="$tabs[4]" icon="bx-image-alt" />
                <x-staff.setting-tab :name="$tabs[5]" icon="bx-cog" />
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="primary-pills-{{ $tabs[0] }}" role="tabpanel">
                    <div class="row">
                        <x-staff.form-group
                            label="app_name"
                            placeholder="Enter app name"
                            :value="setting('app_name')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="app_title"
                            placeholder="Enter app title"
                            :value="setting('app_title')"
                            column="col-md-6"
                            :required="false"
                        />

                        <x-staff.form-group
                            label="email"
                            placeholder="Enter email"
                            :value="setting('email')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="phone"
                            placeholder="Enter phone"
                            :value="setting('phone')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="invoice_prefix"
                            placeholder="Enter invoice prefix"
                            :value="setting('invoice_prefix')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="address"
                            placeholder="Enter address"
                            :value="setting('address')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="app_description"
                            placeholder="Enter app description"
                            :value="setting('app_description')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="copyright"
                            placeholder="Enter copyright"
                            :value="setting('copyright')"
                            column="col-12"
                            :required="false"
                        />
                    </div>

                </div>

                <div class="tab-pane fade" id="primary-pills-{{ $tabs[1] }}" role="tabpanel">
                    <div class="row">
                        <x-staff.form-group label="timezone" column="col-md-6" :required="false" :isInput="false">
                            <select name="timezone" id="timezone" class="form-control single-select">
                                <option value="">Select timezone</option>
                                @foreach ($data['timezones'] as $key => $timezone)
                                    <option value="{{ $key }}" @selected($key == setting('timezone'))>{{ $key }}</</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group label="date_format" column="col-md-6" :required="false" :isInput="false">
                            <select name="date_format" id="date_format" class="form-control single-select">
                                <option value="">Select date format</option>
                                @foreach ($data['dateFormats'] as $dateFormat)
                                    <option value="{{ $dateFormat }}" @selected($dateFormat == setting('date_format'))>{{ $dateFormat }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group label="currency" for="currency_symbol" column="col-md-6" :required="false" :isInput="false">
                            <select name="currency_symbol" id="currency_symbol" class="form-control single-select" required>
                                @foreach ($data['currencies'] as $currency)
                                    <option value="{{ $currency->id }}" @selected(setting('currency_symbol') == $currency->id)>
                                        {{ $currency->name }}({{ $currency->symbol }})
                                    </option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group label="currency_position" column="col-md-6" :required="false" :isInput="false">
                            <select name="currency_position" id="currency_position" class="form-control single-select" required>
                                @foreach (['After Amount', 'Before Amount'] as $currency_position)
                                    <option value="{{ $currency_position }}"
                                        @selected(setting('currency_position') == $currency_position)
                                    >
                                        {{ $currency_position }}
                                    </option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                    </div>
                </div>

                <div class="tab-pane fade" id="primary-pills-{{ $tabs[2] }}" role="tabpanel">
                    <div class="row">

                        <x-staff.form-group label="mailer" :isInput="false" column="col-md-6" :required="false">
                            <select name="mail[mailer]" id="mailer" class="form-control text-uppercase" required>
                                @foreach (['smtp','sendmail'] as $mailer)
                                    <option value="{{ $mailer }}" @selected(config('mail.mailers.smtp.transport') == $mailer)>{{ $mailer }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group label="encryption" :isInput="false" column="col-md-6" :required="false">
                            <select name="mail[encryption]" id="encryption" class="form-control text-uppercase" required>
                                @foreach (['tls','ssl'] as $encryption)
                                    <option value="{{ $encryption }}" @selected(config('mail.mailers.smtp.encryption') == $encryption)>{{ $encryption }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group label="port" :isInput="false" column="col-md-6" :required="false">
                            <select name="mail[port]" id="port" class="form-control" required>
                                @foreach ([465,587,2525,25] as $port)
                                    <option value="{{ $port }}" @selected(config('mail.mailers.smtp.port') == $port)>{{ $port }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group
                            label="host"
                            for="mail[host]"
                            placeholder="Enter host"
                            :value="config('mail.mailers.smtp.host')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="username"
                            for="mail[username]"
                            placeholder="Enter username"
                            :value="config('mail.mailers.smtp.username')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="password"
                            type="password"
                            for="mail[password]"
                            placeholder="Enter password"
                            :value="config('mail.mailers.smtp.password')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="from_address"
                            for="mail[from_address]"
                            placeholder="Enter from_address"
                            :value="config('mail.from.address')"
                            column="col-md-6"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="from_name"
                            for="mail[from_name]"
                            placeholder="Enter from_name"
                            :value="config('mail.from.name')"
                            column="col-md-6"
                            :required="false"
                        />
                    </div>
                </div>

                <div class="tab-pane fade" id="primary-pills-{{ $tabs[3] }}" role="tabpanel">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary mb-4" id="addNewSocial">Add New</button>
                    </div>
                    <table class="table table-bordered" id="social-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (setting('socials') != null)
                                @foreach (json_decode(setting('socials')) as $social)
                                    <tr>
                                        <td>
                                            <select name="social_name[]" id="social_name[]" class="form-control">
                                                <option value="">Select social</option>
                                                @foreach (DB::table('online_platforms')->pluck('name') as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="url" value="{{ $social->url }}" name="social_url[]" id="social_url[]" class="form-control" placeholder="Enter social media url" />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" id="removeSocial"><i class='bx bx-trash'></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="primary-pills-{{ $tabs[4] }}" role="tabpanel">
                    <div class="row">

                        <x-staff.form-group label="logo (for dark background)" for="logo" :isInput="false" column="col-md-6" :required="false">
                            <input type="file" name="logo" id="logo" class="form-control" data-show-image="show_logo_image" />

                            <div class="mt-2">
                                <img src="{{ uploadedFile(setting('logo')) }}" id="show_logo_image" class="img-fluid" />
                            </div>

                        </x-staff.form-group>

                        <x-staff.form-group label="dark_logo (for white background)" for="dark_logo" :isInput="false" column="col-md-6" :required="false">
                            <input type="file" name="dark_logo" id="dark_logo" class="form-control" data-show-image="show_dark_logo_image" />

                            <div class="mt-2">
                                <img src="{{ uploadedFile(setting('dark_logo')) }}" id="show_dark_logo_image" class="img-fluid" />
                            </div>
                        </x-staff.form-group>

                        <x-staff.form-group label="footer_logo" :isInput="false" column="col-md-6" :required="false">
                            <input type="file" name="footer_logo" id="footer_logo" class="form-control" data-show-image="show_footer_logo_image" />

                            <div class="mt-2">
                                <img src="{{ uploadedFile(setting('footer_logo')) }}" id="show_footer_logo_image" class="img-fluid" />
                            </div>
                        </x-staff.form-group>

                        <x-staff.form-group label="favicon" :isInput="false" column="col-md-6" :required="false">
                            <input type="file" name="favicon" id="favicon" class="form-control" data-show-image="show_favicon_image" />

                            <div class="mt-2">
                                <img src="{{ uploadedFile(setting('favicon')) }}" id="show_favicon_image" class="img-fluid" />
                            </div>
                        </x-staff.form-group>

                        <x-staff.form-group label="default_image" :isInput="false" column="col-md-6" :required="false">
                            <input type="file" name="default_image" id="default_image" class="form-control" data-show-image="show_default_image_image" />

                            <div class="mt-2">
                                <img src="{{ uploadedFile(setting('default_image')) }}" id="show_default_image_image" class="img-fluid" />
                            </div>
                        </x-staff.form-group>

                    </div>
                </div>

                <div class="tab-pane fade" id="primary-pills-{{ $tabs[5] }}" role="tabpanel">
                    <div class="row">

                        <x-staff.form-group
                            label="stripe_key"
                            for="stripe[key]"
                            placeholder="Enter stripe key"
                            :value="config('services.stripe.key')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="stripe_secret"
                            for="stripe[secret]"
                            placeholder="Enter stripe secret"
                            :value="config('services.stripe.secret')"
                            column="col-12"
                            :required="false"
                        />

                        <x-staff.form-group label="stripe_enable" :isInput="false" column="col-md-6" :required="false">
                            <select name="stripe[enable]" id="mailer" class="form-control text-uppercase" required>
                                @foreach ([['key' => 'Active', 'enable' => 1],['key' => 'Inactive', 'enable' => 0]] as $item)
                                    <option value="{{ $item['enable'] }}" @selected(config('services.stripe.enable') == $item['enable'])>{{ $item['key'] }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group
                            label="google_client_id"
                            for="google[client_id]"
                            placeholder="Enter google client id"
                            :value="config('services.google.client_id')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="google_client_secret"
                            for="google[client_secret]"
                            placeholder="Enter google client secret"
                            :value="config('services.google.client_secret')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="google_map_api_key"
                            for="google[map_api_key]"
                            placeholder="Enter google google map api key"
                            :value="config('services.google.map_api_key')"
                            column="col-12"
                            :required="false"
                        />

                        <x-staff.form-group
                            label="recaptcha_site_key"
                            for="google[recaptcha_site_key]"
                            placeholder="Enter reCaptcha site key"
                            :value="config('services.google.recaptcha_site_key')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="recaptcha_secret_key"
                            for="google[recaptcha_secret_key]"
                            placeholder="Enter reCaptcha secret key"
                            :value="config('services.google.recaptcha_secret_key')"
                            column="col-12"
                            :required="false"
                        />

                        <x-staff.form-group label="recaptcha_enable" :isInput="false" column="col-md-6" :required="false">
                            <select name="google[recaptcha_enable]" id="mailer" class="form-control text-uppercase" required>
                                @foreach ([['key' => 'Active', 'enable' => 1],['key' => 'Inactive', 'enable' => 0]] as $item)
                                    <option value="{{ $item['enable'] }}" @selected(config('services.google.recaptcha_enable') == $item['enable'])>{{ $item['key'] }}</option>
                                @endforeach
                            </select>
                        </x-staff.form-group>

                        <x-staff.form-group
                            label="vimeo_client_id"
                            for="vimeo[client_id]"
                            placeholder="Enter vimeo client"
                            :value="config('vimeo.connections.main.client_id')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="vimeo_secret"
                            for="vimeo[client_secret]"
                            placeholder="Enter vimeo client secret"
                            :value="config('vimeo.connections.main.client_secret')"
                            column="col-12"
                            :required="false"
                        />
                        <x-staff.form-group
                            label="vimeo_access_token"
                            for="vimeo[access_token]"
                            placeholder="Enter vimeo access token"
                            :value="config('vimeo.connections.main.access_token')"
                            column="col-12"
                            :required="false"
                        />

                        <x-staff.form-group
                            label="tinymce_api_key"
                            placeholder="Enter tinymce api key"
                            :value="env('TINYMCE_API_KEY')"
                            column="col-12"
                            :required="false"
                        />

                    </div>
                </div>

            </div>

            <x-staff.submit-button text="Update" />
        </form>
    </x-staff.page>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#addNewSocial', function () {
                var html = `<tr>
                                <td>
                                    <input type="text" name="social_name[]" id="social_name[]" class="form-control" placeholder="Enter social media name" />
                                </td>
                                <td>
                                    <input type="url" name="social_url[]" id="social_url[]" class="form-control" placeholder="Enter social media url" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" id="removeSocial"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>`;
                $('table#social-table tbody').append(html);
            });

            $(document).on('click', '#removeSocial', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endpush

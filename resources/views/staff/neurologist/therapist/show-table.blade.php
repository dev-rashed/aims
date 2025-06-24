<table class="table table-bordered table-striped table-hover">
    <tbody>
        <tr>
            <th width="15%">First Name</th>
            <td>{{ $therapist->user->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $therapist->user->last_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $therapist->user->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $therapist->user->phone }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge {{ $therapist->status == 'approved' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($therapist->status) }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Is Registered</th>
            <td>
                <span @class(['badge', 'bg-success' => $therapist->registered, 'bg-danger' => !$therapist->registered])>
                    {{ $therapist->registered ? 'Registered' : 'Not Registered' }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Hide Profile</th>
            <td>
                <span @class(['badge', 'bg-success' => !$therapist->hide_profile, 'bg-danger' => $therapist->hide_profile])>
                    {{ $therapist->hide_profile ? 'Yes' : 'No' }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $therapist->user?->location }}</td>
        </tr>
        <tr>
            <th>Membership</th>
            <td>
                <p><strong>Name: </strong>{{ $therapist->membershipPlan?->name }}</p>
                <p><strong>Start Date: </strong>{{ formatDate($therapist->membership_start_date) }}</p>
                <p><strong>Expire Date: </strong>{{ formatDate($therapist->membership_expire) }}</p>
            </td>
        </tr>
        <tr>
            <th>Degree</th>
            <td>{{ $therapist->degree }}</td>
        </tr>
        <tr>
            <th>Short Description</th>
            <td>{!! $therapist->short_description !!}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $therapist->website }}</td>
        </tr>
        <tr>
            <th>Referred by</th>
            <td>{{ $therapist->referred_by }}</td>
        </tr>
        <tr>
            <th>Key Details</th>
            <td>{{ $therapist->key_details }}</td>
        </tr>
        <tr>
            <th>Professions</th>
            <td>
                <ul>
                    @foreach ($therapist->professions as $profession)
                        <li>{{ $profession->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Languages</th>
            <td>
                <ul>
                    @foreach ($therapist->languages as $language)
                        <li>{{ $language->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Sessions</th>
            <td>
                <ul>
                    @foreach ($therapist->sessions as $session)
                        <li>{{ $session->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Accessibilities</th>
            <td>
                <ul>
                    @foreach ($therapist->accessibilities as $accessibility)
                        <li>{{ $accessibility->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Concessions</th>
            <td>
                <ul>
                    @foreach ($therapist->concessions as $concession)
                        <li>{{ $concession->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Formats</th>
            <td>
                <ul>
                    @foreach ($therapist->formats as $format)
                        <li>{{ $format->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Online Platforms</th>
            <td>
                <ul>
                    @if (in_array(gettype($therapist->online_platforms), ['array','object']))
                        @foreach ($therapist->online_platforms as $online_platform)
                            <li>
                                <a href="{{ $online_platform->url }}" target="_blank">{{ $online_platform->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </td>
        </tr>
        <tr>
            <th>Tags</th>
            <td>{{ $therapist->tags }}</td>
        </tr>
        <tr>
            <th>About</th>
            <td>{!! $therapist->about !!}</td>
        </tr>
        <tr>
            <th>Experience</th>
            <td>{!! $therapist->experience !!}</td>
        </tr>
        <tr>
            <th>Currency</th>
            <td>{{ $therapist->user?->currency?->name }}</td>
        </tr>
        <tr>
            <th>Fees</th>
            <td>{{ convertAmount(amount: $therapist->fees, to: $therapist->user?->currency?->code) }}</td>
        </tr>
        <tr>
            <th>Health Insurance Providers</th>
            <td>{!! $therapist->health_insurance_providers !!}</td>
        </tr>
        <tr>
            <th>Availability</th>
            <td>{!! $therapist->availability !!}</td>
        </tr>
        <tr>
            <th>Further Information</th>
            <td>{!! $therapist->further_information !!}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <img src="{{ uploadedFile($therapist->user->avatar) }}" class="img-fluid" alt="{{ uploadedFile($therapist->user?->full_name) }}" width="100px">
            </td>
        </tr>
        <tr>
            <th>Video</th>
            <td>
                @if (!empty($therapist->video))
                    <video width="500" height="250" controls>
                        <source src="{{ uploadedFile($therapist->video) }}" type="video/mp4">
                        <source src="{{ uploadedFile($therapist->video) }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                @else
                    Not available
                @endif
            </td>
        </tr>
        <tr>
            <th>Documents</th>
            <td>
                @if ($therapist->documents != null)
                    <ul>
                        @foreach (json_decode($therapist->documents) as $document)
                            <li>
                                <a href="{{ uploadedFile($document) }}" download="download">Download</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>

        @if (request()->is('admin/application*') && in_array($therapist->status, ['review','under review']))
            <tr>
                <td colspan="2" class="text-center">
                    <form id="submit" action="{{ route('staff.application.update', $therapist->id) }}" method="post" data-redirect="{{ request()->is('admin/application*') ? route('staff.application.index') : route('staff.therapist.index') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="approved">
                        <input type="hidden" name="membership_id" value="{{ $therapist->membership_id }}">
                        <input type="hidden" name="membership_type" value="{{ $therapist->membership_type }}">
                        <button type="submit" class="btn btn-primary px-5 py-3">Approved</button>
                    </form>
                </td>
            </tr>
        @endif

    </tbody>
</table>

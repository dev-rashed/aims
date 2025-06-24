<tr>
    <td>
        <input type="text" name="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][title]" id="title" value="{{ $lecture->title ?? '' }}" class="form-control lectures__title" placeholder="Enter lecture title" />
    </td>
    <td>
        <div class="position-relative">
            <input type="text" name="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][video_id]" id="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][video_id]" class="form-control lectures__video_id" placeholder="Type video name/description" value="{{ $lecture->video_id ?? '' }}" data-url="{{ route('staff.course-module.search.vimeo') }}" />
            <input type="hidden" name="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][duration]" id="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][duration]" class="lectures__duration" value="{{ $lecture->duration ?? '' }}" />
            <div class="vimeo-container">
                <div class="text-center d-none py-2" id="loader">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div id="items"></div>
            </div>
        </div>
    </td>
    <td>
        <div class="form-check">
            <input class="form-check-input lectures__status" type="checkbox" name="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][status]" id="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][status]" @checked(isset($lecture) && $lecture?->status) />
            <label class="form-check-label" for="modules[{{ $key ?? 0 }}][lectures][{{ $index ?? 0 }}][status]">Is Public</label>
        </div>
    </td>
    <td>
        <a href="javascript:void(0)" class="btn btn-danger" id="removeLecture"><i class="bx bxs-trash"></i></a>
    </td>
</tr>

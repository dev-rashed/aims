@php($module = request()->has('module') ? request()->get('module') : 0)

<fieldset class="border mb-3" style="padding: revert" id="module" data-module="{{ $module }}">
    <legend class="float-none w-auto">
        Module:
        @if (!isset($courseModule))
            <a href="javascript:void(0)" id="removeModule" class="text-danger"><i class="bx bxs-trash"></i></a>
        @endif
    </legend>
    <x-staff.form-group
        label="title"
        for="modules[{{ $module }}][title]"
        placeholder="Enter module title"
        :value="$courseModule->title ?? ''"
        class="modules__title"
    />
    <div id="lectures">
        <div class="col-12 text-end mb-2">
            <x-staff.page-button href="#" title="Add lecture" icon="add" id="addLecture" data-element="{{ view('staff.course-module.lecture')->render() }}" />
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="50%">Title</th>
                    <th width="30%">Video ID</th>
                    <th width="10%">Status</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($courseModule)
                    @foreach (json_decode($courseModule->lectures) as $index => $lecture)
                        @include('staff.course-module.lecture')
                    @endforeach
                @else
                    @include('staff.course-module.lecture')
                @endisset
            </tbody>
        </table>
    </div>
</fieldset>

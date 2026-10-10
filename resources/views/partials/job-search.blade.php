<form class="swift-job-search" action="{{ route('jobs.search') }}" method="get" role="search" aria-label="Search job openings">
    <div>
<label for="job-keyword">What kind of work?</label>
<input id="job-keyword" type="search" name="q" placeholder="Job title, skill or company" value="{{ request('q') }}" maxlength="255">
</div>
    <div>
<label for="job-location">Where in Canada?</label>
<input id="job-location" type="search" name="location" placeholder="City or province" value="{{ request('location') }}" maxlength="255">
</div>
    <div>
<label for="job-type">Work type</label>
<select id="job-type" class="ignore" name="work_status">
<option value="">All work types</option>@foreach(['Full Time', 'Part Time', 'Contract', 'Temporary'] as $workType)<option value="{{ $workType }}" @selected(request('work_status') === $workType)>{{ $workType }}</option>@endforeach</select>
</div>
    <button type="submit" class="swift-btn swift-btn-dark">Find jobs <span aria-hidden="true">→</span>
</button>
</form>

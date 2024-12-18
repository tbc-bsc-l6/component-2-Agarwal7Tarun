@extends('front.layouts.app')

@section('body')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Applicants</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            {{-- sidebar --}}
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
            {{-- Included message --}}
                @include('front.message')

                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Applicants for Your Jobs</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Job Name</th>
                                        <th>Job Category</th>
                                        <th>Location</th>
                                        <th>Applied Date</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($applications->isNotEmpty())
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>{{ $application->user->name }}</td>
                                                <td>{{ $application->user->email }}</td>
                                                <td>{{ $application->user->mobile }}</td>
                                                <td>{{ $application->job->title }}</td>
                                                <td>{{ $application->job->jobType->name }}</td>
                                                <td>{{ $application->job->location }}</td>
                                                <td>{{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">No applicants found for your jobs</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{-- Render pagination links --}}
                            {{ $applications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

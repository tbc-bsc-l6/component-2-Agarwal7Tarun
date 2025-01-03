@extends('front.layouts.app')

@section('body')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Job Types</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Job Types</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{ route('admin.job_types.create') }}" class="btn btn-primary">Create</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($job_types->isNotEmpty())
                                        @foreach ($job_types as $job_type)
                                        <tr class="active">
                                            <td>{{ $job_type->id }}</td>
                                            <td>
                                                <div class="job-name fw-500">{{ $job_type->name }}</div>
                                            </td>
                                            <td>
                                                @if ($job_type->status == 1)
                                                    <p class="text-success">Active</p>
                                                @else
                                                    <p class="text-danger">Not Active</p>
                                               @endif
                                            </td>
                                            <td>
                                                <div class="action-dots ">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{ route('admin.job_types.edit',$job_type->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Job Types not Found</td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        <div>
                            {{ $job_types->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

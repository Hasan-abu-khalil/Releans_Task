@extends('admin/layout/layout')

@section('title', 'Popular Products Report')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Popular Products Report </h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sold Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($popularProducts as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->sold_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

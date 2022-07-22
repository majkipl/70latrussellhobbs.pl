@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kolekcja</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Kolekcja {{ $collection->id }}</div>
                        <div class="panel-body">
                            <table class="item show data">
                                <tbody>
                                <tr>
                                    <td>Nazwa: </td>
                                    <td>{{ $collection->name }}</td>
                                </tr>
                                <tr>
                                    <td>Slug: </td>
                                    <td>{{ $collection->slug }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.main-->
    </div>
@endsection

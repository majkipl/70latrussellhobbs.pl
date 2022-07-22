@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kolekcja</h1>
                </div>
            </div><!--/.row-->
            <form class="form row save" id="saveForm" method="{{ isset($collection) ? 'put' : 'post' }}"
                  action="{{ route(isset($collection) ? 'api.collection.update' : 'api.collection.add') }}">
                @csrf
                <div class="row">
                    <x-forms.input.text name="name" required="required" max="128" placeholder="Nazwa"
                                        class="offset-lg-1 col-lg-10"
                                        value="{{ isset($collection) ? $collection->name : '' }}"/>
                    <x-forms.input.text name="slug" max="128" placeholder="Slug" class="offset-lg-1 col-lg-10"
                                        value="{{ isset($collection) ? $collection->slug : '' }}"/>
                    <div class="col-12 col-lg-10 offset-lg-1 text-center">
                        <button class="button button-red mx-auto submit" type="submit">ZAPISZ</button>
                        @if(isset($collection) && $collection->id)
                            <x-forms.input.hidden name="id" required="required" value="{{ $collection->id }}"/>
                        @endif
                    </div>
                </div><!--/.row-->
            </form>
        </div><!--/.main-->
    </div>
@endsection

@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Produkt</h1>
                </div>
            </div><!--/.row-->
            <form class="form row save" id="saveForm" method="{{ isset($product) ? 'put' : 'post' }}"
                  action="{{ route(isset($product) ? 'api.product.update' : 'api.product.add') }}">
                @csrf
                <div class="row">
                    <x-forms.input.text name="name" required="required" max="128" placeholder="Nazwa"
                                        class="offset-lg-1 col-lg-10"
                                        value="{{ isset($product) ? $product->name : '' }}"/>
                    <x-forms.input.text name="code" required="required" max="128" placeholder="Kod produktu" class="offset-lg-1 col-lg-10"
                                        value="{{ isset($product) ? $product->code : '' }}"/>
                    <x-forms.select name="collection_id" required="required" placeholder="Kolekcja"
                                    class="col-lg-10 offset-lg-1" :items="$collections" selected="{{ isset($product) ? $product->collection->id : 0 }}"/>

                    <div class="col-12 col-lg-10 offset-lg-1 text-center">
                        <button class="button button-red mx-auto submit" type="submit">ZAPISZ</button>
                        @if(isset($product) && $product->id)
                            <x-forms.input.hidden name="id" required="required" value="{{ $product->id }}"/>
                        @endif
                    </div>
                </div><!--/.row-->
            </form>
        </div><!--/.main-->
    </div>
@endsection

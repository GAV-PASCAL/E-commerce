@extends('layouts.app')

@section('title', 'Ajouter catégorie')

@section('header')

    <div class="title_dash">
        <h1>DASHBOARD</h1>
    </div>

@endsection

@section('content')

    <div id="page_structure">
        <x-dashheader/>

        <div class="section_dash">
            <x-dashnav/>

            <div class="back_formulaire">
                <h4 class="info_form" id="info_form" >Forum de création de catégorie</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashbord.vendeur.categories.store') }}" class="exp" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="section_form_one">
                        <div class="form_info">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" placeholder="Nom du produits" class="input_ajout">
                        </div>
                        <div class="form_info">
                            <label for="nom">Image illustrative</label>
                            <input type="file" name="image" class="input_ajout">
                        </div>

                        <div>
                            <input type="submit" value="Enregistrer" class="input_register" >
                        </div>
                   </div>

                </form>
            </div>            
        </div>
    </div>

@endsection
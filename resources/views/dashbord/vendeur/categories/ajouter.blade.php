@extends('layouts.app')

@section('title', 'Ajouter catégorie')

@section('header')

    <section>
        <div class="title_dash">
            <div>
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px" height="50px">
            </div>
            <div class="conversation-header-page">
                <a href="{{ url('./') }}" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <div id="page_structure">
        <div style="background-color: #B45309; flex-basis: 22%; border-right: 1px solid #B45309;">
            <div style="height: 100vh;">
                <x-dashheader/>
            </div>
        </div>

        <div class="section_dash">

            <div id="back_formulaire">
                <h4 class="info_form" id="info_form" >Créations de Catégories</h4>

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
                            <input type="file" name="image" >
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
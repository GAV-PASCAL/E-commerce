@extends('layouts.app')

@section('title', 'Ajouter produits')

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
                <h4 class="info_form">Formulaire de création de produits</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('') }}" class="exp" method="POST" enctype="multipart/form-data">
                    @csrf

                   <div class="section_form_two">
                        <div class="form_info">
                            <label for="prix">Numéro d'identite du client</label>
                            <input type="text" name="prix" value="{{ old('') }}" class="input_ajout" required>
                        </div>

                        <div class="form_info">
                            <label for="qte_min">Date de la commande</label>
                            <input type="number" name="qte_min" value="{{ old('qte_min') }}" class="input_ajout" min="1" required>
                        </div>

                        <div>
                            <input type="submit" value="Enregistrer" class="input_register">
                        </div>
                   </div>

                </form>
            </div>            
        </div>

    </div>

@endsection

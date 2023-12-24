@extends('admin.admin')

@section('title', $property->exists ? 'Modifier un bien' : 'Ajouter un bien')

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="POST">
        @csrf

        @method($property->exists ? 'PATCH' : 'POST')

        <div class="row">

            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">

                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Surface',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
            'value' => $property->description,
        ])

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Piéces',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambres',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $property->floor,
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $property->city,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $property->postal_code,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $property->address,
            ])
        </div>
        @include('shared.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu ',
            'value' => $property->sold ?? false,
        ])
        <div>
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer nouvelle annonce
                @endif

            </button>
        </div>

    </form>

@endsection

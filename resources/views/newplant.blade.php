@extends('layouts.main')





@section('title','New plant')

@section('content')
<h1 class="hidden-heading">New Plant</h1>

<form class="new-plant-form" action="{{ route('newplant') }}" method="post">
    @csrf
    <p class="label">Choose Plant</p>
    <div class="plant-type-container">
        <div class="plant-type-display-container" x-data="{selected:'{{ $planttypes[0]->type }}'}">

            <!-- Input (on left side on wider screens) -->
            <fieldset x-model="selected" class="plant-type-input-container">
                @foreach($planttypes as $option)
                    <input class="plant-type-radio" id="{{ $option->type . "-radio" }}"
                        type="radio" name="type" value="{{ $option->type }}" <blade
                        if|(%24option-%3Etype%3D%3D%24planttypes%5B0%5D-%3Etype)%0D>
                    checked
                @endif
                >
                <label for="{{ $option->type . "-radio" }}" class="plant-type-label"
                    aria-label={{ $option->type }}>
                    @svg($option->svg_path . 3)
                </label>
                @endforeach
            </fieldset>
            <!-- Display of plant with tips -->
            <div class="plant-display">
                <p class="plant-display-title" x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"></p>
                <!-- SVG-ofplants -->
                @foreach($planttypes as $index => $option)
                    <div class="plant-display-item-wrapper" x-ref="{{ $option->type }}"
                        data-plant="{{ $option->type }}"
                        x-show="selected===$refs.{{ $option->type }}.dataset.plant">
                        <blade
                            svg|(%24option-%3Esvg_path%20.%203%2C%5B%26%2339%3Bclass%26%2339%3B%3D%3E%26%2339%3Bplant-display-item%26%2339%3B%5D)%0D>
                            <p class="growing-tip">
                                {{ trim(json_decode($option->tips)[rand(0,count(json_decode($option->tips))-1)]) }}
                            </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <label for="planted">Select date of planting</label>
    <input type="date" name="planted" id="planted"
        value="{{ (new \Carbon\Carbon())->tz('Pacific/Auckland')->format('Y-m-d') }}">
    <label for="quantity">Select how many plants</label>
    <input type="number" name="quantity" id="quantity" step="1" value="1" min="1" max="100">

    <p class="label">Choose planting method</p>
    <fieldset class="prop-type-input-container">
        <input class="prop-type-radio" id="directsow" type="radio" name="propogation_type" value="directsow" checked>
        <label for="directsow" class="prop-type-label" aria-label="directsow">
            @svg('proptypes.direct-sew')
                <p class="prop-type">Sow directly</p>

        </label>
        <input class="prop-type-radio" id="seedling" type="radio" name="propogation_type" value="seedling">
        <label for="seedling" class="prop-type-label" aria-label="seedling">
            @svg('proptypes.seedling')
                <p class="prop-type">Plant seedling</p>
        </label>
        <input class="prop-type-radio" id="proptray" type="radio" name="propogation_type" value="proptray">
        <label for="proptray" class="prop-type-label" aria-label="proptray">
            @svg('proptypes.prop-tray')
                <p class="prop-type">Sow in tray</p>
        </label>
    </fieldset>
    <input class="round-btn" type="submit">

</form>

@endsection
